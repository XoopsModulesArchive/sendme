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
define("_MI_SENDME_CAPTCHA","Enable Anti-Spam ( Captcha)");
// Add Message errors
define("_MI_SENDME_NOCOMMENT","Vous n&#39;avez pas &#233;crit un message");
define("_MI_SENDME_LONGCOMMENT","Le message est trop long");
define("_MI_SENDME_NOTITLE","Vous n&#39;avez pas &#233;crit un sujet");
define("_MI_SENDME_NONAME","Vous n&#39;avez pas &#233;crit votre nom");
define("_MI_SENDME_NOEMAIL","Vous n&#39;avez pas &#233;crit votre courrier");
define("_MI_SENDME_EMAIL_NOT_OK","Votre adresse e-mail est consid&#233;r&#233; comme incorrecte!");
define("_MI_SENDME_NOEMAIL_TO","Vous n&#39;avez pas &#233;crit le courriel du destinataire ");
define("_MI_SENDME_ERROR_CODE","Code de s&#233;curit&#233; erron&#233;");
define("_MI_SENDME_MESSAGE_SENT","Le message a &#233;t&#233; envoy&#233;.Merci");
define("_MI_SENDME_MESSAGE_SENT1","Le message a &#233;t&#233; envoy&#233; au courriel d&#39;utilisateur et .");
define("_MI_SENDME_ERROR_MESSAGE","Le message n&#39;a pas pu &#234;tre envoy&#233;, r&#233;essayez plus tard!");
define("_MI_SENDME_PASSWORD","Tapez un mot de passe  afin de suivre votre message");
define("_MI_SENDME_NOPASSWORD","Aucun mot de passe ");
define("_MI_SENDME_NOTIK_ID","No Message ID ");
define("_MI_SENDME_NOTIK_FOUND","Mot de passe ou l&#39;ID de message erron&#233; ou le message a &#233;t&#233; supprim&#233;");

//SEND PAGE
define("_MI_SENDME_INDEX_PAGE","Contactez - nous");
define("_MI_SENDME_EMAIL_SEND_NOW","Envoyer");
define("_MI_SENDME_CODE","Tapez le code de s&#233;curit&#233;");
define("_MI_SENDME_YOUR_COMMENT","Message");
define("_MI_SENDME_YOUR_COMMENTRETURN_NO","Aucun Message");
define("_MI_SENDME_YOUR_COMMENTRETURN_NO2","message envoy&#233;, garder le num&#233;ro du message ci-dessous, vous en aurez besoin pour suivre votre message plus tard");
define("_MI_SENDME_YOUR_RETURNS","Suivre votre message");
define("_MI_SENDME_RETURN_PASSWORD","Mot de passe");
define("_MI_SENDME_RETURN_TIKET_NO","Message ID");
define("_MI_SENDME_RETURN_REDIERECT","Redirection..");
define("_MI_SENDME_YOUR_COMMENT_COUNTS","Nombre de caract&#233;res restants");
// DropDown
// The List
define("_MI_SENDME_PRORITY","Priorit&#233;");
define("_MI_SENDME_PSTATS","Stats");
define("_MI_SENDME_PH","Haut");
define("_MI_SENDME_PM","Moyen");
define("_MI_SENDME_PK","OK");
define("_MI_SENDME_PL","Faible");


// DELETE THINGS
define("_MI_ERORR_DELETED","le message ne pourrait pas etre effacer");
define("_MI_DELETED_OK","Message effac&#233;");
define("_MI_SENDME_DELETEALL","Effacer");
define("_MI_SENDME_DELETE_ALERT","Quand le message sera effac&#233;, Toutes les r&#233;ponses seront aussi effac&#233;es..");

