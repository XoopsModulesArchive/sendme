<?php
/*
* NAME : SENDME MODULE FOR XOOPS
* AUTHOR : ONASRE <«Ê‰«”— >
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
//SendMe v1.5
define("_MI_SENDME_FOLLOWUP","«·”„«Õ »„ «»⁄… «·—”«·…");
define("_MI_SENDME_FOLLOWUP_DESC","›Ì Õ«·… «Œ —  ‰⁄„ Ì” ÿÌ⁄ «·⁄÷Ê „ «»⁄… «·—œÊœ ⁄·Ï —”«· Â");
define("_MI_SENDME_NOTIFY"," »·Ì€ «·„œÌ— »—”«·… ÃœÌœÂ");
define("_MI_SENDME_ADNOTFIYSUB","·œÌﬂ —”«·… ÃœÌœ");
define("_MI_SENDME_ADNOTFIY"," „ «—”«· —”«·… „‰ ’«Õ» «·«Ì»Ì «· «·Ì ");
define("_MI_SENDME_ADNOTFIY1","Êﬁœ «—”· ·ﬂ ÌﬁÊ·");
define("_MI_SENDME_ADNOTFIY2","Êﬁ  «·«—”«·");
// Add Message errors
define("_MI_SENDME_NOCOMMENT","·„  ﬂ »  ‰’ «·—”«·…");
define("_MI_SENDME_LONGCOMMENT","‰’ «·—”«·… «ﬁ’Ï „‰ «·„Õœœ");
define("_MI_SENDME_NOTITLE","·„  ﬂ » „Ê÷Ê⁄ «·—”«·…");
define("_MI_SENDME_NONAME","·„  ﬂ » «”„ﬂ");
define("_MI_SENDME_NOEMAIL","·„  ﬂ » »—Ìœ «·ﬂ —Ê‰Ì");
define("_MI_SENDME_EMAIL_NOT_OK","«·»—Ìœ «·«·ﬂ —Ê‰Ì ·«Ì»œÊ ’ÕÌÕ«");
define("_MI_SENDME_NOEMAIL_TO","·„  ﬂ » «Ì„Ì· «·⁄÷Ê «·„—”· ·Â");
define("_MI_SENDME_ERROR_CODE","«·—„“ «·«„‰Ì ·«Ì»œÊ ’ÕÌÕ«");
define("_MI_SENDME_MESSAGE_SENT"," „ «—”«· «·—”«·… .. ‘ﬂ—« ·ﬂ");
define("_MI_SENDME_MESSAGE_SENT1"," „ «—”«· «·—”«·… ·»—Ìœ «·⁄÷Ê Ê .");
define("_MI_SENDME_ERROR_MESSAGE","·„ ‰ „ﬂ‰ „‰ «—”«· —”«· ﬂ . Õ«Ê· „—Â «Œ—Ï");
define("_MI_SENDME_PASSWORD","÷⁄ ﬂ·„… ”— ·„ «»⁄… —œ «·«œ«—…");
define("_MI_SENDME_NOPASSWORD","·„  ﬂ » ﬂ·„… «·”—");
define("_MI_SENDME_NOTIK_ID","·„  ﬂ » —ﬁ„ «·—”«·…");
define("_MI_SENDME_NOTIK_FOUND","—ﬁ„ «· –ﬂ—… «Ê ﬂ·„… «·”— €Ì— „ ÿ«»ﬁ… .. «Ê —»„«  „ Õ–› —”«· ﬂ ·«‰ Â«¡ «·’·«ÕÌ…");

//SEND PAGE
define("_MI_SENDME_INDEX_PAGE","„—«”·… «œ«—… «·„Êﬁ⁄");
define("_MI_SENDME_EMAIL_SEND_NOW","«—”·");
define("_MI_SENDME_CODE","ﬁ„ »ﬂ «»… «·—ﬁ„ «·–Ì ÌŸÂ— »«·’Ê—…");
define("_MI_SENDME_YOUR_COMMENT","—”«· ﬂ");
define("_MI_SENDME_YOUR_COMMENTRETURN_NO","—ﬁ„ «·—”«·…");
define("_MI_SENDME_YOUR_COMMENTRETURN_NO2"," „ «—”«· .. —”«· ﬂ —Ã«¡ ﬁ„ »Õ›Ÿ —ﬁ„ «·—”«·… »«·«”›· ·«‰ﬂ ” Õ «ÃÂ ·„ «»⁄… —œ «·«œ«—… ⁄·Ï ”ƒ«·ﬂ .. ⁄·„« «‰ —œ «·«œ«—… ”Ì’·ﬂ «Ì÷« ⁄·Ï »—Ìœﬂ «·„œŒ·");
define("_MI_SENDME_YOUR_RETURNS","„ «»⁄… —”«·…");
define("_MI_SENDME_RETURN_PASSWORD","ﬂ·„… «·”—");
define("_MI_SENDME_RETURN_TIKET_NO","—ﬁ„ «·—”«·…");
define("_MI_SENDME_RETURN_REDIERECT","”Ì „ «⁄«œ…  ÊÃÌÂﬂ ··’›Õ… «·”«»ﬁ…  ...");
define("_MI_SENDME_YOUR_COMMENT_COUNTS","⁄œœ «·«Õ—› «·„ »ﬁÌ…");
// DropDown
// The List
define("_MI_SENDME_PRORITY","Õœœ «Â„Ì… «·—”«·…");
define("_MI_SENDME_PSTATS","«·Õ«·…");
define("_MI_SENDME_PH","„Â„ Ãœ«");
define("_MI_SENDME_PM","„Â„");
define("_MI_SENDME_PK","„ Ê”ÿ");
define("_MI_SENDME_PL","⁄«œÌ");


// DELETE THINGS
define("_MI_ERORR_DELETED","·„ Ì „ Õ–› «·—”«·… .. Â‰«ﬂ Œÿ√");
define("_MI_DELETED_OK"," „ Õ–› «·—”«·… ... ");
define("_MI_SENDME_DELETEALL","Õ–›");
define("_MI_SENDME_DELETE_ALERT","„·«ÕŸ… : ⁄‰œ Õ–› —”«·… ”Ì „ Õ–›
ﬂ· «·—œÊœ «· «»⁄Â ·Â« Ê·‰ Ì „ﬂ‰ «·⁄÷Ê „‰ „ «»⁄… —œÊœÂ");

// ATTACHMENT THINGS
define("_MI_SENDME_ATTACHMENTS","«—›ﬁ „·›");
define("_MI_SENDME_ATTACHMENTS1","€Ì— ﬁ«œ— ⁄·Ï «—”«· —”«· ﬂ „⁄ «·„—›ﬁ . «„ œ«œ «·„·› €Ì— „”„ÊÕ »Â. ");
define("_MI_SENDME_ATTACHMENTS2","€Ì— ﬁ«œ— ⁄·Ï «—”«· —”«· ﬂ „⁄ «·„—›ﬁ . ÕÃ„ «·„·› Ì»œÊ ﬂ»Ì—");
define("_MI_SENDME_ATTACHMENTS3","Â‰«ﬂ „‘ﬂ·… ›Ì «—›«ﬁ «·„·› .. —Ã«¡ ﬁ„ »ﬂ «»… —”«·… »œÊ‰ «—›«ﬁ „·› .. „⁄ „·«ÕŸ… ··„œÌ— ⁄‰ ⁄ÿ· ›Ì «—›«ﬁ „·›");
define("_MI_SENDME_ATTACHMENTS4"," „ «—›«ﬁ „·›ﬂ Ê ");
define("_MI_SENDME_ATTACHMENTS_MAX_SIZE","ÕÃ„ «·„—›ﬁ");
define("_MI_SENDME_ATTACHMENTS_MAX_SIZEDSC","Õœœ «ﬁ’Ï ÕÃ„ ··„—›ﬁ«  «·«› —«÷Ì Ê«Õœ „ÌÃ« Ê«·ÕÃ„ »«·»«Ì  <br> 1048576 ==> 1M");
define("_MI_SENDME_ATTACHMENTS_STORE","„”«— „Ã·œ «·„—›ﬁ« ");
define("_MI_SENDME_ATTACHMENTS_STOREDSC","Õœœ «”„ «·„Ã·œ «·–Ì ” —›⁄ ·Â «·„—›ﬁ«  Ê·« ‰”Ï «⁄ÿ«¡… «· ’—ÌÕ 777 ÊÌÃ» Ê÷⁄ «·«‘«—… / «·„«∆·… »«Œ— «”„ «·„Ã·œ ");
define("_MI_SENDME_ATTACHMENTS_EXT","«·”„«Õ »«—›«ﬁ „·› „⁄ «·—”«·…");
define("_MI_SENDME_ATTACHMENTS_EXTDSC"," «ﬂœ »«·”„«Õ ›ﬁÿ ··«„ œ«œ  «· Ï ·«  ⁄ »— ŒÿÌ—… ·«—›«ﬁÂ« „⁄ «·—”«·… ");
define("_MI_SENDME_ATTACHMENTS_NOT_FOUND","·„ Ì „ «·⁄ÀÊ— ⁄·Ï «·„·› ..  «ﬂœ „‰ „Ã·œ «·„—›ﬁ«   ÌÕ ÊÏ ⁄·Ï «·„·›");
define("_MI_SENDME_OPENATTACHMENT_ALERT","—»„« ÌÕ ÊÏ «·„—›ﬁ ⁄·Ï ›Ì—Ê” .  ›Õ’ «·„·› »»—‰«„Ã «·«‰ Ì ›«Ì—Ê” ﬁ»· › Õ «·„—›ﬁ");
//ADMIN INDEX
define("_MI_SENDME_SUBJECT","„Ê÷Ê⁄ «·—”«·…");
define("_MI_SENDME_SENDER_NAME","«”„ «·ﬂ« »");
define("_MI_SENDME_EMAIL","«Ì„Ì· «·„—”·");
define("_MI_SENDME_EMAIL2","«—”· «·Ï ");
define("_MI_SENDME_SENDTIME","Êﬁ  «·«—”«·");
define("_MI_SENDME_SENDERIPS","«Ì»Ì «·„—”·");
define("_MI_SENDME_ATTACHMENT","«·„—›ﬁ« ");
define("_MI_SENDME_NO_ATTACHMENT","·«ÌÊÃœ");

define("_MI_SENDME_SELECTALL"," ÕœÌœ «·ﬂ·");
define("_MI_SENDME_DESELECTALL"," —«Ã⁄");
define("_MI_SENDME_REPLYS","«·—œÊœ");
define("_MI_SENDME_STATS","«·«Õ’«∆Ì« ");
define("_MI_SENDME_HOW_MANY_INBOX","⁄œœ «·—”«∆· «·ÃœÌœ… ·œÌﬂ  ");
define("_MI_SENDME_MSG_INBOX_NO_READ","—”«∆· ÃœÌœ…");
define("_MI_SENDME_MSG_INBOX_OLD","—”«∆· ﬁœÌ„…");
define("_MI_SENDME_MSG_TOTAL_INBOX","«·„Ã„Ê⁄ «·ﬂ·Ì ··—”«∆·");
define("_MI_SENDME_MSG_REPLYS_NO","„Ã„Ê⁄ «·—œÊœ");
define("_MI_SENDME_MSGNEXT","«· «·Ì");
define("_MI_SENDME_MSGPRV","«·”«»ﬁ");
define("_MI_SENDME_SAVEACOPY","«·«Õ ›«Ÿ »‰”Œ… ›Ì ’‰œÊﬁ «·’«œ—");
define("_MI_SENDME_YES","‰⁄„");

define("_MI_SENDME_MAINPAGE","’›Õ… «·„ÊœÌ·");
define("_MI_SENDME_ABOUT","«·„»—„Ã");
define("_MI_SENDME_MOD_NAME","«”„ «·»—‰«„Ã");

//ADMIN READ & SEND MESSAGE
define("_MI_SENDME_BY_SUBJECT","„Ê÷Ê⁄ «·—”«·…  : ");
define("_MI_SENDME_BY_THE_COMMENT","[ «·—”«·…]");
define("_MI_SENDME_BY","«—”·  „‰ ﬁ»· : ");
define("_MI_SENDME_TO","«—”·   «·Ï ");
define("_MI_SENDME_SENDER_ADMINNAME","«·«œ«—Â");
define("_MI_SENDME_SENDER_ADMINRE","—œ «·«œ«—… ");
define("_MI_SENDME_ADMIN_MESSAGE_SENT"," „ «—”«· «·—”«·… ... ”Ì „ «⁄«œ…  ÊÃÌÂﬂ ··’›Õ… «·”«»ﬁ…");
define("_MI_SENDME_EMAIL_BY","«·»—Ìœ «·«·ﬂ —Ê‰Ì  : ");
define("_MI_SENDME_EMAIL_TO","÷⁄ «Ì„Ì· „” ﬁ»· «·—”«·…");
define("_MI_SENDME_SENT_TIME","Êﬁ  «·«—”«·  : ");
define("_MI_SENDME_SENT_IP","«Ì»Ì «·„—”·  : ");
define("_MI_SENDME_BY_ID","«·—ﬁ„  : ");
define("_MI_SENDME_SENDER_REPLYED","«·—œ : ");
define("_MI_SENDME_SENDER_REPLYEDs","ﬁ«∆„… «·—œÊœ");
define("_MI_SENDME_SENDER_THE_Q","”ƒ«· «·⁄÷Ê");
define("_MI_SENDME_SENDER_REPLYED_SENT"," „ «—”«· —œﬂ ");
define("_MI_SENDME_SENDER_REPLYED_SAVED"," „ Õ›Ÿ «·—œ ›Ì ﬁ«⁄œ… «·»Ì«‰«  ÊÌ” ÿÌ⁄ «·⁄÷Ê „‘«Âœ… «·—œ „‰ Œ·«· „ «»⁄… —”«·… .. ");
define("_MI_SENDME_ERROR_MAIL","€Ì— ﬁ«œ— ⁄·Ï «—”«· «·—”«·… ·»—Ìœ «·⁄÷Ê Ê·ﬂ‰ ..");
define("_MI_SENDME_SENDER_REPLYED_VIEW_NOW","‘«Âœ «·—œ Â‰« ");
define("_MD_SENDME_NOMESGID","«·—”«·… «·„ÿ·Ê»… €Ì— „ÊÃÊœÂ");
define("_MI_SENDME_INBOX_VIEW","ﬁ—«¡… —”«·…  ");
define("_MI_SENDME_SENDS4","„‘«Âœ… —”«·… : [ ");
define("_MI_SENDME_SENDS_2","]‹.. Êﬂ«‰ „Ê÷Ê⁄ —”«· ﬂ :  ");
define("_MI_SENDME_SENDS3","«·—”«·… „—”·… „‰ : [ ");
define("_MI_SENDME_SENDS_3","Ê·ﬁœ ﬂ »  ›Ì —”«· ﬂ .. ");
define("_MI_SENDME_SENDS_5","Ê·ﬁœ «—”· Â« «·Ï ...");
define("_MI_SENDME_BACKTO_ADMIN_SENT","⁄Êœ… ·’‰œÊﬁ «·Ê«—œ");

//ADMIN SAVE COPY MESSAGE
define("_MI_SENDME_MSGNOTALLOWED","·«Ì„ﬂ‰ „‘«Âœ… «·’›Õ… „»«‘—…");
define("_MI_SENDME_MSG_COMMENT_ADDED_TO_SENT_BOX"," „ Õ›Ÿ ‰”Œ… „‰ «·—”«·… ›Ì ’‰œÊﬁ «·’«œ—");
define("_MI_SENDME_MSG_CANT_ADD_TO_SENT_BOX","€Ì— ﬁ«œ— ⁄·Ï Õ›Ÿ ‰”Œ… ›Ì ’‰œÊﬁ «·’«œ—");

//ADMIN MENU
define("_MI_SENDME_GENERALSET","«·«⁄œ«œ  «·⁄«„…");
define("_MI_SENDME_MSGINBOXSENTSAVED","’‰œÊﬁ «·’«œ—« ");
define("_MI_SENDME_EMAILADMIN","«—”· —”«·…");
define("_MI_SENDME_MSGINBOXRETURN","’‰œÊﬁ «·Ê«—œ");


//SETTING AND CONFIG
define("_MI_SENDME_WIDTH","ÿÊ· «·—”«·…");
define("_MI_SENDME_WIDTHDSC","÷⁄ «·Õœ «·«ﬁ’Ï ·⁄œœ Õ—Ê› «·—”«·… ");
define("_MI_SENDME_COMMENT_HEIGH","ÿÊ· ’‰œÊﬁ «·—”«·…");
define("_MI_SENDME_COMMENT_HEIGHDSC","Õœœ «— ›«⁄ ’‰œÊﬁ ﬂ «»… —”«·…");
define("_MI_SENDME_COMMENT_WIDTH","⁄—÷ ’‰œÊﬁ «·—”«·…");
define("_MI_SENDME_COMMENT_WIDTHDSC","Õœœ ⁄—÷ ’‰œÊﬁ ﬂ «»… —”«·…");
define("_MI_SENDME_PERPAGE","⁄œœ «·—”«∆·");
define("_MI_SENDME_PERPAGEDSC","⁄œœ «·—”«∆· ›Ì ’›Õ… «·«œ«—…");
define("_MI_SENDME_CAPTCHA"," ›⁄Ì· „«‰⁄ «·”»«„");
define("_MI_SENDME_CAPTCHADSC","");
define("_MI_SENDME_AD","«·„ﬁœ„…");
define("_MI_SENDME_ADDESC","«·—”«·… «· Ì ”Ê›  ŸÂ— ›Ì ÂÌœ— ’›Õ… « ’· »‰«");
define("_MI_SENDME_FOOTER","«·›Ê —");
define("_MI_SENDME_FOOTER_DESC","‰’ «·›Ê — ›Ì «”›· ’›Õ… « ’· »‰«");
define("_MI_SENDME_EDITORS","„Õ—— DHTML");
define("_MI_SENDME_EDITORS_DESC"," ⁄ÿÌ· «Ê  ›⁄Ì· «·„Õ—— «·„ ÿÊ—");
define("_MI_SENDME_ALLOWED_type","«·«„ œ«œ«  «·„”„ÊÕ »Â«");
define("_MI_SENDME_ALLOWED_typeDSC","«›’· »Ì‰ «·«„ œ«œ  »„”«›Â .. „⁄ ﬂ «»… ‰Ê⁄ «·«„ œ«œ «‰ ﬂ«‰ ’Ê—… «Ê »—‰«„Ã ÊÂ–Â ﬁ«∆„… »«‘Â— «·«„ œ«œ <br>image/jpeg <br> image/png <br>image/gif <br> application/zip <br> audio/mpeg <br>audio/x-wav <br>application/pdf <br>application/msword<br>text/plain");
define("_MI_SENDME_FROM_ADMIN_AREA","«·⁄‰Ê«‰ ··—”«·…");
define("_MI_SENDME_FROMDSC","«·⁄‰Ê«‰ «·–Ì ”ÌŸÂ— ·„” ﬁ»· «·—”«·… ›Ì Õ«·… «” Œœ„  ‰„Ê–Ã «—”· —”«·…");
define("_MI_SENDME_AUTORESPOND"," ›⁄Ì· «·—œ «·«·Ì ");
define("_MI_SENDME_AUTORESPOND_DSC"," ");
define("_MI_SENDME_AUTORESPOND_MSG","÷⁄ ‰’ «·—”«·… «· Ì ” ’· ··⁄÷Ê  ›Ì Õ«·… ﬁ„  » ›⁄Ì· «·—œ «·«·Ì");
define("_MI_SENDME_AUTORESPOND_MSG_DSC","");

?>