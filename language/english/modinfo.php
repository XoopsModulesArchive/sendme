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
//SendMe v1.5
define("_MI_SENDME_FOLLOWUP","Allow Message Follow up");
define("_MI_SENDME_FOLLOWUP_DESC","if yes ,Sender Can Track His Message if there is a Answer");
define("_MI_SENDME_NOTIFY","Notfiy Admin when New Mail Received");

define("_MI_SENDME_ADNOTFIYSUB","You have New Email");
define("_MI_SENDME_ADNOTFIY","A Guest Posted Email  And His IP Was ");
define("_MI_SENDME_ADNOTFIY1","The Comment Posted was");
define("_MI_SENDME_ADNOTFIY2","Time Was Sent");
// Add Message errors
define("_MI_SENDME_NOCOMMENT","You Did Not write a message");
define("_MI_SENDME_LONGCOMMENT","The Message too Long");
define("_MI_SENDME_NOTITLE","You did Not write A Subject");
define("_MI_SENDME_NONAME","You did Not write your name");
define("_MI_SENDME_NOEMAIL","You did not write your Email");
define("_MI_SENDME_EMAIL_NOT_OK","Your Email Dose Not look a Real Email!");
define("_MI_SENDME_NOEMAIL_TO","You did not write the Receiver Email ");
define("_MI_SENDME_ERROR_CODE","Security Code wrong");
define("_MI_SENDME_MESSAGE_SENT","Message Was Sent. Thank you");
define("_MI_SENDME_MESSAGE_SENT1","Message Was Sent. To The User Email and .");
define("_MI_SENDME_ERROR_MESSAGE","Message Could Not be Sent , Try again later!");
define("_MI_SENDME_PASSWORD","type a Password ,To Track your Message");
define("_MI_SENDME_NOPASSWORD","No Password ");
define("_MI_SENDME_NOTIK_ID","No Message ID ");
define("_MI_SENDME_NOTIK_FOUND","Password or Message ID Wrong or the Message was Deleted");

//SEND PAGE
define("_MI_SENDME_INDEX_PAGE","Contact Us");
define("_MI_SENDME_EMAIL_SEND_NOW","Send");
define("_MI_SENDME_CODE","type the Security Code");
define("_MI_SENDME_YOUR_COMMENT","The Message");
define("_MI_SENDME_YOUR_COMMENTRETURN_NO","Message No");
define("_MI_SENDME_YOUR_COMMENTRETURN_NO2","Message Sent , Keep the Message Number Below , You need it to Track Your message Later");
define("_MI_SENDME_YOUR_RETURNS","Track Your Message");
define("_MI_SENDME_RETURN_PASSWORD","Password");
define("_MI_SENDME_RETURN_TIKET_NO","Message ID");
define("_MI_SENDME_RETURN_REDIERECT","Redirect You..");
define("_MI_SENDME_YOUR_COMMENT_COUNTS","Litter Left");
// DropDown
// The List
define("_MI_SENDME_PRORITY","Priority");
define("_MI_SENDME_PSTATS","Stats");
define("_MI_SENDME_PH","High");
define("_MI_SENDME_PM","Meduim");
define("_MI_SENDME_PK","OK");
define("_MI_SENDME_PL","Low");


// DELETE THINGS
define("_MI_ERORR_DELETED","Message Could Not be Deleted");
define("_MI_DELETED_OK","Message Deleted");
define("_MI_SENDME_DELETEALL","Delete");
define("_MI_SENDME_DELETE_ALERT","When Message Deleted , All Replys will Be Deleted Too..");

// ATTACHMENT THINGS
define("_MI_SENDME_ATTACHMENTS","Attachment");
define("_MI_SENDME_ATTACHMENTS1","File Format not allowed ");
define("_MI_SENDME_ATTACHMENTS2","File too big");
define("_MI_SENDME_ATTACHMENTS3","Message Could not be Sent with attachemnt , try without attachment");
define("_MI_SENDME_ATTACHMENTS4","File Attached and  ");
define("_MI_SENDME_ATTACHMENTS_MAX_SIZE","Attachment Size");
define("_MI_SENDME_ATTACHMENTS_MAX_SIZEDSC","The Max attachment Size <br> 1048576 ==> 1M");
define("_MI_SENDME_ATTACHMENTS_STORE","Attachment Folder");
define("_MI_SENDME_ATTACHMENTS_STOREDSC","Chmod Folder with 777 and Do not Forget to Put / after the folder Path ");
define("_MI_SENDME_ATTACHMENTS_EXT","Allow Attachments");
define("_MI_SENDME_ATTACHMENTS_EXTDSC","Be aware to allow only Safe Formats");
define("_MI_SENDME_ATTACHMENTS_NOT_FOUND","File Not Found.. Make sure the Folder Exist");
define("_MI_SENDME_OPENATTACHMENT_ALERT","The attachment Might has a Virus Make Sure to Scan the File Before Open it!");
//ADMIN INDEX
define("_MI_SENDME_SUBJECT","Subject");
define("_MI_SENDME_SENDER_NAME","Sender");
define("_MI_SENDME_EMAIL","Email");
define("_MI_SENDME_EMAIL2","Send To");
define("_MI_SENDME_SENDTIME","Time");
define("_MI_SENDME_SENDERIPS","IP");
define("_MI_SENDME_ATTACHMENT","Attachment");
define("_MI_SENDME_NO_ATTACHMENT","None");