// ATTACHMENT THINGS
define("_MI_SENDME_ATTACHMENTS","Pi&#232;ces Jointes");
define("_MI_SENDME_ATTACHMENTS1","Format de fichier non autoris&#233; ");
define("_MI_SENDME_ATTACHMENTS2","Fichier trop grand");
define("_MI_SENDME_ATTACHMENTS3","message n&#39;a pas pu &#234;tre envoy&#233; avec attachemnt, essayez sans attachement");
define("_MI_SENDME_ATTACHMENTS4","fichier joint et ");
define("_MI_SENDME_ATTACHMENTS_MAX_SIZE","Taille  des pi&#232;ces jointes ");
define("_MI_SENDME_ATTACHMENTS_MAX_SIZEDSC","La taille maximale des pi&#232;ces jointes <br> 1048576 ==> 1M");
define("_MI_SENDME_ATTACHMENTS_STORE","Dossier des pi&#232;ces jointes");
define("_MI_SENDME_ATTACHMENTS_STOREDSC","Chmod dossier avec 777 et Ne pas oublier de mettre / apr&#232;s le chemin du dossier ");
define("_MI_SENDME_ATTACHMENTS_EXT","Autoriser les pi&#232;ces jointes");
define("_MI_SENDME_ATTACHMENTS_EXTDSC","Soyez conscient de permettre seulement les formats s&#233;curis&#233;s ");
define("_MI_SENDME_ATTACHMENTS_NOT_FOUND","Le fichier n&#39;existe pas.. Assurez-vous que le dossier existe");
define("_MI_SENDME_OPENATTACHMENT_ALERT","La pi&#232;ce jointe pouvait contenir un virus, veillez scanner le fichier avant l&#39;ouvrir!");
//ADMIN INDEX
define("_MI_SENDME_SUBJECT","Sujet");
define("_MI_SENDME_SENDER_NAME","Votre nom");
define("_MI_SENDME_EMAIL","Votre e-mail");
define("_MI_SENDME_EMAIL2","Envoyer &#224;");
define("_MI_SENDME_SENDTIME","Date");
define("_MI_SENDME_SENDERIPS","IP");
define("_MI_SENDME_ATTACHMENT","Pi&#232;ces Jointes");
define("_MI_SENDME_NO_ATTACHMENT","Aucun");

define("_MI_SENDME_SELECTALL","S&#233;l&#233;ctionner tous");
define("_MI_SENDME_DESELECTALL","D&#233;s&#233;lectionner");
define("_MI_SENDME_REPLYS","R&#233;ponses");
define("_MI_SENDME_STATS","Stats");
define("_MI_SENDME_HOW_MANY_INBOX","Nouveaux Messages .");
define("_MI_SENDME_MSG_INBOX_NO_READ","Nouveaux Messages");
define("_MI_SENDME_MSG_INBOX_OLD","Ancien Messages");
define("_MI_SENDME_MSG_TOTAL_INBOX","Total des Messages");
define("_MI_SENDME_MSG_REPLYS_NO","Total des r&#233;ponses");
define("_MI_SENDME_MSGNEXT","Suivant");
define("_MI_SENDME_MSGPRV","Pr&#233;c&#233;dent");
define("_MI_SENDME_SAVEACOPY","Conserver une copie");
define("_MI_SENDME_YES","Oui");

define("_MI_SENDME_MAINPAGE","Page du module");
define("_MI_SENDME_ABOUT","Auteur");
define("_MI_SENDME_MOD_NAME","Module ");

//ADMIN READ & SEND MESSAGE
define("_MI_SENDME_BY_SUBJECT","Sujet : ");
define("_MI_SENDME_BY_THE_COMMENT","[ Message]");
define("_MI_SENDME_BY","Envoy&#233; par : ");
define("_MI_SENDME_TO","Envoy&#233; &#224; ");
define("_MI_SENDME_SENDER_ADMINNAME","Administrateur");
define("_MI_SENDME_SENDER_ADMINRE","la r&#233;ponse&#39;administrateur ");
define("_MI_SENDME_ADMIN_MESSAGE_SENT","Message envoy&#233; .. Redirect You..");
define("_MI_SENDME_EMAIL_BY","L&#39;envoyeur  : ");
define("_MI_SENDME_EMAIL_TO","Envoyer le courriel a :");
define("_MI_SENDME_SENT_TIME","Date d&#39;envoie  : ");
define("_MI_SENDME_SENT_IP","IP de l&#39;envoyeur : ");
define("_MI_SENDME_BY_ID","Pas du message: ");
define("_MI_SENDME_SENDER_REPLYED","Repondre : ");
define("_MI_SENDME_SENDER_REPLYEDs","Liste des reponses");
define("_MI_SENDME_SENDER_THE_Q","Question");
define("_MI_SENDME_SENDER_REPLYED_SENT","La r&#233;ponse est envoy&#233;e");
define("_MI_SENDME_SENDER_REPLYED_SAVED","La r&#233;ponse est enregistr&#233; dans la base de donn&#233;es et l&#39;utilisateur peut suivre son message.");
define("_MI_SENDME_ERROR_MAIL","Nous ne pouvons pas envoyer la r&#233;ponse aux courriels des utilisateurs, mais ..");
define("_MI_SENDME_SENDER_REPLYED_VIEW_NOW","Voir la r&#233;ponse ");
define("_MD_SENDME_NOMESGID","Message introuvable");
define("_MI_SENDME_INBOX_VIEW","Lire un Message ");
define("_MI_SENDME_SENDS4","Voir le Message : [ ");
define("_MI_SENDME_SENDS_2","Votre message a &#233;t&#233; .:  ");
define("_MI_SENDME_SENDS3","Message par : [ ");
define("_MI_SENDME_SENDS_3","Vous avez &#233;crit  .. ");
define("_MI_SENDME_SENDS_5","Vous l&#39;avez envoy&#233; &#224;  ...");
define("_MI_SENDME_BACKTO_ADMIN_SENT","Retour &#224; la bo&#238;te de r&#233;ception");

