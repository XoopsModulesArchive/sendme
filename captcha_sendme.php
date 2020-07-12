<?php
/*
* NAME : SENDME MODULE FOR XOOPS
* AUTHOR : ONASRE <ַזהַ׃ׁ >
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
include("../../mainfile.php");
session_start();
// Settings Start
$digits_num=5; // number of digits (no more than 10)

// Colors Definition (white/white)
$x_pos=25; // digits position in x-axsis
$y_pos=7; // digits position in y-axsis
$font_size=6; // Font size
// Settings End

function random_num($n){ // Generate random digits
	$start_num = "1".str_repeat("0", $n-1);;
	$end_num   = str_repeat("9", $n);
	return rand($start_num, $end_num);
}

$text = random_num($digits_num);
$_SESSION["captcha_num"] = md5($text);
$captcha = imagecreatefrompng("./captcha.png");
$font_color['white']=imagecolorallocate($captcha, 0, 0, 0);
$font_color['white']=imagecolorallocate($captcha, 255, 255, 255);
imagestring($captcha, $font_size, $x_pos, $y_pos, $text, $font_color['white']);

header("Content-type: image/png");
imagepng($captcha);

?>