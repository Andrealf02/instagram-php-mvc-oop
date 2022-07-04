<?php
namespace Andrea\instagram\lib;

class UtilImage{
    public static function storeImage(array $photo) :string{
        $target_dir = "public/img/photos/";
        $extarr = explode('.', $photo["name"]);
        $filename = $extarr[sizeof($extarr)-2];
        $ext = $extarr[sizeof($extarr)-1];
        $hash = md5(Date('Ymdgi') . $filename). '.' . $ext;
        $targer_file = $target_dir . $hash;
        $uploadOk = 1;
    }
}