<?php

namespace App\Trait;

Trait UploadFile {

    public function uploadImage($name,$file){
        $imageName = time().'-'.str_replace(' ','_',$name) . '.' . $file->getClientOriginalExtension();
        $imagePath = $file->storeAs('sys_images',$imageName,'public');

        return $imagePath;
    }

}
