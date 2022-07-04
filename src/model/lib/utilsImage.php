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

        if(check === false){
            $uploadOk = 1 ;
            
        }else{
            $uploadOk = 0;
        }
        
        if($uploadOk == 0) {
            throw new ExceptioN('NO SE SUBIO LA IMG');
        }else{
            if(move_uploaded_file($photo["tmp_name"], $target_file)){
                return $hash;
            }else{
                return "";
            }
        }
    }
}