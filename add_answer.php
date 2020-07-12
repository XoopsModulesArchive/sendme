<?php

/*
* NAME : SENDME MODULE FOR XOOPS
* AUTHOR : ONASRE <ַזהַ׃ׁ >
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
$mydirname = basename( dirname( __FILE__ ) ) ;
 include("../../mainfile.php");
 if( ! xoops_refcheck() ) die( "XOOPS_URL is not included in your REFERER" ) ;
 global $xoopsConfig, $xoopsModuleConfig;
if ( file_exists(XOOPS_ROOT_PATH."/modules/$mydirname/language/".$xoopsConfig['language']."/modinfo.php") )
	{
		include_once(XOOPS_ROOT_PATH."/modules/$mydirname/language/".$xoopsConfig['language']."/modinfo.php");
	}
else
	{
		include_once(XOOPS_ROOT_PATH."/modules/$mydirname/language/english/modinfo.php");
	}

// Get value of id
if(!empty($_GET["id"])){
    $id = intval($_GET["id"]);
}elseif(!empty($_POST["id"])){
    $id = intval($_POST["id"]);
}else{
    redirect_header(XOOPS_URL . "/modules/$mydirname/admin/index.php" , 3, ""._MI_SENDME_NOTIK_ID."");
}
include '../../header.php';
$_SESSION['a_answer'] = $_POST['a_answer'];

// Check NAME
   if ( empty($_POST["a_name"])) {
  redirect_header(XOOPS_URL . "/modules/$mydirname/read_reply.php?id=$id" , 3, ""._MI_SENDME_NONAME."");
 }
 
 // Check EMAIL
   if ( empty($_POST["a_email"])) {
  redirect_header(XOOPS_URL . "/modules/$mydirname/read_reply.php?id=$id" , 3, ""._MI_SENDME_NOEMAIL."");
 }
// Check COMMENT
  if ( empty($_POST["a_answer"])) {
    redirect_header(XOOPS_URL . "/modules/$mydirname/read_reply.php?id=$id" , 5, ""._MI_SENDME_NOCOMMENT."");
  } else if (strlen($_POST["a_answer"]) > $xoopsModuleConfig['MESSAGE_LENGTH']) {

      redirect_header(XOOPS_URL . "/modules/$mydirname/read_reply.php?id=$id" , 5, ""._MI_SENDME_LONGCOMMENT."");
   }
// Find highest answer number.
$sql="SELECT MAX(a_id) AS Maxa_id FROM ".$xoopsDB->prefix("sendme_answer")." WHERE question_id='$id'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);

// add + 1 to highest answer number and keep it in variable name "$Max_id". if there no answer yet set it = 1
if ($rows) {
$Max_id = $rows['Maxa_id']+1;
}
else {
$Max_id = 1;
}
// get values that sent from form
$myts =& MyTextSanitizer::getInstance();
$a_name = $myts->makeTboxData4Save($_POST["a_name"]);
$a_email = $myts->makeTboxData4Save($_POST["a_email"]);
$a_answer = $myts->makeTboxData4Save($_POST["a_answer"]);
//$a_name=$_POST['a_name'];
$datetime=date("d/m/y H:i:s"); // create date and time

// Insert answer
$sql2="INSERT INTO ".$xoopsDB->prefix("sendme_answer")."(question_id, a_id, a_name, a_email, a_answer, a_datetime)VALUES('$id', '$Max_id', '$a_name', '$a_email', '$a_answer', '$datetime')";
$result2=mysql_query($sql2);

if($result2){
// If added new answer, add value +1 in reply column
$sql3="UPDATE ".$xoopsDB->prefix("sendme_ask")." SET reply='$Max_id' WHERE id='$id'";
$result3=mysql_query($sql3);
$sql4="UPDATE ".$xoopsDB->prefix("sendme_ask")." SET active='0' WHERE id='$id'";
$result4=mysql_query($sql4);

redirect_header(XOOPS_URL . "/modules/$mydirname/index.php" , 3, ""._MI_SENDME_SENDER_REPLYED_SENT."");
}
else {
echo ""._MI_SENDME_ERROR_MESSAGE."";
}

mysql_close();

include '../../footer.php';
?>