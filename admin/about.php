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
 include("../../../mainfile.php");
  global $xoopsConfig, $xoopsModuleConfig;
if ( file_exists(XOOPS_ROOT_PATH."/modules/$mydirname/language/".$xoopsConfig['language']."/modinfo.php") )
	{
		include_once(XOOPS_ROOT_PATH."/modules/$mydirname/language/".$xoopsConfig['language']."/modinfo.php");
	}
else
	{
		include_once(XOOPS_ROOT_PATH."/modules/$mydirname/language/english/modinfo.php");
	}
include '../../../include/cp_header.php';
xoops_cp_header();

include_once("./header.php");
 ?>
<html>

<head>
<title>SendMe -v1.6</title>
</head>

<body>

<table border="1" cellspacing="6" width="100%" id="AutoNumber1">
  <tr>
    <td width="100%"><font size="2"><b>SendMe V1.6 </b></font></td>
  </tr>
  <tr>
    <td width="100%"><font size="2"><b>Please For More Info about this Module
    Visit : <a href="http://www.arabxoops.com">www.arabxoops.com</a> or
    <a href="http://www.wildhelp.com">www.wildhelp.com</a> You Can Email me at :
    <a href="mailto:abu-elmajid@hotmail.com">abu-elmajid@hotmail.com</a> </b>
    </font></td>
  </tr>
  <tr>
    <td width="100%"><font size="2"><b>This Module&nbsp; Done By : Onasre </b>
    </font></td>
  </tr>
  <tr>
    <td width="100%"><font size="2"><b>Creadits : Many People to Thank . Please
    Read&nbsp; Creadits.php</b></font></td>
  </tr>
  <tr>
    <td width="100%"><font color="#FF0000">This Module Free , You free&nbsp; To
    Remove&nbsp; any Links from the Bottom of any Page , U free to Remove the
    Word SendMe V1.5&nbsp; and My Site Link . But it would Be Nice if u Keep it
    ..) .. You not Allowed to Sell the Module or Remove the Credit in the Top of
    Each page . if you add or edit any thing in the Module add that to the Top
    of each page within the Credits .</font></td>
  </tr>
  <tr>
    <td width="100%">&nbsp;</td>
  </tr>
  <tr>
    <td width="100%"><b><font size="2">Updates : Please Visit
    <a href="http://www.wildhelp.com">www.wildhelp.com</a> /
    <a href="http://www.arabxoops.com">www.arabxoops.com</a>&nbsp; Last Update
    Feb 2010</font></b></td>
  </tr>
</table>

</body>

</html>

<?php
xoops_cp_footer();
?>