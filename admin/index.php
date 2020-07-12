<?php
/*
* NAME : SENDME MODULE FOR XOOPS
* AUTHOR : ONASRE <ÇæäÇÓÑ >
* EMAIL : abu-elmajid@hotmail.com
* WEBSITE : WWW.abdALBASIT.COM DEMO SITE : WILDHELP.COM SUPPORT SITE : ARABXOOPS.COM
* VERSION : V1.6  Last Updated 2-March-2010
* License : FREE AS LONG AS U KEEP THIS TEXT , UNDER GNU LICENSE
* CREDITE : TOO MANY PEOPLE HELPED ME TO COME OUT WITH THIS MODULE ,
* MOST IMPORTANT ARE THE http://www.phpeasystep.com FOR THE TUTORIAL OF
* Creating a Simple PHP Forum . THAT WHT INSPIRED ME TO MAKE THIS MODULE , AND I USED THE SOURCE CODE
* WITH MY PROJECT .. AND MORE THX TO ..
* FRANKBLACK, MARIANE, Mowaffaq , FOU-LU , DYLIAN , RC-NET WEB SERVICES , ZELFAS , HASSAN EL-7WAJ ,..  GOOGLE :)
* AND MORE THX TO ARABXOOPS.COM COMMUNITY , TRABIS , GHIA AND ALL XOOPS.ORG COMMUNITY , FOR THEM I'M DOING THIS :)
* INFO : THIS MODULE WILL ALLOW YOUR GUESTS/MEMBERS TO SEND YOU EMAIL'S AND THE EMAILS
* WILL BE SAVED TO YOUR DATABASE .. SO SAY BY FOR LOST EMAIL .. NOT ANYMORE .
* IT ALSO ALLOWS YOU TO SEND OUT EMAIL TO ANYONE ..MUCH MORE ..
*/
$mydirname = basename( dirname( dirname( __FILE__ ) ) ) ;
 include("../../../mainfile.php");
 global $xoopsConfig, $xoopsModuleConfig;
if ( file_exists(XOOPS_ROOT_PATH."/modules/$mydirname/language/".$xoopsConfig['language']."/modinfo.php") )
	{
		include_once(XOOPS_ROOT_PATH."/modules/$mydirname/language/".$xoopsConfig['language']."/modinfo.php");
	}
else
	{
		include_once(XOOPS_ROOT_PATH."/modules/$mydirname/language/english/modinfo.php");
	}


include '../../../include/cp_header.php';


?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script>
function selectAllCheckBoxes(FormName, FieldName, CheckValue)
{
	if(!document.forms[FormName])
		return;
	var objCheckBoxes = document.forms[FormName].elements[FieldName];
	if(!objCheckBoxes)
		return;
	var countCheckBoxes = objCheckBoxes.length;
	if(!countCheckBoxes)
		objCheckBoxes.checked = CheckValue;
	else
		// set the check value for all check boxes
		for(var i = 0; i < countCheckBoxes; i++)
			objCheckBoxes[i].checked = CheckValue;
}
</script>
  <script language="javascript" >
function onsub()
{
  var where_to= confirm("<?php echo ""._MI_SENDME_OPENATTACHMENT_ALERT.""; ?>");

if (where_to== true)
 {
   return true;  //or  document.form1.submit();
 }
else
 {
  return false;
  }
}
  </script>
</head>
<body>
<?php
xoops_cp_header();

// Alert Message
$GET_STATS = @mysql_query("SELECT * from ".$xoopsDB->prefix("sendme_ask")." WHERE active='0'");
$THE_STATS = @mysql_num_rows($GET_STATS);
if($THE_STATS > 0){
echo "<script language=\"javascript\" type=\"text/javascript\">window.alert('$THE_STATS " ._MI_SENDME_HOW_MANY_INBOX. "');</script>";
}

// End alert Message


include_once("./header.php");

//THE STATS
$total_inbox = mysql_num_rows(mysql_query("select * from ".$xoopsDB->prefix("sendme_ask")."  order by id Desc "));
$opened_messages = mysql_num_rows(mysql_query("select * from ".$xoopsDB->prefix("sendme_ask")."  where (active = '1') order by id Desc "));
$new_msg = mysql_num_rows(mysql_query("select * from ".$xoopsDB->prefix("sendme_ask")."  where (active = '0') order by id Desc "));
$replays = mysql_num_rows(mysql_query("select * from ".$xoopsDB->prefix("sendme_answer")."  order by a_id Desc "));

echo "<div style='padding: 5px;'>
    <fieldset>

            <legend class='Stats'>"._MI_SENDME_STATS."</legend>

        <div class='stats'>"._MI_SENDME_MSG_INBOX_NO_READ." : <font color='#008000'> $new_msg</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        "._MI_SENDME_MSG_INBOX_OLD."  : <font color='#FF0000'> $opened_messages</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        "._MI_SENDME_MSG_TOTAL_INBOX."  : <font color='#800000'> $total_inbox</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        "._MI_SENDME_MSG_REPLYS_NO."  : <font color='#800000'> $replays</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
    </fieldset>
</div>";

// END THE STATS

   $myts =& MyTextSanitizer::getInstance();
  define('_SENDME_TABLE',$xoopsDB->prefix('sendme_ask'));
  define('_SENDME_TABLE2',$xoopsDB->prefix('sendme_answer'));
  if (isset($_GET['view'])) {
        $view = intval($_GET['view']);
} else {
    $view = $xoopsModuleConfig['PAGE'];
}
$min = isset($_GET['min']) ? intval($_GET['min']) : 0;
if (!isset($max)) {
	$max = $min + $view;
}
  $class = 'even';
