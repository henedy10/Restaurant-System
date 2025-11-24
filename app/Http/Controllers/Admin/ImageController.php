<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\system\storeImage;
use App\Services\Admin\ImageService;

class ImageController extends Controller
{
    public function create()
    {
        return view('admin.images.create');
    }
    public function store(storeImage $request , ImageService $image)
    {
        $image->store($request->validated());

        return back()->with('success' , 'Image Uploaded successfully');
    }
}
