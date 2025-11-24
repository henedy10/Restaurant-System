<?php

namespace App\Services\Admin;

use App\Models\Image;
use App\Trait\UploadFile;

class ImageService {

    use UploadFile;

    public function store($data)
    {
        $imagePath = $this->uploadImage($data['name'],$data['image']);

        return Image::create([
            'name'    => $data['name'] ,
            'path'    => $imagePath ,
            'section' => $data['section'] ,
        ]);
    }
}
