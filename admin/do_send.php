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
include '../../../include/cp_header.php';
 global $xoopsConfig, $xoopsModuleConfig;
if ( file_exists(XOOPS_ROOT_PATH."/modules/$mydirname/language/".$xoopsConfig['language']."/modinfo.php") )
	{
		include_once(XOOPS_ROOT_PATH."/modules/$mydirname/language/".$xoopsConfig['language']."/modinfo.php");
	}
else
	{
		include_once(XOOPS_ROOT_PATH."/modules/$mydirname/language/english/modinfo.php");
	}
if( ! xoops_refcheck() ) die( ""._MI_SENDME_MSGNOTALLOWED."" ) ;

  xoops_cp_header();
 $myts =& MyTextSanitizer::getInstance();
 
$_SESSION['name']= $myts->makeTareaData4Save($_POST["name"]);
$_SESSION['email']=  $myts->makeTareaData4Save($_POST["email"]);
$_SESSION['subject']=   $myts->makeTareaData4Save($_POST["subject"]);
$_SESSION['comment']=    $myts->makeTareaData4Save($_POST["comment"]);

$name = $myts->makeTboxData4Save($_POST["name"]);
$comment = $myts->makeTboxData4Save($_POST["comment"]);
$email = $myts->makeTboxData4Save($_POST["email"]);
$subject = $myts->makeTboxData4Save($_POST["subject"]);
$adminMessage = $myts->makeTboxData4Save($_POST["comment"]);
$datetime=date("d/m/y H:i:s"); // create date and time
$to = $myts->makeTboxData4Save($_POST["email"]);
// Check COMMENT,NAME,TITLE,EMAIL.. WERE INSERTED OR NOT
   if (!empty($_POST['submit'])) {
}
// Check COMMENT
  if ( empty($_POST["comment"])) {
    redirect_header(XOOPS_URL . "/modules/$mydirname/admin/admin_send.php" , 3, ""._MI_SENDME_NOCOMMENT."");
     }
// Check NAME
     if ( empty($_POST["name"])) {
    redirect_header(XOOPS_URL . "/modules/$mydirname/admin/admin_send.php" , 3, ""._MI_SENDME_NONAME."");
  }
// Check TITLE
      if ( empty($_POST["subject"])) {
    redirect_header(XOOPS_URL . "/modules/$mydirname/admin/admin_send.php" , 3, ""._MI_SENDME_NOTITLE."");
  }

// Check EMAIL
   if ( empty($_POST["email"])) {
	redirect_header(XOOPS_URL . "/modules/$mydirname/admin/admin_send.php" , 3, _MI_SENDME_NOEMAIL);
  } else if (!ereg("^[0-9a-zA-Z_\.\-]+@[0-9a-zA-Z][0-9a-zA-Z\.\-]+$",$_POST["email"])) {
    redirect_header(XOOPS_URL . "/modules/$mydirname/admin/admin_send.php" , 3, _MI_SENDME_EMAIL_NOT_OK);
   }
//Send the Mail

    $subjects = $xoopsConfig['sitename']." - "."$subject";
    $xoopsMailer =& getMailer();
    $xoopsMailer->useMail();
    $xoopsMailer->setToEmails($to);
    $xoopsMailer->setFromEmail($xoopsConfig['adminmail']);
    $xoopsMailer->setFromName($xoopsConfig['sitename']);
    $xoopsMailer->setSubject($subjects);
    $xoopsMailer->setBody($adminMessage);
    $xoopsMailer->send();

if($xoopsMailer){
  echo"<center>"._MI_SENDME_ADMIN_MESSAGE_SENT."</center><META HTTP-EQUIV=\"Refresh\" Content=5;URL=\"admin_send.php\">";
}else{
echo""._MI_SENDME_ERROR_MESSAGE."..";
}

// End the sending mail
// Save copy
if ( $_POST['copy'] == '1' ) {
$sql="INSERT INTO ".$xoopsDB->prefix("sendme_copy")."(name, comment, subject, email, datetime)VALUES('$name', '$comment', '$subject', '$email', '$datetime')";
$result=mysql_query($sql);
   if ( $result ) {

        echo"<center>"._MI_SENDME_MSG_COMMENT_ADDED_TO_SENT_BOX."</center><META HTTP-EQUIV=\"Refresh\" Content=5;URL=\"admin_send.php\">";
             } else {

    echo""._MI_SENDME_MSG_CANT_ADD_TO_SENT_BOX."";
   }
   }
  xoops_cp_footer();

?>