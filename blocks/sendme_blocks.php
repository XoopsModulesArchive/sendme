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

function b_sendme_blocks_show($options) {

global $xoopsDB;
$mydirname = basename( dirname( dirname( __FILE__ ) ) ) ;

         $block['lang_send'] = _MB_SENDME_SENDMSG;
         $block['lang_name'] = _MB_SENDME_MSGNAME;
         $block['lang_subject'] = _MB_SENDME_SUBJECT;
         $block['lang_email'] = _MB_SENDME_EMAIL;
         $block['lang_comment'] = _MB_SENDME_MESSAGE;
         $block['lang_code'] = _MB_SENDME_CODE;
         $block['mydirname'] = $mydirname;
//To get the option value from the module config
// for 2,4X
/*
$module_handler =& xoops_gethandler('module');
$module =& $module_handler->getByDirname('sendme');
$config_handler =& xoops_gethandler('config');
if ($module) {
$moduleConfig =& $config_handler->getConfigsByCat(0, $module->getVar('mid'));
}
$block['captcha'] = $moduleConfig['CAPTCH'];
*/
//for 2.5
$block['captcha'] = xoops_getModuleOption('CAPTCH', $mydirname);
//for 2.5
return $block;
 }

function b_sendme_blocks_edit($options) {
    /*
    $form = "<br />". _MB_SENDME_ANTI_SPAMS .":&nbsp;<select size='1' name='options[0]'><option value='1'";
    if ( $options[0] == 1 ) {
        $form .= " selected";
    }
    $form .= " />Yes</option><option value='0'";
    if ( $options[0] == 0 ) {
        $form .= " selected";
    }
    $form .= " />No</option></select>";
    return $form;
     */
     }

?>