<?php
namespace App\Services\Admin;

use Illuminate\Support\Facades\Storage;
use App\Models\Menu;
use App\Models\client\Subscriber;
use App\Notifications\NewItem;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Notification;

class ItemService{

    public function uploadImage($name , $image)
    {
        $imageName = str_replace(' ','_',$name) . '.' . $image->getClientOriginalExtension();
        $imagePath = $image->storeAs('item_images',$imageName,'public');

        return $imagePath;
    }

    public function index()
    {
        $items = Menu::paginate(8);
        return $items;
    }

    public function show($id)
    {
        $item = Menu::findOrFail($id);
        return $item;
    }

    public function store($request)
    {
        $imagePath  = $this->uploadImage($request->name,$request->image);
        $itemCreate = Menu::create([
            'name'         => $request->name,
            'type'         => $request->type,
            'description'  => $request->description,
            'price'        => $request->price,
            'image'        => $imagePath,
        ]);

        // send notification to subscribers when creation new item
        Subscriber::chunkById(20, function (Collection $subscribers){
            Notification::send($subscribers, new NewItem($subscribers));
        });

        return $itemCreate;
    }

    public function edit($id)
    {
        $item = Menu::findOrFail($id);
        return $item;
    }

    public function update($id,$request)
    {
        $item      = Menu::findOrFail($id);
        $data = [
            'name'         => $request->name,
            'type'         => $request->type,
            'price'        => $request->price,
            'description'  => $request->description,
        ];

        if($request->hasFile('image')){
            if($item->image && Storage::disk('public')->exists($item->image)){

                Storage::disk('public')->delete($item->image);
                $imagePath     = $this->uploadImage($request->name , $request->image);
                $data['image'] = $imagePath;

            }
        }
        $itemUpdate = $item->update($data);

        return $itemUpdate;
    }

    public function destroy($id)
    {
        $itemDestroy = Menu::findOrFail($id)->delete();
        return $itemDestroy;
    }

    public function  newItem()
    {
        $item = Menu::latest()->first();
        return $item;
    }
}
