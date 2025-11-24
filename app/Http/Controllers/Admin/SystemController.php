<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Trait\UploadFile;
use App\Http\Requests\admin\system\
{
    storeImage,
    storeInfo,
};

use App\Models\
{
    RestaurantInfo,
    Image
};

class SystemController extends Controller
{
    use UploadFile;

    public function index()
    {
        $info         = RestaurantInfo::first();
        return view('admin.system.manageSys',compact('info'));
    }

    public function storeInfo(storeInfo $request)
    {
        $validated = $request->validated();
        RestaurantInfo::create([
            'email'             => $validated['email'],
            'address'           => $validated['address'],
            'phone'             => $validated['phone'],
            'number_of_tables'  => 0,
        ]);
        return redirect()->back()->with(['successMsg' => 'Info stored successfully']);
    }

    public function updateInfo(storeInfo $request , RestaurantInfo $systemInfo)
    {
        $validated = $request->validated();
        $systemInfo->update($validated);
        return redirect()->back()->with(['successMsg' => 'Info updated successfully']);
    }

    public function storeImage(storeImage $request)
    {
        $imagePath = $this->uploadImage($request->name,$request->file('image'));

        Image::create([
            'name'    => $request->name ,
            'path'    => $imagePath ,
            'section' => $request->section ,
        ]);
        return redirect()->back();
    }
}
