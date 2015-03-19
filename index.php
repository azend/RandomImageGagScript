<?php

//
// A gag script to display one of a selection of random images
//
// Author: Verdi R-D (@azend)
// Date: March 19th, 2015
//


///////////////////////////
//// Configure section ////
///////////////////////////

// The pool of images you'd like to get a random image from
/*
$image_list = array(
	'1.jpg',
	'2.jpg',
	'3.jpg',
	'4.jpg',
	'5.jpg',
	'6.jpg',
	'7.jpg',
	'8.jpg'
);
*/

// You can also grab all images from a directory
$image_list = glob('images/*');

// A relative or absolute path to find the images with 
$image_prefix = '';

///////////////////////////
//// Configuration End ////
///////////////////////////

// Pick a random image
$image_index = array_rand($image_list);
$image = $image_list[$image_index];

// Generate the filesystem image path
$image_path = $image_prefix . $image;

//`Get the mime type of the image
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime_type = finfo_file($finfo, $image_path);
finfo_close($finfo);

// Get the size of the selected image in bytes
$image_size = filesize($image_path);

// Output the randomly selected image
header('Content-type: ' . $mime_type);
header('Content-length: ' . $image_size);

readfile($image_path);
