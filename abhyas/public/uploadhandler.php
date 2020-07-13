<?php
/**
 * This is just an example of how a file could be processed from the
 * upload script. It should be tailored to your own requirements.
 */
// Only accept files with these extensions
$whitelist  = array('jpg', 'jpeg', 'png', 'gif');
$name       = null;
$error      = 'No file uploaded.';
$output_dir = dirname(__FILE__)."/assets/wish-images/";
$thumbnail = dirname(__FILE__)."/assets/thumbnails/";

if (isset($_FILES)) {
	if (isset($_FILES['file'])) {
		$tmp_name = $_FILES['file']['tmp_name'];
		$name     = basename($_FILES['file']['name']);
		$name = trim($name);
		$error    = $_FILES['file']['error'];

		if ($error === UPLOAD_ERR_OK) {
			$extension = pathinfo($name, PATHINFO_EXTENSION);
			if($extension == '')
			{

				$filetype = $_FILES['file']['type'];
				list($type,$ext) = explode('/',$filetype);
				$extension = 'jpg';

				move_uploaded_file($tmp_name, $output_dir . $name . '.'. $extension );
				echo json_encode(array(
					'name'  => "http://api.wishtru.com/assets/wish-images/".$name. '.'. $extension,
					'thumbnail'  => "http://api.wishtru.com/assets/thumbnails/".$name. '.'. $extension,
					'error' => $error,
				));

				resizeImage( $output_dir.$name.'.'.$extension, $thumbnail.$name.'.'.$extension, 1500 );

			}
			else
			{

				move_uploaded_file($tmp_name, $output_dir . $name );
				echo json_encode(array(
					'name'  => "http://api.wishtru.com/assets/wish-images/".$name,
					'thumbnail'  => "http://api.wishtru.com/assets/thumbnails/".$name,
					'error' => $error,
				));

				resizeImage( $output_dir.$name, $thumbnail.$name, 1500 );

			}

		}
	}
}

function resizeImage ($filepath_old, $filepath_new, $image_dimension, $scale_mode = 0) { 
	
	if (!(file_exists($filepath_old)) || file_exists($filepath_new)) return false; 

 	$image_attributes = getimagesize($filepath_old); 
  	$image_width_old = $image_attributes[0]; 
  	$image_height_old = $image_attributes[1]; 
  	$image_filetype = $image_attributes[2]; 

  	if ($image_width_old <= 0 || $image_height_old <= 0) return false; 
  	$image_aspectratio = $image_width_old / $image_height_old; 

  	if ($scale_mode == 0) $scale_mode = ($image_aspectratio > 1 ? -1 : -2); 
  	elseif ($scale_mode == 1) $scale_mode = ($image_aspectratio > 1 ? -2 : -1); 

  	if ($scale_mode == -1) 
  	{ 
   		$image_width_new = $image_dimension; 
   		$image_height_new = round($image_dimension / $image_aspectratio); 
  	} 
  	elseif ($scale_mode == -2) 
  	{ 
   		$image_height_new = $image_dimension; 
   		$image_width_new = round($image_dimension * $image_aspectratio); 
  	} 
  	else 
  	{ 
   		return false; 
  	} 
  	switch( $image_filetype ) 
  	{ 
	   	case 1: 
		    $image_old = imagecreatefromgif($filepath_old); 
		    $image_new = imagecreate($image_width_new, $image_height_new); 
		    imagecopyresampled($image_new, $image_old, 0, 0, 0, 0, $image_width_new, $image_height_new, $image_width_old, $image_height_old); 
		    imagegif($image_new, $filepath_new); 
	    break; 
  
	   	case 2: 
	   		$image_old = imagecreatefromjpeg( $filepath_old );
   			$image_new = imagecreatetruecolor($image_width_new, $image_height_new);
   			imagecopyresampled($image_new, $image_old, 0, 0, 0, 0, $image_width_new, $image_height_new, $image_width_old, $image_height_old);
   			imagejpeg( $image_new, $filepath_new );
			    
	   		break; 

		case 3: 
    		$image_old = imagecreatefrompng($filepath_old); 
    		$image_colordepth = imagecolorstotal($image_old); 

    		if ($image_colordepth == 0 || $image_colordepth > 255) 
    		{ 
     			$image_new = imagecreatetruecolor($image_width_new, $image_height_new); 
    		} 
    		else 
    		{ 
     			$image_new = imagecreate($image_width_new, $image_height_new); 
    		} 

    		imagealphablending($image_new, false); 
    		imagecopyresampled($image_new, $image_old, 0, 0, 0, 0, $image_width_new, $image_height_new, $image_width_old, $image_height_old); 
    		imagesavealpha($image_new, true); 
    		imagepng($image_new, $filepath_new); 
    		break; 

   		default: 
    		return false; 
  	} 

  	imagedestroy($image_old); 
  	imagedestroy($image_new); 
  	return true; 
}

die();
?>
