<?php
//$text = $_GET['text'];
require_once "vendor/autoload.php";

use GDText\Box;
use GDText\Color;

$text = $_REQUEST['text'];


$im = imagecreatetruecolor(300, 35);
$backgroundColor = imagecolorallocate($im, 0, 0, 0);
imagefill($im, 0, 0, imagecolortransparent($im, null));


$box = new Box($im);
$box->setFontFace(__DIR__."/images/martel.ttf"); // http://www.dafont.com/elevant-by-pelash.font
$box->setFontSize(25);
$box->setFontColor(new Color(240, 209, 164));
//$box->setFontColor(new Color(0, 0, 0));
$box->setBox(0, -5, 500, 35);
$box->setTextAlign('left', 'top');

$box->setStrokeColor(new Color(2, 2, 2)); // Set stroke color
//$box->setStrokeColor(new Color(255, 255, 255)); // Set stroke color
$box->setStrokeSize(1); // Stroke size in pixels

$box->draw($text); // Text to draw

header("Content-type: image/png;");
imagepng($im, null, 9, PNG_ALL_FILTERS);
die();