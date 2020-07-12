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
// $Id: xoops_version.php,v 1.2 2005/03/18 12:52:25 onokazu Exp $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //

if( ! defined( 'XOOPS_ROOT_PATH' ) ) exit ;
$mydirname = basename( dirname( __FILE__ ) ) ;
////
$modversion['name'] = $mydirname;
$modversion['version'] = 1.6;
$modversion['description'] = "This module for the admin to allow his/her visitors to email him/her. and save the email to the database. ";
$modversion['credits'] = "Many People Please Read creadits.php";
$modversion['author'] = "Onasre <<ÇæäÇÓÑ>>";
$modversion['license'] = "free LICENSE";
$modversion['image'] = "images/sendme.png";
$modversion['dirname'] = $mydirname;

// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";
$modversion['hasMain'] =1;
// All tables should not have any prefix!
$modversion['sqlfile']['mysql'] = "sql/sql.sql";

// Tables created by sql file
$modversion['tables'][1] = "sendme_ask";
$modversion['tables'][2] = "sendme_answer";
$modversion['tables'][3] = "sendme_copy";

// Templates
$modversion['templates'][1]['file'] 		= 'sendme_dhtml.html';
$modversion['templates'][1]['description'] 	= 'Contact us Module';

// Blocks
$modversion['blocks'][1]['file'] = "sendme_blocks.php";
$modversion['blocks'][1]['name'] = "Sendme";
$modvertion['blocks'][1]['description'] = "Sendme";
$modversion['blocks'][1]['show_func'] = "b_sendme_blocks_show";
$modversion['blocks'][1]['edit_func'] = "b_sendme_blocks_edit";
$modversion['blocks'][1]['options'] = "0";
$modversion['blocks'][1]['template'] = 'sendme_blocks.html';

//SETTINGS
//HOW MANY MESSAGES IN ADMIN AREA
$modversion['config'][1]['name'] = 'PAGE';
$modversion['config'][1]['title'] = '_MI_SENDME_PERPAGE';
$modversion['config'][1]['description'] = '_MI_SENDME_PERPAGEDSC';
$modversion['config'][1]['formtype'] = 'select';
$modversion['config'][1]['valuetype'] = 'int';
$modversion['config'][1]['default'] = 20;
$modversion['config'][1]['options'] = array('5' => 5, '10' => 10, '15' => 15, '20' => 20, '25' => 25, '30' => 30, '50' => 50);
//CAPTCHA SETTING
$modversion['config'][2]['name'] = 'CAPTCH';
$modversion['config'][2]['title'] = '_MI_SENDME_CAPTCHA';
$modversion['config'][2]['description'] = '_MI_SENDME_CAPTCHADSC';
$modversion['config'][2]['formtype'] = 'yesno';
$modversion['config'][2]['valuetype'] = 'int';
$modversion['config'][2]['default'] = '0';
// THE Password Follow up
$modversion['config'][3]['name'] = 'allow_followup';
$modversion['config'][3]['title'] = '_MI_SENDME_FOLLOWUP';
$modversion['config'][3]['description'] = '_MI_SENDME_FOLLOWUP_DESC';
$modversion['config'][3]['formtype'] = 'yesno';
$modversion['config'][3]['valuetype'] = 'int';
$modversion['config'][3]['default'] = '1';
// THE EDITOR
$modversion['config'][4]['name'] = 'editors';
$modversion['config'][4]['title'] = '_MI_SENDME_EDITORS';
$modversion['config'][4]['description'] = '_MI_SENDME_EDITORS_DESC';
$modversion['config'][4]['formtype'] = 'yesno';
$modversion['config'][4]['valuetype'] = 'int';
$modversion['config'][4]['default'] = '1';
//Admin Notify
$modversion['config'][5]['name'] = 'Notify';
$modversion['config'][5]['title'] = '_MI_SENDME_NOTIFY';
$modversion['config'][5]['description'] = '';
$modversion['config'][5]['formtype'] = 'yesno';
$modversion['config'][5]['valuetype'] = 'int';
$modversion['config'][5]['default'] = '0';
// THE AUTO RESPOND
$modversion['config'][6]['name'] = 'auto_respond';
$modversion['config'][6]['title'] = '_MI_SENDME_AUTORESPOND';
$modversion['config'][6]['description'] = '';
$modversion['config'][6]['formtype'] = 'yesno';
$modversion['config'][6]['valuetype'] = 'int';
$modversion['config'][6]['default'] = '0';

