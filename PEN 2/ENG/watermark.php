<?php
$main_img = "img/image.jpg"; // main big photo / picture
$watermark_img = "img/stamp.gif"; // use GIF or PNG, JPEG has no tranparency support
$padding = 3; // distance to border in pixels for watermark image
$opacity = 100; // image opacity for transparent watermark

$watermark = imagecreatefromgif($watermark_img); // create watermark
$image = imagecreatefromjpeg($main_img); // create main graphic

if(!$image || !$watermark) die("Error: main image or watermark could not be loaded!");

$watermark_size = getimagesize($watermark_img);
$watermark_width = $watermark_size[0];
$watermark_height = $watermark_size[1];

$image_size = getimagesize($main_img);
$dest_x = $image_size[0] - $watermark_width - $padding;
$dest_y = $image_size[1] - $watermark_height - $padding;

// copy watermark on main image
imagecopymerge($image, $watermark, $dest_x, $dest_y, 0, 0, $watermark_width, $watermark_height, $opacity);

// print image to screen
header("content-type: image/jpeg");
imagejpeg($image);
imagedestroy($image);
imagedestroy($watermark); ?>

<?php /*?><?php

/******************************************************************/

function watermark($sourcefile, $watermarkfile) {

    #
    # $sourcefile = Filename of the picture to be watermarked.
    # $watermarkfile = Filename of the 24-bit PNG watermark file.
    #
    //Get the resource ids of the pictures
    $watermarkfile_id = imagecreatefrompng($watermarkfile);

    imageAlphaBlending($watermarkfile_id, false);
    imageSaveAlpha($watermarkfile_id, true);

    $fileType = strtolower(substr($sourcefile, strlen($sourcefile)-3));

    switch($fileType) {
        case('gif'):
            $sourcefile_id = imagecreatefromgif($sourcefile);
            break;

        case('png'):
            $sourcefile_id = imagecreatefrompng($sourcefile);
            break;

        default:
            $sourcefile_id = imagecreatefromjpeg($sourcefile);
    }

    //Get the sizes of both pix   
    $sourcefile_width=imageSX($sourcefile_id);
    $sourcefile_height=imageSY($sourcefile_id);
    $watermarkfile_width=imageSX($watermarkfile_id);
    $watermarkfile_height=imageSY($watermarkfile_id);

    $dest_x = ( $sourcefile_width / 2 ) - ( $watermarkfile_width / 2 );
    $dest_y = ( $sourcefile_height / 2 ) - ( $watermarkfile_height / 2 );

    // if a gif, we have to upsample it to a truecolor image
    if($fileType == 'gif') {
        // create an empty truecolor container
        $tempimage = imagecreatetruecolor($sourcefile_width, $sourcefile_height);

        // copy the 8-bit gif into the truecolor image
        imagecopy($tempimage, $sourcefile_id, 0, 0, 0, 0, $sourcefile_width, $sourcefile_height);

        // copy the source_id int
        $sourcefile_id = $tempimage;
    }

    imagecopy($sourcefile_id, $watermarkfile_id, $dest_x, $dest_y, 0, 0, $watermarkfile_width, $watermarkfile_height);

    //Create a jpeg out of the modified picture
    switch($fileType) {

        // remember we don't need gif any more, so we use only png or jpeg.
        // See the upsaple code immediately above to see how we handle gifs
        case('png'):
            header('Content-type: image/png');
            imagepng ($sourcefile_id);
            break;

        default:
            header('Content-type: image/jpg');
            imagejpeg ($sourcefile_id);
    }           

    imagedestroy($sourcefile_id);
    imagedestroy($watermarkfile_id);

}
// Constants
$path_to_images="img/";
$default_image="img/arnold.png";
$default_watermark="img/search.png";

// Read passing arguments: image to watermark and watermark image
// 1. image to watermark
$img_to_watermark=$_GET["img"];
if($img_to_watermark) {
    /* Validate that img exists */

    /* Set path */
    $img_to_watermark=$path_to_images . $img_to_watermark;
}
else {
    /* Display default image */
    $img_to_watermark=$path_to_images . $default_image;
}
// 2. watermark image
$watermarkfile=$_GET["watermark"];
if($watermarkfile) {
    /* Validate that watermark img exists */

    /* Set path */
    $watermarkfile=$path_to_images . $watermarkfile;
}
else {
    /* Use default watermak image */
    $watermarkfile=$path_to_images . $default_watermark;
}


    $image_watermarked=watermark($img_to_watermark, $watermarkfile);

    return $image_watermarked;
?>

 