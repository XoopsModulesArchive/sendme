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
// THIS FUNCTION WAS IMPORTED FROM TINYCONTENT MODULE
$mydirname = basename( dirname( dirname( __FILE__ ) ) ) ;

	// checks browser compatibility with the control
	function checkBrowser()
	{
		global $HTTP_SERVER_VARS;
		$browser = $HTTP_SERVER_VARS['HTTP_USER_AGENT'];
		// check if msie
		if (eregi("MSIE[^;]*",$browser,$msie)) {
		  // get version
		  if (eregi("[0-9]+\.[0-9]+",$msie[0],$version)) {
			// check version
			if ((float)$version[0]>=5.5) {
			  // finally check if it's not opera impersonating ie
			  if (!eregi("opera",$browser)) {
				return true;
			  }
			}
		  }
		}
		return false;
	}

	function tc_adminMenu ($currentoption = 0)
	{
		global $xoopsModule, $xoopsConfig;

	/* Nice buttons styles */
		echo "
			<style type='text/css'>
			#buttontop { float:left; width:100%; background: #e7e7e7; font-size:93%; line-height:normal; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; margin: 0; }
			#buttonbar { float:left; width:100%; background: #e7e7e7 url('" . XOOPS_URL . "/modules/".$xoopsModule->getVar('dirname')."/images/bg.gif') repeat-x left bottom; font-size:93%; line-height:normal; border-left: 1px solid black; border-right: 1px solid black; margin-bottom: 12px; }
			#buttonbar ul { margin:0; margin-top: 15px; padding:10px 10px 0; list-style:none; }
			#buttonbar li { display:inline; margin:0; padding:0; }
			#buttonbar a { float:left; background:url('" . XOOPS_URL . "/modules/".$xoopsModule->getVar('dirname')."/images/left_both.gif') no-repeat left top; margin:0; padding:0 0 0 9px; border-bottom:1px solid #000; text-decoration:none; }
			#buttonbar a span { float:left; display:block; background:url('" . XOOPS_URL . "/modules/".$xoopsModule->getVar('dirname')."/images/right_both.gif') no-repeat right top; padding:5px 15px 4px 6px; font-weight:bold; color:#765; }
			/* Commented Backslash Hack hides rule from IE5-Mac \*/
			#buttonbar a span {float:none;}
			/* End IE5-Mac hack */
			#buttonbar a:hover span { color:#333; }
			#buttonbar #current a { background-position:0 -150px; border-width:0; }
			#buttonbar #current a span { background-position:100% -150px; padding-bottom:5px; color:#333; }
			#buttonbar a:hover { background-position:0% -150px; }
			#buttonbar a:hover span { background-position:100% -150px; }
			</style>
		";


	$myts = &MyTextSanitizer::getInstance();

	$tblColors = Array();
	$tblColors[0] = $tblColors[1] = $tblColors[2] = '';
	$tblColors[$currentoption] = 'current';

	echo "<div id='buttontop'>";
	echo "<table style=\"width: 100%; padding: 0; \" cellspacing=\"0\"><tr>";
echo "<td style='font-size: 10px; text-align: left; color: #2F5376; padding: 0 6px; line-height: 18px;'>
	  <a class='nobutton' href='" . XOOPS_URL . "/modules/system/admin.php?fct=preferences&amp;op=showmod&amp;mod=" . $xoopsModule->getVar('mid') . "'>" . _MI_SENDME_GENERALSET . "</a>
  |<a href=\"" . XOOPS_URL . "/modules/".$xoopsModule->getVar('dirname')."/index.php\">" .  _MI_SENDME_MAINPAGE . "</a>
	|<a href=\"" . XOOPS_URL . "/modules/".$xoopsModule->getVar('dirname')."/admin/about.php\">" . _MI_SENDME_ABOUT . "</a>
	</td>";
	echo "<td style='font-size: 10px; text-align: right; color: #2F5376; padding: 0 6px; line-height: 18px;'><b>" . $myts->displayTarea($xoopsModule->name()) . " </b> </td>";
	echo "</tr></table>";
	echo "</div>";

	echo "<div id='buttonbar'>";
	echo "<ul>";
	echo "<li id='" . $tblColors[0] . "'><a href=\"" . XOOPS_URL . "/modules/".$xoopsModule->getVar('dirname')."/admin/index.php\"><span>" . _MI_SENDME_MSGINBOXRETURN . "</span></a></li>";
	echo "<li id='" . $tblColors[1] . "'><a href=\"" . XOOPS_URL . "/modules/".$xoopsModule->getVar('dirname')."/admin/admin_send.php\"><span>" . _MI_SENDME_EMAILADMIN . "</span></a></li>";
	echo "<li id='" . $tblColors[2] . "'><a href=\"" . XOOPS_URL . "/modules/".$xoopsModule->getVar('dirname')."/admin/the_sent_inbox.php\"><span>" . _MI_SENDME_MSGINBOXSENTSAVED . "</span></a></li>";

	echo "</ul></div>&nbsp;";
}
tc_adminMenu(0);

?>