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

// get value of id that sent from address bar
if(!empty($_GET["id"])){
    $id = intval($_GET["id"]);
}elseif(!empty($_POST["id"])){
    $id = intval($_POST["id"]);
}else{
    redirect_header(XOOPS_URL . "/modules/$mydirname/admin/index.php" , 3, ""._MI_SENDME_NOTIK_ID."");
}
include '../../../include/cp_header.php';
xoops_cp_header();
global $xoopsConfig, $xoopsTheme, $xoopsUser, $xoopsModule, $xoopsModuleConfig;
include_once("./header.php");


//UPDATE MESSAGE TABEL TO READED
 $query =mysql_query("UPDATE  ".$xoopsDB->prefix("sendme_ask")." SET active='1' WHERE id='$id' ")
  or die("can't edit the sendme_ask");
// END  UPDATE MESSAGE TABEL TO READED
$sql="SELECT * FROM ".$xoopsDB->prefix("sendme_ask")." WHERE id='$id'";
$result=mysql_query($sql);

	if($result) {
		if(mysql_num_rows($result) == 1) {
$row=mysql_fetch_array($result);

$myts =& MyTextSanitizer::getInstance();

?>
<fieldset>
<legend>
<p> <?php echo _MI_SENDME_SENDER_THE_Q ?></p>
</legend>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td><table width="100%" border="0" cellpadding="3" cellspacing="1" bordercolor="1" bgcolor="#FFFFFF">

<tr>
<td bgcolor="#F8F7F1"><strong><?php echo _MI_SENDME_BY ?></strong> <?php echo $myts->htmlspecialchars($row['name'],0) ?></td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><strong><?php echo _MI_SENDME_EMAIL_BY ?> </strong><?php echo $myts->htmlspecialchars($row['email'],0)?></td>
</tr>

<tr>
<td bgcolor="#F8F7F1"><strong><?php echo _MI_SENDME_SENT_TIME ?></strong><?php echo $row['datetime']; ?></td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><strong><?php echo _MI_SENDME_SENT_IP ?></strong><?php echo $row['ip']; ?></td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><strong><?php echo _MI_SENDME_BY_SUBJECT ?></strong> <?php echo $myts->htmlspecialchars($row['subject'],0); ?></td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><strong><?php echo _MI_SENDME_BY_THE_COMMENT ?></strong> </td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><?php  echo $myts->displayTarea($myts->stripSlashesGPC($row['comment']), 0); ?></td>
</tr>
</table></td>
</tr>
</table>
</fieldset> <br>
<fieldset>
<legend>
<p> <?php echo _MI_SENDME_SENDER_REPLYEDs ?></p>
</legend>
<?php


$sql2="SELECT * FROM ".$xoopsDB->prefix("sendme_answer")." WHERE question_id='$id' order by a_id desc";
$result2=mysql_query($sql2);

while($rows=mysql_fetch_array($result2)){
// Print the Answer
 $class = 'even';
echo "<table class='outer' cellSpacing='1' width='100%'>";
echo "<form method='POST' action='del.php?a_id=".$rows['a_id']."'> ";
echo "<input name='id' type='hidden' value='$id'> ";
 echo "<th>[ "._MI_SENDME_BY." : ".$rows['a_name']."]  &nbsp;&nbsp; [ "._MI_SENDME_SENDTIME." : ".$rows['a_datetime']."]&nbsp;&nbsp;<input type='submit' name='Submit' value='"._MI_SENDME_DELETEALL."'></th> ";
    $class = ($class == 'even') ? 'odd' : 'even';
    echo "<tr class='$class'>";
    	$text = $myts->displayTarea($myts->stripSlashesGPC($rows['a_answer']), 0);
 echo '<td>'.$text.'</td>';
 echo '</tr>';

 echo '</table>';
echo "</form>   ";

echo "<br>";

// End Print the Answer

}

$sql3="SELECT view FROM ".$xoopsDB->prefix("sendme_ask")." WHERE id='$id'";
$result3=mysql_query($sql3);

$rows=mysql_fetch_array($result3);
$view=$rows['view'];

// if have no counter value set counter = 1
if(empty($view)){
$view=1;
$sql4="INSERT INTO ".$xoopsDB->prefix("sendme_ask")."(view) VALUES('$view') WHERE id='$id'";
$result4=mysql_query($sql4);
}

// count more value
$addview=$view+1;
$sql5="update ".$xoopsDB->prefix("sendme_ask")." set view='$addview' WHERE id='$id'";
$result5=mysql_query($sql5);
// include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";

 $ycomment = ( isset($_SESSION['a_answer']) )? $_SESSION['a_answer'] : '';
xoops_load('xoopsformloader');
$form = new XoopsThemeForm(_MI_SENDME_SENDER_ADMINRE, "form1", "add_answer.php?id=".$id);
$a_name = new XoopsFormText(_MI_SENDME_SENDER_NAME, "a_name", 60, 60, _MI_SENDME_SENDER_ADMINNAME);
$a_email = new XoopsFormText(_MI_SENDME_EMAIL2, "a_email", 60, 60, $row['email']);
$a_answer = new XoopsFormDhtmlTextArea(_MI_SENDME_SENDER_REPLYED, "a_answer", $ycomment, 6, 60);

$form->addElement($a_name);
$form->addElement($a_email);
$form->addElement($a_answer);

$button_submit = new XoopsFormButton("", "submit", _MI_SENDME_EMAIL_SEND_NOW, "submit");
$form->addElement($button_submit);
$form->display();
unset($_SESSION['a_answer']);

		}else {

   ECHO ""._MI_SENDME_NOTIK_FOUND."";

  }
	}else {
		die("Query failed");
	}

xoops_cp_footer();
?>