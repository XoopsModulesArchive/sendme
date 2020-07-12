<?php
//session_start();
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
 global $xoopsConfig, $xoopsTheme, $xoopsModuleConfig, $xoopsModule;
if ( file_exists(XOOPS_ROOT_PATH."/modules/$mydirname/language/".$xoopsConfig['language']."/modinfo.php") )
	{
		include_once(XOOPS_ROOT_PATH."/modules/$mydirname/language/".$xoopsConfig['language']."/modinfo.php");
	}
else
	{
		include_once(XOOPS_ROOT_PATH."/modules/$mydirname/language/english/modinfo.php");
	}
//if (isset($_REQUEST['_SESSION'])) die("Get lost !");

 $comment = ( isset($_SESSION['comment']) )? $_SESSION['comment'] : '';
///Dhtml Forum
$xoopsOption['template_main']= "sendme_dhtml.html";
include_once("../../header.php");
xoops_load('xoopsformloader');
$xoopsTpl->assign('theForm', $form = new XoopsThemeForm(_MI_SENDME_INDEX_PAGE, "form_name", "send.php"));
$form->setExtra("enctype='multipart/form-data'");
$xoopsTpl->assign('theForm', $text_captcha = new XoopsFormText(_MI_SENDME_CODE, "captcha_num", 20, 30));
$xoopsTpl->assign('theForm', $text_name = new XoopsFormText(_MI_SENDME_SENDER_NAME, "name", 60, 60));
$xoopsTpl->assign('theForm', $text_email = new XoopsFormText(_MI_SENDME_EMAIL, "email", 60, 60));
$xoopsTpl->assign('theForm', $text_subject = new XoopsFormText(_MI_SENDME_SUBJECT, "subject", 60, 60));
if ($xoopsModuleConfig['allow_followup']== 1) {
$xoopsTpl->assign('theForm', $text_password = new XoopsFormPassword(_MI_SENDME_PASSWORD, "password", 50, 30));
}
$Priority = new XoopsFormSelect(_MI_SENDME_PRORITY, 'Priority');
$Priority->addOptionArray(array(''=>"", _MI_SENDME_PH=>_MI_SENDME_PH, _MI_SENDME_PM=>_MI_SENDME_PM, _MI_SENDME_PK=>_MI_SENDME_PK, _MI_SENDME_PL=>_MI_SENDME_PL));
$xoopsTpl->assign('theForm', $verifyImg = new XoopsFormLabel('', '<img src="captcha_sendme.php" align="middle">'));

$xoopsTpl->assign('theForm', $form->addElement($text_name));
$xoopsTpl->assign('theForm', $form->addElement($text_email));
$xoopsTpl->assign('theForm', $form->addElement($text_subject));
$xoopsTpl->assign('theForm', $form->addElement($text_password));
$form->addElement($Priority);
if ($xoopsModuleConfig['upload_allow']== 1) {
$form->addElement(new XoopsFormFile(_MI_SENDME_ATTACHMENTS, 'xoops_upload_file', 0), false);
$form->addElement(new XoopsFormlabel(_MI_SENDME_ALLOWED_type, $xoopsModuleConfig['allowed_type']));
}
//////////
if ($xoopsModuleConfig['editors']== 1) {
	$editor = new XoopsFormDhtmlTextArea(_MI_SENDME_YOUR_COMMENT, 'comment', $comment, $xoopsModuleConfig['textboxheight'], $xoopsModuleConfig['textboxwidth']);
  }else{
	$editor = new XoopsFormTextArea(_MI_SENDME_YOUR_COMMENT, 'comment', $comment, $xoopsModuleConfig['textboxheight'], $xoopsModuleConfig['textboxwidth']);
	 }
	$editor->setExtra('onKeyDown="textCounter(document.getElementById(\'comment\'), this.form.remLen, '.$xoopsModuleConfig['MESSAGE_LENGTH'].');"  onKeyUp="textCounter(document.getElementById(\'formdata[text]\'), this.form.remLen, '.$xoopsModuleConfig['MESSAGE_LENGTH'].');"');
	$form->addElement($editor);
//	unset($editor);
unset($_SESSION['comment']);
//letters Counting
	$chars = new XoopsFormText(_MI_SENDME_YOUR_COMMENT_COUNTS, 'remLen', 4, 10, $xoopsModuleConfig['MESSAGE_LENGTH']);
	$chars->setExtra('readonly');
	$form->addElement($chars);
	unset($chars);
//
$captcha = $xoopsModuleConfig['CAPTCH'];
if ($captcha== 1) {
$xoopsTpl->assign('theForm', $form->addElement($verifyImg));
$xoopsTpl->assign('theForm', $form->addElement($text_captcha));
 }
 
$xoopsTpl->assign('theForm', $submit = new XoopsFormButton("", "submit", _MI_SENDME_EMAIL_SEND_NOW, "submit"));
$xoopsTpl->assign('theForm', $form->addElement($submit));
$xoopsTpl->assign('theForm', $form->render());

	$xoopsTpl->assign('introtext', $xoopsModuleConfig['INTRO']);
  $xoopsTpl->assign('footertext', $xoopsModuleConfig['FOOTER']);
  
//login to read reply box
	$followup = $xoopsModuleConfig['allow_followup'];
	$xoopsTpl->assign('followup', $followup);

$sform = new XoopsThemeForm(_MI_SENDME_YOUR_RETURNS, "returnform", "read_reply.php");
$sform->addElement(new XoopsFormText(_MI_SENDME_RETURN_TIKET_NO, 'id', 20, 30));
$sform->addElement(new XoopsFormPassword(_MI_SENDME_RETURN_PASSWORD, 'password', 20, 30));
$button_tray = new XoopsFormElementTray('' ,'');
$button_tray->addElement(new XoopsFormButton('', 'submit', _MI_SENDME_EMAIL_SEND_NOW, 'submit'));
$sform->addElement($button_tray);
if ($followup== 1) {
$xoopsTpl->assign('sform', $sform->render());
//end login to read reply box
} else {
$xoopsTpl->assign('sform', '');
}

echo "<div align='right'><small><a href='http://www.wildhelp.com/' target='_blank'>SendMe v1.6</a></small></div>";
include("../../footer.php");
?>