define("_MI_SENDME_SELECTALL","Select All");
define("_MI_SENDME_DESELECTALL","Unselect");
define("_MI_SENDME_REPLYS","Replys");
define("_MI_SENDME_STATS","Stats");
define("_MI_SENDME_HOW_MANY_INBOX","New Messages .   ");
define("_MI_SENDME_MSG_INBOX_NO_READ","New Messages");
define("_MI_SENDME_MSG_INBOX_OLD","Old Messages");
define("_MI_SENDME_MSG_TOTAL_INBOX","Total Messages");
define("_MI_SENDME_MSG_REPLYS_NO","Total Replays");
define("_MI_SENDME_MSGNEXT","Next");
define("_MI_SENDME_MSGPRV","Previous");
define("_MI_SENDME_SAVEACOPY","Keep a Copy");
define("_MI_SENDME_YES","Yes");

define("_MI_SENDME_MAINPAGE","Module Page");
define("_MI_SENDME_ABOUT","Author / License");
define("_MI_SENDME_MOD_NAME","Module ");

//ADMIN READ & SEND MESSAGE
define("_MI_SENDME_BY_SUBJECT","Subject : ");
define("_MI_SENDME_BY_THE_COMMENT","[ Message]");
define("_MI_SENDME_BY","Sent By : ");
define("_MI_SENDME_TO","Sent To ");
define("_MI_SENDME_SENDER_ADMINNAME","Admin");
define("_MI_SENDME_SENDER_ADMINRE","Admin Reply ");
define("_MI_SENDME_ADMIN_MESSAGE_SENT","Message Sent .. Redirect You..");
define("_MI_SENDME_EMAIL_BY","Sender Email  : ");
define("_MI_SENDME_EMAIL_TO","Send the Email To :");
define("_MI_SENDME_SENT_TIME","Time Sent  : ");
define("_MI_SENDME_SENT_IP","Sender IP  : ");
define("_MI_SENDME_BY_ID","Message No : ");
define("_MI_SENDME_SENDER_REPLYED","Reply : ");
define("_MI_SENDME_SENDER_REPLYEDs","Replys List");
define("_MI_SENDME_SENDER_THE_Q","Guest Quastion");
define("_MI_SENDME_SENDER_REPLYED_SENT","Reply Sent");
define("_MI_SENDME_SENDER_REPLYED_SAVED","Reply Saved to Database and The User Can Track His Message.");
define("_MI_SENDME_ERROR_MAIL","We Can Not Send the Reply to the User Email , But ..");
define("_MI_SENDME_SENDER_REPLYED_VIEW_NOW","See the Reply ");
define("_MD_SENDME_NOMESGID","Message Not Found");
define("_MI_SENDME_INBOX_VIEW","Read a Message ");
define("_MI_SENDME_SENDS4","View Message : [ ");
define("_MI_SENDME_SENDS_2","]Your Message was .:  ");
define("_MI_SENDME_SENDS3","Message By : [ ");
define("_MI_SENDME_SENDS_3","You Wrote  .. ");
define("_MI_SENDME_SENDS_5","You Sent it to  ...");
define("_MI_SENDME_BACKTO_ADMIN_SENT","Back to Inbox");

//ADMIN SAVE COPY MESSAGE
define("_MI_SENDME_MSGNOTALLOWED","Not Allowed");
define("_MI_SENDME_MSG_COMMENT_ADDED_TO_SENT_BOX","a Copy of the Message was Saved");
define("_MI_SENDME_MSG_CANT_ADD_TO_SENT_BOX","Could Not Save a Copy of the Message");

//ADMIN MENU
define("_MI_SENDME_GENERALSET","Genral Settings");
define("_MI_SENDME_MSGINBOXSENTSAVED","Outbox");
define("_MI_SENDME_EMAILADMIN","Send Email");
define("_MI_SENDME_MSGINBOXRETURN","Inbox");


//SETTING AND CONFIG
define("_MI_SENDME_WIDTH","Message Length");
define("_MI_SENDME_WIDTHDSC","Max length of the Message ");
define("_MI_SENDME_COMMENT_HEIGH","Message Box High");
define("_MI_SENDME_COMMENT_HEIGHDSC","The High of Message Box in the Form");
define("_MI_SENDME_COMMENT_WIDTH","Message Box width");
define("_MI_SENDME_COMMENT_WIDTHDSC","The width of the Message Box in the Form");
define("_MI_SENDME_PERPAGE","Messages No");
define("_MI_SENDME_PERPAGEDSC","the Number of Messages in the Admin page");
define("_MI_SENDME_CAPTCHA","Enable Anti-Spam ( Captcha)");
define("_MI_SENDME_CAPTCHADSC","");
define("_MI_SENDME_AD","Header");
define("_MI_SENDME_ADDESC","The Message in the Top of the Send Form");
define("_MI_SENDME_FOOTER","Footer");
define("_MI_SENDME_FOOTER_DESC","The Message in the Footer of the Send Form");
define("_MI_SENDME_EDITORS","Dhtml Editor");
define("_MI_SENDME_EDITORS_DESC","Enable the Dhtml Editor in the Sending Form");
define("_MI_SENDME_ALLOWED_type","Files type allowed");
define("_MI_SENDME_ALLOWED_typeDSC","Seprat Each with Space , this is List of Some Allowed types <br>image/jpeg <br> image/png <br>image/gif <br> application/zip <br> audio/mpeg <br>audio/x-wav <br>application/pdf <br>application/msword<br>text/plain");
define("_MI_SENDME_FROM_ADMIN_AREA","Message Title");
define("_MI_SENDME_FROMDSC","title when Sending the Message");
define("_MI_SENDME_AUTORESPOND","Active Auto-Respond");
define("_MI_SENDME_AUTORESPOND_DSC"," ");
define("_MI_SENDME_AUTORESPOND_MSG","type the Message , if u Enable the Auto-Respond .");
define("_MI_SENDME_AUTORESPOND_MSG_DSC","");



?>