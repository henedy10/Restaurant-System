<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\Storage;
use App\Models\Chef;

class ChefService {

    public function uploadImage($name , $image)
    {
        $imageName = str_replace(' ','_',$name) . '.' . $image->getClientOriginalExtension();
        $imagePath = $image->storeAs('chef_images',$imageName,'public');

        return $imagePath;
    }

    public function store($request)
    {
        $imagePath = $this->uploadImage($request->name , $request->image);
        $chefCreate = Chef::create([
            'name'  => $request->name,
            'role'  => $request->role,
            'info'  => $request->info,
            'image' => $imagePath,
        ]);

        return $chefCreate;
    }

    public function update($request , $chef)
    {
        $data = [
            'name'  => $request->name,
            'role'  => $request->role,
            'info'  => $request->info,
        ];

        if($request->hasFile('image')){

            if($chef->image && Storage::disk('public')->exists($chef->image)){

                Storage::disk('public')->delete($chef->image);
                $imagePath = $this->uploadImage($request->name,$request->image);
                $data['image'] = $imagePath;

            }
        }

        $chefUpdate = $chef->update($data);

        return $chefUpdate;
    }

    public function destroy($chef)
    {
        if($chef->image && Storage::disk('public')->exists($chef->image)){
            Storage::disk('public')->delete($chef->image);
        }

        $chefDelete = $chef->delete();

        return $chefDelete;
    }
}
