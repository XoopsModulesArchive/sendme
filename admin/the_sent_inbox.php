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
</head>
<body>
<?php
xoops_cp_header();
include_once("./header.php");

$myts =& MyTextSanitizer::getInstance();
  define('_SENDME_TABLE',$xoopsDB->prefix('sendme_copy'));
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
echo '<th>'._MI_SENDME_SENDER_ADMINNAME.'</th><th>'._MI_SENDME_TO.'</th><th>'._MI_SENDME_SENDTIME.'</th></tr>';
  //read data
  $sql=$xoopsDB->query("select count(id) from ".$xoopsDB->prefix("sendme_copy"));
  list($numrows) = $xoopsDB->fetchRow($sql);
  $sql="SELECT * FROM "._SENDME_TABLE;
  $sql.=" ORDER BY id DESC LIMIT ".$min.",".$view;
  $result=$xoopsDB->query($sql);
  $sno=1;
  while( $val = $xoopsDB->fetchArray($result) ){
    $class = ($class == 'even') ? 'odd' : 'even';
     echo "<tr class='$class'>";
     echo " <td><input name='checkbox[]' type='checkbox' id='checkbox[]' value=".$val['id']."</td> ";
     echo '<td><a href="sent_read.php?id='.$val['id'].'"><font color=\"279235\">'.$myts->htmlSpecialChars($val['subject']).'</font></a></td>';
     echo '<td>'.$myts->htmlSpecialChars($val['name']).'</td>';
     echo '<td>'.$myts->htmlSpecialChars($val['email']).'</td>';
     echo '<td>'.formatTimestamp($val['datetime'],'d/m/y(H:i:s)').'</td>';
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
//print_r($_POST);
$checkbox=$_POST['checkbox'];
//exit;
for($i=0;$i<count($checkbox);$i++){
$del_id = $checkbox[$i];
$sql = "DELETE FROM ".$xoopsDB->prefix("sendme_copy")." WHERE id='$del_id'";
$result = mysql_query($sql);
}
// if successful redirect to index.php
if($result){
echo "<meta http-equiv=\"refresh\" content=\"0;URL=the_sent_inbox.php\">";
}
}
///End Delete Multi records
    xoops_cp_footer();
?>