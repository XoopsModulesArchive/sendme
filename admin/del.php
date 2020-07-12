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
//DELETE
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

  xoops_cp_header();


$xid=$_POST['id'];

if(!empty($_GET["a_id"])){
    $id = intval($_GET["a_id"]);
}elseif(!empty($_POST["a_id"])){
    $id = intval($_POST["a_id"]);
}else{
    redirect_header(XOOPS_URL . "/modules/$mydirname/admin/index.php" , 3, ""._MI_SENDME_NOTIK_ID."");
}

 $sql=mysql_query("DELETE FROM ".$xoopsDB->prefix("sendme_answer")." WHERE a_id='$id'")
  or die("can't edit the sendme_answer");
  
  if (!$sql){
  echo"<center>"._MI_ERORR_DELETED."</center><META HTTP-EQUIV=\"Refresh\" Content=2;URL=\"index.php\">";
  
  }else{
  
    $sql2=mysql_query("UPDATE  ".$xoopsDB->prefix("sendme_ask")." SET reply = reply - 1 WHERE id='$xid' ")
 or die("can't edit the sendme_ask");
 
  echo"<center>"._MI_DELETED_OK."</center><META HTTP-EQUIV=\"Refresh\" Content=2;URL=\"index.php\">";
    }

  xoops_cp_footer();
//DELETE

?>