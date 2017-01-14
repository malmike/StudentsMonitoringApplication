<?php
     function fakeImage($image){
        $check = getimagesize($image);
        if($check !== false) {
            return 1;
        } else {
            return 0;
        }
     }

     function imageExists($target_file){
         if (file_exists($target_file)){
            echo "Sorry, file already exists.";
            return 0;
        }else return 1;
     }

     function limitSize($file_size){
         if ($file_size > 512000){
            $error = "Sorry, your file is too large. Maximum Image Size is 500kb";
            setImageError($error); 
            return 0;
        }else return 1;
     }

     function limitFormat($imageFileType){
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            setImageError($error);
            return 0;
        }else return 1;
     }

     function uploadImage($image, $target_file){
         if (!move_uploaded_file($image, $target_file)){
            $error = "Sorry, there was an error uploading your picture, please try again.";
            setImageError($error);
        }
     }
?>
