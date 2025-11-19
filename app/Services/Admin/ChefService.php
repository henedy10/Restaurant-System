<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\Storage;
use App\Models\Chef;

class ChefService {

    public function uploadImage($name,$image)
    {
        $imageName = str_replace(' ','_',$name) . '.' . $image->getClientOriginalExtension();
        $imagePath = $image->storeAs('chef_images',$imageName,'public');

        return $imagePath;
    }

    public function store(array $data)
    {
        $imagePath     = $this->uploadImage($data['name'],$data['image']);
        $data['image'] = $imagePath;
        $chefCreate    = Chef::create($data);

        return $chefCreate;
    }

    public function update(array $data,$chef)
    {
        if($data['image'])
        {
            if($chef->image && Storage::disk('public')->exists($chef->image))
            {
                Storage::disk('public')->delete($chef->image);
                $imagePath     = $this->uploadImage($data['name'],$data['image']);
                $data['image'] = $imagePath;
            }
        }

        $chefUpdate = $chef->update($data);

        return $chefUpdate;
    }

    public function destroy($chef)
    {
        if($chef->image && Storage::disk('public')->exists($chef->image))
        {
            Storage::disk('public')->delete($chef->image);
        }
        $chefDelete = $chef->delete();

        return $chefDelete;
    }
}
