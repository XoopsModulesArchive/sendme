<?php
/*
* NAME : SENDME MODULE FOR XOOPS
* AUTHOR : ONASRE <������ >
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
define("_MI_SENDME_FOLLOWUP","������ ������� �������");
define("_MI_SENDME_FOLLOWUP_DESC","�� ���� ����� ��� ������ ����� ������ ������ ��� ������");
define("_MI_SENDME_NOTIFY","����� ������ ������ �����");
define("_MI_SENDME_ADNOTFIYSUB","���� ����� ����");
define("_MI_SENDME_ADNOTFIY","�� ����� ����� �� ���� ������ ������ ");
define("_MI_SENDME_ADNOTFIY1","��� ���� �� ����");
define("_MI_SENDME_ADNOTFIY2","��� �������");
// Add Message errors
define("_MI_SENDME_NOCOMMENT","�� ����  �� �������");
define("_MI_SENDME_LONGCOMMENT","�� ������� ���� �� ������");
define("_MI_SENDME_NOTITLE","�� ���� ����� �������");
define("_MI_SENDME_NONAME","�� ���� ����");
define("_MI_SENDME_NOEMAIL","�� ���� ���� ��������");
define("_MI_SENDME_EMAIL_NOT_OK","������ ���������� ������ �����");
define("_MI_SENDME_NOEMAIL_TO","�� ���� ����� ����� ������ ��");
define("_MI_SENDME_ERROR_CODE","����� ������ ������ �����");
define("_MI_SENDME_MESSAGE_SENT","�� ����� ������� .. ���� ��");
define("_MI_SENDME_MESSAGE_SENT1","�� ����� ������� ����� ����� � .");
define("_MI_SENDME_ERROR_MESSAGE","�� ����� �� ����� ������ . ���� ��� ����");
define("_MI_SENDME_PASSWORD","�� ���� �� ������� �� �������");
define("_MI_SENDME_NOPASSWORD","�� ���� ���� ����");
define("_MI_SENDME_NOTIK_ID","�� ���� ��� �������");
define("_MI_SENDME_NOTIK_FOUND","��� ������� �� ���� ���� ��� ������� .. �� ���� �� ��� ������ ������� ��������");

//SEND PAGE
define("_MI_SENDME_INDEX_PAGE","������ ����� ������");
define("_MI_SENDME_EMAIL_SEND_NOW","����");
define("_MI_SENDME_CODE","�� ������ ����� ���� ���� �������");
define("_MI_SENDME_YOUR_COMMENT","������");
define("_MI_SENDME_YOUR_COMMENTRETURN_NO","��� �������");
define("_MI_SENDME_YOUR_COMMENTRETURN_NO2","�� ����� .. ������ ���� �� ���� ��� ������� ������� ���� ������� ������� �� ������� ��� ����� .. ���� �� �� ������� ����� ���� ��� ����� ������");
define("_MI_SENDME_YOUR_RETURNS","������ �����");
define("_MI_SENDME_RETURN_PASSWORD","���� ����");
define("_MI_SENDME_RETURN_TIKET_NO","��� �������");
define("_MI_SENDME_RETURN_REDIERECT","���� ����� ������ ������ �������  ...");
define("_MI_SENDME_YOUR_COMMENT_COUNTS","��� ������ ��������");
// DropDown
// The List
define("_MI_SENDME_PRORITY","��� ����� �������");
define("_MI_SENDME_PSTATS","������");
define("_MI_SENDME_PH","��� ���");
define("_MI_SENDME_PM","���");
define("_MI_SENDME_PK","�����");
define("_MI_SENDME_PL","����");


// DELETE THINGS
define("_MI_ERORR_DELETED","�� ��� ��� ������� .. ���� ���");
define("_MI_DELETED_OK","�� ��� ������� ... ");
define("_MI_SENDME_DELETEALL","���");
define("_MI_SENDME_DELETE_ALERT","������ : ��� ��� ����� ���� ���
�� ������ ������� ��� ��� ����� ����� �� ������ �����");

// ATTACHMENT THINGS
define("_MI_SENDME_ATTACHMENTS","���� ���");
define("_MI_SENDME_ATTACHMENTS1","��� ���� ��� ����� ������ �� ������ . ������ ����� ��� ����� ��. ");
define("_MI_SENDME_ATTACHMENTS2","��� ���� ��� ����� ������ �� ������ . ��� ����� ���� ����");
define("_MI_SENDME_ATTACHMENTS3","���� ����� �� ����� ����� .. ���� �� ������ ����� ���� ����� ��� .. �� ������ ������ �� ��� �� ����� ���");
define("_MI_SENDME_ATTACHMENTS4","�� ����� ���� � ");
define("_MI_SENDME_ATTACHMENTS_MAX_SIZE","��� ������");
define("_MI_SENDME_ATTACHMENTS_MAX_SIZEDSC","��� ���� ��� �������� ��������� ���� ���� ������ ������� <br> 1048576 ==> 1M");
define("_MI_SENDME_ATTACHMENTS_STORE","���� ���� ��������");
define("_MI_SENDME_ATTACHMENTS_STOREDSC","��� ��� ������ ���� ����� �� �������� ������� ������ ������� 777 ���� ��� ������� / ������� ���� ��� ������ ");
define("_MI_SENDME_ATTACHMENTS_EXT","������ ������ ��� �� �������");
define("_MI_SENDME_ATTACHMENTS_EXTDSC","���� ������� ��� ��������� ���� �� ����� ����� �������� �� ������� ");
define("_MI_SENDME_ATTACHMENTS_NOT_FOUND","�� ��� ������ ��� ����� .. ���� �� ���� ��������  ����� ��� �����");
define("_MI_SENDME_OPENATTACHMENT_ALERT","���� ����� ������ ��� ����� . ���� ����� ������� ������ ������ ��� ��� ������");
//ADMIN INDEX
define("_MI_SENDME_SUBJECT","����� �������");
define("_MI_SENDME_SENDER_NAME","��� ������");
define("_MI_SENDME_EMAIL","����� ������");
define("_MI_SENDME_EMAIL2","���� ��� ");
define("_MI_SENDME_SENDTIME","��� �������");
define("_MI_SENDME_SENDERIPS","���� ������");
define("_MI_SENDME_ATTACHMENT","��������");
define("_MI_SENDME_NO_ATTACHMENT","������");

define("_MI_SENDME_SELECTALL","����� ����");
define("_MI_SENDME_DESELECTALL","�����");
define("_MI_SENDME_REPLYS","������");
define("_MI_SENDME_STATS","����������");
define("_MI_SENDME_HOW_MANY_INBOX","��� ������� ������� ����  ");
define("_MI_SENDME_MSG_INBOX_NO_READ","����� �����");
define("_MI_SENDME_MSG_INBOX_OLD","����� �����");
define("_MI_SENDME_MSG_TOTAL_INBOX","������� ����� �������");
define("_MI_SENDME_MSG_REPLYS_NO","����� ������");
define("_MI_SENDME_MSGNEXT","������");
define("_MI_SENDME_MSGPRV","������");
define("_MI_SENDME_SAVEACOPY","�������� ����� �� ����� ������");
define("_MI_SENDME_YES","���");

define("_MI_SENDME_MAINPAGE","���� �������");
define("_MI_SENDME_ABOUT","�������");
define("_MI_SENDME_MOD_NAME","��� ��������");

//ADMIN READ & SEND MESSAGE
define("_MI_SENDME_BY_SUBJECT","����� �������  : ");
define("_MI_SENDME_BY_THE_COMMENT","[ �������]");
define("_MI_SENDME_BY","����� �� ��� : ");
define("_MI_SENDME_TO","�����  ��� ");
define("_MI_SENDME_SENDER_ADMINNAME","�������");
define("_MI_SENDME_SENDER_ADMINRE","�� ������� ");
define("_MI_SENDME_ADMIN_MESSAGE_SENT","�� ����� ������� ... ���� ����� ������ ������ �������");
define("_MI_SENDME_EMAIL_BY","������ ����������  : ");
define("_MI_SENDME_EMAIL_TO","�� ����� ������ �������");
define("_MI_SENDME_SENT_TIME","��� �������  : ");
define("_MI_SENDME_SENT_IP","���� ������  : ");
define("_MI_SENDME_BY_ID","�����  : ");
define("_MI_SENDME_SENDER_REPLYED","���� : ");
define("_MI_SENDME_SENDER_REPLYEDs","����� ������");
define("_MI_SENDME_SENDER_THE_Q","���� �����");
define("_MI_SENDME_SENDER_REPLYED_SENT","�� ����� ��� ");
define("_MI_SENDME_SENDER_REPLYED_SAVED","�� ��� ���� �� ����� �������� ������� ����� ������ ���� �� ���� ������ ����� .. ");
define("_MI_SENDME_ERROR_MAIL","��� ���� ��� ����� ������� ����� ����� ���� ..");
define("_MI_SENDME_SENDER_REPLYED_VIEW_NOW","���� ���� ��� ");
define("_MD_SENDME_NOMESGID","������� �������� ��� ������");
define("_MI_SENDME_INBOX_VIEW","����� �����  ");
define("_MI_SENDME_SENDS4","������ ����� : [ ");
define("_MI_SENDME_SENDS_2","]�.. ���� ����� ������ :  ");
define("_MI_SENDME_SENDS3","������� ����� �� : [ ");
define("_MI_SENDME_SENDS_3","���� ���� �� ������ .. ");
define("_MI_SENDME_SENDS_5","���� ������� ��� ...");
define("_MI_SENDME_BACKTO_ADMIN_SENT","���� ������ ������");

//ADMIN SAVE COPY MESSAGE
define("_MI_SENDME_MSGNOTALLOWED","������ ������ ������ ������");
define("_MI_SENDME_MSG_COMMENT_ADDED_TO_SENT_BOX","�� ��� ���� �� ������� �� ����� ������");
define("_MI_SENDME_MSG_CANT_ADD_TO_SENT_BOX","��� ���� ��� ��� ���� �� ����� ������");

//ADMIN MENU
define("_MI_SENDME_GENERALSET","�������� ������");
define("_MI_SENDME_MSGINBOXSENTSAVED","����� ��������");
define("_MI_SENDME_EMAILADMIN","���� �����");
define("_MI_SENDME_MSGINBOXRETURN","����� ������");


//SETTING AND CONFIG
define("_MI_SENDME_WIDTH","��� �������");
define("_MI_SENDME_WIDTHDSC","�� ���� ������ ���� ���� ������� ");
define("_MI_SENDME_COMMENT_HEIGH","��� ����� �������");
define("_MI_SENDME_COMMENT_HEIGHDSC","��� ������ ����� ����� �����");
define("_MI_SENDME_COMMENT_WIDTH","��� ����� �������");
define("_MI_SENDME_COMMENT_WIDTHDSC","��� ��� ����� ����� �����");
define("_MI_SENDME_PERPAGE","��� �������");
define("_MI_SENDME_PERPAGEDSC","��� ������� �� ���� �������");
define("_MI_SENDME_CAPTCHA","����� ���� ������");
define("_MI_SENDME_CAPTCHADSC","");
define("_MI_SENDME_AD","�������");
define("_MI_SENDME_ADDESC","������� ���� ��� ���� �� ���� ���� ���� ���");
define("_MI_SENDME_FOOTER","������");
define("_MI_SENDME_FOOTER_DESC","�� ������ �� ���� ���� ���� ���");
define("_MI_SENDME_EDITORS","���� DHTML");
define("_MI_SENDME_EDITORS_DESC","����� �� ����� ������ �������");
define("_MI_SENDME_ALLOWED_type","���������� ������� ���");
define("_MI_SENDME_ALLOWED_typeDSC","���� ��� ��������� ������ .. �� ����� ��� �������� �� ��� ���� �� ������ ���� ����� ����� ���������<br>image/jpeg <br> image/png <br>image/gif <br> application/zip <br> audio/mpeg <br>audio/x-wav <br>application/pdf <br>application/msword<br>text/plain");
define("_MI_SENDME_FROM_ADMIN_AREA","������� �������");
define("_MI_SENDME_FROMDSC","������� ���� ����� ������� ������� �� ���� ������� ����� ���� �����");
define("_MI_SENDME_AUTORESPOND","����� ���� ����� ");
define("_MI_SENDME_AUTORESPOND_DSC"," ");
define("_MI_SENDME_AUTORESPOND_MSG","�� �� ������� ���� ���� �����  �� ���� ��� ������ ���� �����");
define("_MI_SENDME_AUTORESPOND_MSG_DSC","");

?>