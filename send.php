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

$mydirname = basename( dirname( __FILE__ ) ) ;
include("../../mainfile.php");
include("../../header.php");
 global $xoopsConfig, $xoopsTheme, $xoopsModuleConfig, $xoopsModule;
//Language include
if ( file_exists(XOOPS_ROOT_PATH."/modules/$mydirname/language/".$xoopsConfig['language']."/modinfo.php") )
	{
		include_once(XOOPS_ROOT_PATH."/modules/$mydirname/language/".$xoopsConfig['language']."/modinfo.php");
	}
else
	{
		include_once(XOOPS_ROOT_PATH."/modules/$mydirname/language/english/modinfo.php");
	}
// Check COMMENT,NAME,TITLE,EMAIL.. WERE INSERTED OR NOT
$myts =& MyTextSanitizer::getInstance();
$_SESSION['comment'] =  $myts->makeTareaData4Save($_POST["comment"]);

   if (!empty($_POST['submit'])) {
}
// Check COMMENT
if ( empty($_POST["comment"])) {
  redirect_header(XOOPS_URL . "/modules/$mydirname/index.php" , 3, ""._MI_SENDME_NOCOMMENT."");
} else if (strlen($_POST["comment"]) > $xoopsModuleConfig['MESSAGE_LENGTH']) {
 redirect_header(XOOPS_URL . "/modules/$mydirname/index.php" , 3, ""._MI_SENDME_LONGCOMMENT."");
 }
// Check NAME
    if ( empty($_POST["name"])) {
  redirect_header(XOOPS_URL . "/modules/$mydirname/index.php" , 3, ""._MI_SENDME_NONAME."");
  }
// Check TITLE
  if ( empty($_POST["subject"])) {
 redirect_header(XOOPS_URL . "/modules/$mydirname/index.php" , 3, ""._MI_SENDME_NOTITLE."");
 }
 //Check EMAIL
 if ( empty($_POST["email"])) {
	redirect_header(XOOPS_URL . "/modules/$mydirname/index.php" , 3, _MI_SENDME_NOEMAIL);
  } else if (!ereg("^[0-9a-zA-Z_\.\-]+@[0-9a-zA-Z][0-9a-zA-Z\.\-]+$",$_POST["email"])) {
   redirect_header(XOOPS_URL . "/modules/$mydirname/index.php" , 3, _MI_SENDME_EMAIL_NOT_OK);
  }
// CHECK IF CAPTCHA CODE OK
$captcha = $xoopsModuleConfig['CAPTCH'];
  if ($captcha== 1) {
if(md5($_POST['captcha_num']) != $_SESSION['captcha_num']){
redirect_header(XOOPS_URL . "/modules/$mydirname/index.php" , 3, ""._MI_SENDME_ERROR_CODE."");
}
}
//GET DATA FROM SENT FORM
$titles = $myts->makeTboxData4Save($_POST["subject"]);
$comment = $myts->makeTboxData4Save($_POST["comment"]);
$name = $myts->makeTboxData4Save($_POST["name"]);
$email = $myts->makeTboxData4Save($_POST["email"]);
$ip = $_SERVER['REMOTE_ADDR'];
$datetime=date("d/m/y h:i:s"); //create date time
$Priority = $myts->makeTboxData4Save($_POST["Priority"]);
if ($Priority) {
$title = $titles. "  " ."("._MI_SENDME_PSTATS." : $Priority ) ";
} else {
$title = $titles;
}

// To protect MySQL injection
 if ( empty($_POST["password"])) {

$password = substr(md5(time()),0,6);
 $password = mysql_real_escape_string($password);
$encrypted_mypassword=md5($password);
}
else {
$password = addSlashes($_POST["password"]);
$password = mysql_real_escape_string($password);
$encrypted_mypassword=md5($password);
}

   if ( empty($_FILES['xoops_upload_file']['name'])) {

$upload = "";
}
 else {

$uploading=($_FILES['xoops_upload_file']['name']);  // Get File Name

$prefix = substr(md5(time()),0,15);
$dash = "_";   // To Seprate the Random Name from the Actual Name
$upload = $prefix.$dash.$uploading;  // Combin the Random name with the File Name

 include_once '../../class/uploader.php';

// Here the list of allowed files to be uploaded.

$allowed_mimetypes = explode(' ', $xoopsModuleConfig['allowed_type']);
$maxfilesize = $xoopsModuleConfig['upload_max_size'];
$target = $xoopsModuleConfig['upload_store'];

$uploader = new XoopsMediaUploader($target, $allowed_mimetypes, $maxfilesize);

if ($uploader->fetchMedia($_POST["xoops_upload_file"][0])) {
$uploader->setTargetFileName($prefix.$dash.$uploader->mediaName);
    if (!$uploader->upload()) {
       redirect_header(XOOPS_URL . "/modules/$mydirname/index.php" , 6, $uploader->getErrors());
    } else {
        echo ""._MI_SENDME_ATTACHMENTS4."";
    }
} else {
   redirect_header(XOOPS_URL . "/modules/$mydirname/index.php" , 5, $uploader->getErrors());
}
}
/// END UPLOADING STUFF