echo "<table class='outer' cellSpacing='1' width='100%'>";
echo "<form name='form1' method='post' action=''>";
echo '<th>#</th> ';
echo '<th>'._MI_SENDME_SUBJECT.'</th> ';
echo '<th>'._MI_SENDME_SENDER_NAME.'</th><th>'._MI_SENDME_EMAIL.'</th><th>'._MI_SENDME_SENDTIME.'</th><th>'._MI_SENDME_SENDERIPS.'</th><th>'._MI_SENDME_REPLYS.'</th><th>'._MI_SENDME_ATTACHMENT.'</th></tr>';
  //read data
  $sql=$xoopsDB->query("select count(id) from ".$xoopsDB->prefix("sendme_ask"));
  list($numrows) = $xoopsDB->fetchRow($sql);
  $sql="SELECT * FROM "._SENDME_TABLE;
  $sql.=" ORDER BY id DESC LIMIT ".$min.",".$view;
  $result=$xoopsDB->query($sql);
  $sno=1;
  while( $val = $xoopsDB->fetchArray($result) ){
    $class = ($class == 'even') ? 'odd' : 'even';
    echo "<tr class='$class'>";
    echo " <td><input name='checkbox[]' type='checkbox' id='checkbox[]' value=".$val['id']."</td> ";
     if ($val['active']== 0 ){
    echo '<td><a href="read.php?id='.$val['id'].'"><font color=\"279235\">'.$myts->htmlSpecialChars($val['subject']).'</font></a>  <img border="0" src="../images/New_icons_24.gif" width="22" height="7"></td>';
 }else{
   echo '<td><a href="read.php?id='.$val['id'].'"><font color=\"222222\">'.$myts->htmlSpecialChars($val['subject']).'</font></a></td>';
}
      echo '<td>'.$myts->htmlSpecialChars($val['name']).'</td>';
      echo '<td>'.$myts->htmlSpecialChars($val['email']).'</td>';
      echo '<td>'.formatTimestamp($val['datetime'],'d/m/y(H:i:s)').'</td>';
      echo '<td>'.$myts->htmlSpecialChars($val['ip']).'</td>';
       echo '<td>'.$myts->htmlSpecialChars($val['reply']).'</td>';
        if ($val['upload']){

    echo" <td><a href=\"".XOOPS_URL."/modules/$mydirname/getfile.php?file=".$val['upload']."\"onclick='return onsub()'><img border='0' src='../images/zip.ico' width='25' height='25' alt='Attacment'></a></td>  ";
      }else{
      echo '<td>'._MI_SENDME_NO_ATTACHMENT.'</td>';
         }
    echo '</tr>';
  }
  $sno=$sno+1;
  ?>
      <tr>
      <td>&nbsp;</td>
      <td colspan="3">
        <div align="right">
    <input name="delete" type="submit" id="delete" value="<?php echo ""._MI_SENDME_DELETEALL."" ?>">
&nbsp;&nbsp;
    <input type="button" onclick="selectAllCheckBoxes('form1', 'checkbox[]', true);" value="<?php echo ""._MI_SENDME_SELECTALL."" ?>">
&nbsp;&nbsp;
    <input type="button" onclick="selectAllCheckBoxes('form1', 'checkbox[]', false);" value="<?php echo ""._MI_SENDME_DESELECTALL."" ?>">
  <font face="Tahoma" size="2" color="#FF0000"><?php echo ""._MI_SENDME_DELETE_ALERT."" ?></font>
              </div></td>
    </tr>
  <?php
  echo '</table>';
  echo '</form>';
  	$msgpages = ceil($numrows / $view);
if ($msgpages!=1 && $msgpages!=0) {
       		echo "<br /><br />";
        	$prev = $min - $view;
        	if ($prev>=0) {
        		echo "&nbsp;<a href='index.php?min=$prev&view=$view'>";
                 echo "&nbsp;"._MI_SENDME_MSGPRV."&nbsp;";
        	}
$counter = 1;
        	$currentpage = ($max / $view);
        	while ( $counter<=$msgpages ) {
               		$mintemp = ($view * $counter) - $view;
               		if ($counter == $currentpage) {
				echo "<b>$counter</b>&nbsp;";
			} else {
				echo "<a href='index.php?min=$mintemp&view=$view'>$counter</a>&nbsp;";
			}
               		$counter++;
        	}
if ( $numrows>$max ) {
        		echo "&nbsp;<a href='index.php?min=$max&view=$view'>";
                 echo "&nbsp;"._MI_SENDME_MSGNEXT."&nbsp;";
        	}
    	  }
///Delete Multi records
if($_POST['delete']){
$checkbox=$_POST['checkbox'];
for($i=0;$i<count($checkbox);$i++){
$del_id1 = $checkbox[$i];
$del_id = $checkbox[$i];
$sql = "DELETE "._SENDME_TABLE.".*, "._SENDME_TABLE2.".* FROM "._SENDME_TABLE.", "._SENDME_TABLE2." WHERE "._SENDME_TABLE.".id = '$del_id' AND "._SENDME_TABLE2.".question_id = '$del_id'";
$sql1 = "DELETE FROM ".$xoopsDB->prefix("sendme_ask")." WHERE id='$del_id1'";
$result = mysql_query($sql);
$result = mysql_query($sql1);
}
//if successful redirect to delete_multiple.php
if($result){
echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
}
}
///End Delete Multi records
    xoops_cp_footer();
?>