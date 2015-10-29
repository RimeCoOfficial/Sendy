<?php
// https://gist.github.com/fowkswe/3db02f1d355cab1dc300

//
// this replaces includes/create/upload.php - besure to save your old upload.php!
// you must put the S3.php file in includes/helpers/S3.php
// you can get it here:
// https://github.com/tpyo/amazon-s3-php-class
//
// This is an improvement on this gist:
// https://gist.github.com/Wysie/03934b6a79a715772abd
//
// Ensure your AWS user has propper credentials to upload to s3
//
// Be sure to set your bucket name and region url below.
//

    include('../functions.php');
    include('../login/auth.php');
    require_once('../helpers/S3.php');

    //Init
    $file = $_FILES['upload']['tmp_name'];
    $fileName = $_FILES['upload']['name'];
    $extension_explode = explode('.', $fileName);
    $extension = $extension_explode[count($extension_explode)-1];
    $time = time();
    $allowed = array("jpeg", "jpg", "gif", "png");

    if(in_array($extension, $allowed)) {
        $awsAccessKey = get_app_info('s3_key');
        $awsSecretKey = get_app_info('s3_secret');
        $bucketName = 'rime.mail'; //Change accordingly
        $endpoint = 's3-us-west-2.amazonaws.com'; //Change accordingly
        $s3 = new S3($awsAccessKey, $awsSecretKey, false, $endpoint);
        $s3Filename = $time.baseName($fileName);

        if ($s3 -> putObject($s3->inputFile($file), $bucketName, $s3Filename, S3::ACL_PUBLIC_READ)) {
            $array = array(
                'filelink' => 'http://'.$endpoint.'/'.$bucketName.'/'.$s3Filename
            );
//          echo stripslashes(json_encode($array));

        // Required: anonymous function reference number as explained above.
        $funcNum = $_GET['CKEditorFuncNum'] ;
        // Optional: instance name (might be used to load a specific configuration file or anything else).
        $CKEditor = $_GET['CKEditor'] ;
        // Optional: might be used to provide localized messages.
        $langCode = $_GET['langCode'] ;

        // Check the $_FILES array and save the file. Assign the correct path to a variable ($url).
        $url = APP_PATH.'/uploads/'.$time.'.'.$extension;
        $url = 'http://'.$endpoint.'/'.$bucketName.'/'.$s3Filename;

        // Usually you will only assign something here if the file could not be uploaded.
        $message = '';

        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";

        }
        else {
            die('there was a problem');
        }
    }
    else {
        die('File not allowed');
    }
?>