// THE TEXT FOR THE AUTO RESPOND
$modversion['config'][7]['name'] = 'auto_respond_msg';
$modversion['config'][7]['title'] = '_MI_SENDME_AUTORESPOND_MSG';
$modversion['config'][7]['description'] = '';
$modversion['config'][7]['formtype'] = 'textarea';
$modversion['config'][7]['valuetype'] = 'text';
$modversion['config'][7]['default'] = 'We are On Trip , We will Contact You Back Very Soon..';
// UPLOADING , ALLOWED
$modversion['config'][8]['name'] = 'upload_allow';
$modversion['config'][8]['title'] = '_MI_SENDME_ATTACHMENTS_EXT';
$modversion['config'][8]['description'] = '_MI_SENDME_ATTACHMENTS_EXTDSC';
$modversion['config'][8]['formtype'] = 'yesno';
$modversion['config'][8]['valuetype'] = 'int';
$modversion['config'][8]['default'] = '0';
// MESSAGE LENGTH
$modversion['config'][9]['name'] = 'MESSAGE_LENGTH';
$modversion['config'][9]['title'] = '_MI_SENDME_WIDTH';
$modversion['config'][9]['description'] = '_MI_SENDME_WIDTHDSC';
$modversion['config'][9]['formtype'] = 'textbox';
$modversion['config'][9]['valuetype'] = 'text';
$modversion['config'][9]['default'] = '8000';
// THE COMMENT AREA WIDTH
$modversion['config'][10]['name'] = 'textboxwidth';
$modversion['config'][10]['title'] = '_MI_SENDME_COMMENT_WIDTH';
$modversion['config'][10]['description'] = '_MI_SENDME_COMMENT_WIDTHDSC';
$modversion['config'][10]['formtype'] = 'textbox';
$modversion['config'][10]['valuetype'] = 'int';
$modversion['config'][10]['default'] = '60';
// THE COMMENT AREA HEIGH
$modversion['config'][11]['name'] = 'textboxheight';
$modversion['config'][11]['title'] = '_MI_SENDME_COMMENT_HEIGH';
$modversion['config'][11]['description'] = '_MI_SENDME_COMMENT_HEIGHDSC';
$modversion['config'][11]['formtype'] = 'textbox';
$modversion['config'][11]['valuetype'] = 'int';
$modversion['config'][11]['default'] = '12';
// UPLOADING , THE MAX SIZE
$modversion['config'][12]['name'] = 'upload_max_size';
$modversion['config'][12]['title'] = '_MI_SENDME_ATTACHMENTS_MAX_SIZE';
$modversion['config'][12]['description'] = '_MI_SENDME_ATTACHMENTS_MAX_SIZEDSC';
$modversion['config'][12]['formtype'] = 'textbox';
$modversion['config'][12]['valuetype'] = 'text';
$modversion['config'][12]['default'] = '1048576';
// UPLOADING , THE STORE
$modversion['config'][13]['name'] = 'upload_store';
$modversion['config'][13]['title'] = '_MI_SENDME_ATTACHMENTS_STORE';
$modversion['config'][13]['description'] = '_MI_SENDME_ATTACHMENTS_STOREDSC';
$modversion['config'][13]['formtype'] = 'textbox';
$modversion['config'][13]['valuetype'] = 'text';
$modversion['config'][13]['default'] = 'store/';
// ALLOWED MIMIE FILES
$modversion['config'][14]['name'] = 'allowed_type';
$modversion['config'][14]['title'] = '_MI_SENDME_ALLOWED_type';
$modversion['config'][14]['description'] = '_MI_SENDME_ALLOWED_typeDSC';
$modversion['config'][14]['formtype'] = 'textarea';
$modversion['config'][14]['valuetype'] = 'text';
$modversion['config'][14]['default'] = 'image/jpeg image/png image/gif application/zip';
//THE HEADER OF SENDME INDEX
$modversion['config'][15]['name'] = 'INTRO';
$modversion['config'][15]['title'] = '_MI_SENDME_AD';
$modversion['config'][15]['description'] = '_MI_SENDME_ADDESC';
$modversion['config'][15]['formtype'] = 'textarea';
$modversion['config'][15]['valuetype'] = 'text';
$modversion['config'][15]['default'] = '';
//THE FOOTER OF SENDME INDEX
$modversion['config'][16]['name'] = 'FOOTER';
$modversion['config'][16]['title'] = '_MI_SENDME_FOOTER';
$modversion['config'][16]['description'] = '_MI_SENDME_FOOTER_DESC';
$modversion['config'][16]['formtype'] = 'textarea';
$modversion['config'][16]['valuetype'] = 'text';
$modversion['config'][16]['default'] = '';


?>