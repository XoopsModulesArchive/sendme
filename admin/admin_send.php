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
$mydirname = basename( dirname( dirname( __FILE__ ) ) ) ;
 //include("../../../mainfile.php");
include '../../../include/cp_header.php';

if ( file_exists(XOOPS_ROOT_PATH."/modules/$mydirname/language/".$xoopsConfig['language']."/modinfo.php") )
	{
		include_once(XOOPS_ROOT_PATH."/modules/$mydirname/language/".$xoopsConfig['language']."/modinfo.php");
	}
else
	{
		include_once(XOOPS_ROOT_PATH."/modules/$mydirname/language/english/modinfo.php");
	}
  xoops_cp_header();
global $xoopsConfig, $xoopsTheme, $xoopsUser, $xoopsModule;

include_once("./header.php");

//// Dhtml Forum
 $u_name = ( isset($_SESSION['description']) )? $_SESSION['name'] : '';
 $u_email = ( isset($_SESSION['comment']) )? $_SESSION['email'] : '';
 $u_subject = ( isset($_SESSION['description']) )? $_SESSION['subject'] : '';
 $ycomment = ( isset($_SESSION['comment']) )? $_SESSION['comment'] : '';

xoops_load('xoopsformloader');
$form = new XoopsThemeForm(_MI_SENDME_INDEX_PAGE, "form_name", "do_send.php");
$text_name = new XoopsFormText(_MI_SENDME_SENDER_NAME, "name", 60, 60, $u_name);
$text_email = new XoopsFormText(_MI_SENDME_EMAIL_TO, "email", 60, 60, $u_email);
$text_subject = new XoopsFormText(_MI_SENDME_SUBJECT, "subject", 60, 60, $u_subject);
$form->addElement($text_name);
$form->addElement($text_email);
$form->addElement($text_subject);

$copy_checkbox = new XoopsFormCheckBox(_MI_SENDME_SAVEACOPY, 'copy');
$copy_checkbox->addOption(1, _MI_SENDME_YES);
$form->addElement($copy_checkbox);
	$t_area = new XoopsFormDhtmlTextArea(_MI_SENDME_YOUR_COMMENT, 'comment', $ycomment, 13, 60);
	$form->addElement($t_area);

$submit = new XoopsFormButton("", "submit", _MI_SENDME_EMAIL_SEND_NOW, "submit");
$form->addElement($submit);
$form->display();
unset($_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['subject']);
unset($_SESSION['comment']);
// End Dhtml Forum
  xoops_cp_footer();
?>