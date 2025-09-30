<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\item\{storeItem,updateItem};
use App\Models\client\Subscriber;
use App\Models\Menu;
use App\Notifications\NewItem;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Menu::paginate(8);
        return view('admin.items.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeItem $request)
    {
        $imageName = str_replace(' ','_',$request->name) . '.' . $request->file('image')->getClientOriginalExtension();
        $imagePath = $request->file('image')->storeAs('item_images',$imageName,'public');

        Menu::create([
            'name'         => $request->name,
            'type'         => $request->type,
            'description'  => $request->description,
            'price'        => $request->price,
            'image'        => $imagePath,
        ]);

        // send notification to subscribe when creation new item
        Subscriber::chunkById(20, function (Collection $subscribersEmails){
            foreach($subscribersEmails as $subscribersEmail){
                $subscribersEmail->notify(new NewItem($subscribersEmail->email));
            }
        });

        return redirect()->back()->with('successAddItem','Item is added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Menu::findOrFail($id);
        return view('admin.items.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Menu::findOrFail($id);
        return view('admin.items.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateItem $request, string $id)
    {
        $item      = Menu::findOrFail($id);
        $imageName = str_replace(' ','_',$request->name) . '.' . $request->file('image')->getClientOriginalExtension();
        $imagePath = $request->file('image')->storeAs('item_images',$imageName,'public');

        $item->update([
            'name'         => $request->name,
            'type'         => $request->type,
            'price'        => $request->price,
            'description'  => $request->description,
            'image'        => $imagePath,
        ]);

        return redirect()->back()->with('successEditItem','Item is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Menu::findOrFail($id)->delete();
        return redirect()->back()->with('successDeleteItem','Item is deleted successfully');
    }

    /**
     * Display the specified new item.
     */
    public function newItem()
    {
        $item = Menu::latest()->first();
        return view('admin.items.newItem',compact('item'));
    }
}