//ADMIN SAVE COPY MESSAGE
define("_MI_SENDME_MSGNOTALLOWED","Pas Permis");
define("_MI_SENDME_MSG_COMMENT_ADDED_TO_SENT_BOX","une copie du message a &#233;t&#233; enregistr&#233;");
define("_MI_SENDME_MSG_CANT_ADD_TO_SENT_BOX","Impossible d&#39;enregistrer une copie du message");

//ADMIN MENU
define("_MI_SENDME_GENERALSET","Genral Settings");
define("_MI_SENDME_MSGINBOXSENTSAVED","Sauvegarde");
define("_MI_SENDME_EMAILADMIN","Envoyer");
define("_MI_SENDME_MSGINBOXRETURN","Bo&#238;te de r&#233;ception");


//SETTING AND CONFIG
define("_MI_SENDME_WIDTH","Longueur du message");
define("_MI_SENDME_WIDTHDSC","Nombre maximun de carat&#233;res dans le message ");
define("_MI_SENDME_COMMENT_HEIGH","La hauteur de la Bo&#238;te de Message");
define("_MI_SENDME_COMMENT_HEIGHDSC","La hauteur de la Bo&#238;te de Message dans le formulaire");
define("_MI_SENDME_COMMENT_WIDTH","La largeur de la bo&#238;te de message");
define("_MI_SENDME_COMMENT_WIDTHDSC","La largeur de la bo&#238;te de message dans le formulaire");
define("_MI_SENDME_PERPAGE","Nombre de Messages");
define("_MI_SENDME_PERPAGEDSC","Nombre de messages dans la page de l&#39;administrateur");
//define("_MI_SENDME_CAPTCHA","Anti-Spam");
define("_MI_SENDME_CAPTCHADSC","");
define("_MI_SENDME_AD","En-t&#234;te");
define("_MI_SENDME_ADDESC","Le message dans l&#39;en-t&#234;te de la page du formulaire de l&#39;envoie");
define("_MI_SENDME_FOOTER","Pied de page");
define("_MI_SENDME_FOOTER_DESC","Le message en bas de la page du formulaire de l&#39;envoie");
define("_MI_SENDME_EDITORS","Dhtml Editeur");
define("_MI_SENDME_EDITORS_DESC","Utiliser l&#39;&#233;diteur DHTML dans le Formulaire d&#39;envoi");
define("_MI_SENDME_ALLOWED_type","Types des fichiers autoris&#233;s");
define("_MI_SENDME_ALLOWED_typeDSC","Separez Chacun, avec un espace,c&#39;est une liste de quelques types autoris&#233;s <br>image/jpeg <br> image/png <br>image/gif <br> application/zip <br> audio/mpeg <br>audio/x-wav <br>application/pdf <br>application/msword<br>text/plain");
define("_MI_SENDME_FROM_ADMIN_AREA","Titre du message");
define("_MI_SENDME_FROMDSC","Le titre durant l&#39;envoi");
define("_MI_SENDME_AUTORESPOND","Activer la r&#233;ponse automatique");
define("_MI_SENDME_AUTORESPOND_DSC"," ");
define("_MI_SENDME_AUTORESPOND_MSG","Tapez le message, si vous activez la fonction r&#233;ponse automatique .");
define("_MI_SENDME_AUTORESPOND_MSG_DSC","");

?>