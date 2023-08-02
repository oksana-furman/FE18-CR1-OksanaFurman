<?php

    function file_upload($picture){
        $result = new stdClass();
        $result->fileName = 'default.png';
        $result->error = true;
        $fileName = $picture['name'];
        $fileTempName = $picture['temp_name'];
        $fileError = $picture['error'];
        $fileSize = $picture['size'];
        $fileExtention = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $filesAllowed = ['png', 'jpg', 'jpeg'];

        if ($fileError == 4) {
            // no image has been chosen
            $result->ErrorMessage = "No picture was chosen. It can always be updated later.";
            return $result;            
        } else {
            // image has been chosen
            if (in_array($fileExtention, $filesAllowed)) {
                if ($fileError === 0) {
                    if ($fileSize < 500000) { //500kb
                        $fileNewName = uniqid('') . '.' . $fileExtention;

                        $destination = "../uploads/$fileNewName";

                        if (move_uploaded_file($fileTempName, $destination)) {
                            $result->error = 0;
                            $result->fileName = $fileNewName;
                            return $result;
                        } else {
                            $result->ErrorMessage = "There was an error uploading this file.";
                            return $result;
                        }
                    } else {
                        $result->ErrorMessage = "This picture is bigger than the allowed 500Kb. <br> Please choose a smaller picture and update the product.";
                        return $result;
                    }
                } else {
                    $result->ErrorMessage = "There was an error uploading - $fileError code. Check the PHP documentation.";
                    return $result;
                }
            } else {                      
                $result->ErrorMessage = "This file type can't be uploaded.";
                return $result;
            }
        }

    }