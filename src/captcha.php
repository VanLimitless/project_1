<?PHP

$image = @imagecreatetruecolor(120, 30) or die("Cannot Initialize new GD image stream");

// set background and allocate drawing colours
$background = imagecolorallocate($image, 0x00, 0x00, 0x00);
imagefill($image, 0, 0, $background);
$linecolor = imagecolorallocate($image, 0x33, 0x33, 0x50);
$textcolor1 = imagecolorallocate($image, 0xFF, 0x00, 0x00);
$textcolor2 = imagecolorallocate($image, 0x00, 0xFF, 0x00);

// draw random lines on canvas
for($i=0; $i < 8; $i++) {
    imagesetthickness($image, rand(1,3));
    imageline($image, rand(0,120), 0, rand(0,120), 30 , $linecolor);
}

// using a mixture of system and GDF fonts
$fonts = array(3,4,5);
$fonts[] = imageloadfont("$fontdir/bmcorrode.gdf");
$fonts[] = imageloadfont("$fontdir/bmreceipt.gdf");
$fonts[] = imageloadfont("$fontdir/checkbook.gdf");
shuffle($fonts);

session_start();


$digit = '';
for($x = 15; $x <= 95; $x += 20) {
    $textcolor = (rand() % 2) ? $textcolor1 : $textcolor2;
    $digit .= ($num = rand(0, 9));
    imagechar($image, array_pop($fonts), $x, rand(2, 14), $num, $textcolor);
}

// record digits in session variable
$_SESSION['digit'] = $digit;

// display image and clean up
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);
?>
