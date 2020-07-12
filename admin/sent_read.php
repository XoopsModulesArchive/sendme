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
include '../../../mainfile.php';
include '../../../include/cp_header.php';
xoops_cp_header();
 global $xoopsConfig, $xoopsModuleConfig;
include("header.php");
if ( file_exists(XOOPS_ROOT_PATH."/modules/$mydirname/language/".$xoopsConfig['language']."/modinfo.php") )
	{
		include_once(XOOPS_ROOT_PATH."/modules/$mydirname/language/".$xoopsConfig['language']."/modinfo.php");
	}
else
	{
		include_once(XOOPS_ROOT_PATH."/modules/$mydirname/language/english/modinfo.php");
	}

 $myts =& MyTextSanitizer::getInstance();
$id = intval($_GET['id']);
$result = mysql_query("SELECT * FROM ".$xoopsDB->prefix("sendme_copy")." WHERE id='$id'  ");
$rows = mysql_num_rows($result);
if($rows > 0){
while($row = mysql_fetch_array($result)){


?>
<p align="center"><u><b><span lang="ar-sa"><font size="2" face="Tahoma"><?php echo ""._MI_SENDME_INBOX_VIEW."";?></font></span></b></u></p>
<fieldset style='padding: 2'>
  <legend><font face='Tahoma'><font style='font-size: 10pt'>&nbsp;&nbsp;
  <span lang='ar-sa'><?php echo ""._MI_SENDME_SENDS4."";?></span><?php echo $row["name"] ?> </font>
  <span lang='ar-sa'><font style='font-size: 10pt'>&nbsp;] ..</font></span></font></legend>
  <p align='right'><font face='Tahoma'><span lang='ar-sa'>
  <font style='font-size: 9pt'><?php echo ""._MI_SENDME_SENDS3."";?></font></span>
  <font style='font-size: 9pt'><font color='#FF0000'><?php echo $row["name"] ?></font>
  <span lang='ar-sa'><?php echo ""._MI_SENDME_SENDS_2."";?></span><font color='#FF0000'>
  <?php echo $row["subject"] ?> </font></font><span lang='ar-sa'>
  <font style='font-size: 9pt'><font color='#FF0000'>.</font>. <br>
  <br>
 <fieldset>
  <font color='#FF0000'><?php echo ""._MI_SENDME_SENDS_3."";?><br>
&nbsp;</font></span></font><BR><p align='right'>
  <font color='#009900' face="Tahoma"><font style='font-size: 9pt'><td><?php  echo $myts->stripSlashesGPC($row['comment']); ?></td>
  </font><span lang='ar-sa'><font style='font-size: 9pt'>.</font></span></font></p>
   </fieldset>
  <p align='right'><font face='Tahoma'><span lang='ar-sa'>
  <font style='font-size: 9pt'><?php echo ""._MI_SENDME_SENDS_5."";?> :</font><font style='font-size: 9pt'>  </font></span><font style='font-size: 9pt'>[ </font>
  <font style='font-size: 9pt' color='#FF0000'><?php echo $row["email"] ?> </font>
  <font style='font-size: 9pt'>]<span lang='ar-sa'>Ü</span></font><span lang='ar-sa'><font style='font-size: 9pt'>.</font></span></font></p>
  <p align='right'><font face='Tahoma'><span lang='ar-sa'>
  <font style='font-size: 9pt'><?php echo ""._MI_SENDME_SENT_TIME."";?>: [ </font></span>
  <font style='font-size: 9pt' color='#FF0000'><?php echo ''.formatTimestamp($row['datetime'],'d/m/y(H:i:s)').''; ?></font><span lang='ar-sa'><font style='font-size: 9pt'><font color='#FF0000'>
  </font>]Ü.</font></span></font></p>
  <p align='right'><font face='Tahoma'><span lang='ar-sa'>
  <br>
  &gt;&gt; <a href="the_sent_inbox.php"><?php echo ""._MI_SENDME_BACKTO_ADMIN_SENT."";?></a></span></p>
  </font></font></fieldset></font></form>
<?php

}
 xoops_cp_footer();
  }
 else
{

echo "" . _MD_SENDME_NOMESGID. "";
echo"<center>.......................</center><META HTTP-EQUIV=\"Refresh\" Content=2;URL=\"the_sent_inbox.php\">";
 xoops_cp_footer();
  }
?>