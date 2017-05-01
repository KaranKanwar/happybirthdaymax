<?php
if($_POST['file'] != "") {
    header('Content-Type: application/json');
    $file = base64_decode(str_replace('data:image/png;base64,','',$_POST['file']));
    $im = imageCreateFromString($file);
    if($im){
        $save = imagepng($im, '/home/USER/public_html/happybirthdaymax/app/shots/shot.png');
        echo json_encode(array('file' => true));
    }
    else {
        echo json_encode(array('error' => 'Could not parse image string.'));
    }
    exit();
}

?>