//IF ALL OK INSERT DATA AND GIVE OK MESSAGE
$sql="INSERT INTO ".$xoopsDB->prefix("sendme_ask")." (subject, comment, name, email, ip, datetime, password, upload)VALUES('$title', '$comment', '$name', '$email', '$ip', '$datetime', '$encrypted_mypassword' , '$upload')";

// AUTO RESPOND
$Auto = $xoopsModuleConfig['auto_respond'];
  if ($Auto== 1) {
//if ($xoopsModuleConfig['auto_respond']== 1) {
    extract($HTTP_POST_VARS);
    $adminMessage = $xoopsModuleConfig['auto_respond_msg'];

    $subjects = "RE :" . $xoopsConfig['sitename']." - "."$subject";
    $xoopsMailer =& xoops_getMailer();
    $xoopsMailer->useMail();
    $xoopsMailer->setToEmails($email);
    $xoopsMailer->setFromEmail($xoopsConfig['adminmail']);
    $xoopsMailer->setFromName($xoopsConfig['sitename']);
    $xoopsMailer->setSubject($subjects);
    $xoopsMailer->setBody($adminMessage);
    $xoopsMailer->send();
   }
// END AUTO RESPOND
// Notfiy admin
 $Notfiy = $xoopsModuleConfig['Notify'];
  if ($Notfiy== 1) {
         $subject = _MI_SENDME_ADNOTFIYSUB;
         $dated = date("Y-m-d - H:i:s");
         $adminMessage = ""._MI_SENDME_ADNOTFIY."\n";
         $adminMessage .= "--------------------------------------\n";
         $adminMessage .= "$ip\n";
         $adminMessage .= "--------------------------------------\n";
         $adminMessage .= "<<"._MI_SENDME_ADNOTFIY.">>\n";
         $adminMessage .= "--------------------------------------\n";
         $adminMessage .= "$comment\n";
         $adminMessage .= "--------------------------------------\n";
         $adminMessage .= "<< "._MI_SENDME_ADNOTFIY." >>\n";
         $adminMessage .= "$dated\n";
         $adminMessage .= "--------------------------------------\n";

         $subjects = "" . $xoopsConfig['sitename']." - "."$subject";
         $xoopsMailer =& xoops_getMailer();
         $xoopsMailer->useMail();
         $xoopsMailer->setToEmails($xoopsConfig['adminmail']);
         $xoopsMailer->setFromEmail($xoopsConfig['adminmail']);
         $xoopsMailer->setFromName($xoopsConfig['sitename']);
         $xoopsMailer->setSubject($subjects);
         $xoopsMailer->setBody($adminMessage);
         $xoopsMailer->send();
  }
// END Notfiy admin

$result=mysql_query($sql);
if($result){

  echo"<right>"._MI_SENDME_YOUR_COMMENTRETURN_NO2."</right>";
?>
<p align="center"><u><b><span lang="ar-sa"><font size="3" face="Tahoma"><?php echo ""._MI_SENDME_YOUR_COMMENTRETURN_NO."";?></font></span></b></u></p>
  <p align="center"><font color="#FF0000"><?php  echo " " . mysql_insert_id();?></font></p>
  <form name="redirect">
<center>
<font face="Arial"><b><?php echo ""._MI_SENDME_RETURN_REDIERECT."";?><br><br>
<form>
<input type="text" size="3" name="redirect2">
</form>
</b></font>
</center>

<script>
<!--

/*
Count down then redirect script
By JavaScript Kit (http://javascriptkit.com)
Over 400+ free scripts here!
*/

//change below target URL to your own
var targetURL="index.php"
//change the second to start counting down from
var countdownfrom=20


var currentsecond=document.redirect.redirect2.value=countdownfrom+1
function countredirect(){
if (currentsecond!=1){
currentsecond-=1
document.redirect.redirect2.value=currentsecond
}
else{
window.location=targetURL
return
}
setTimeout("countredirect()",2000)
}

countredirect()
//-->
</script>
<?php

}
else {
 redirect_header(XOOPS_URL . "/modules/$mydirname/index.php" , 3, ""._MI_SENDME_ERROR_MESSAGE."");
}
mysql_close();

include("../../footer.php");
?>