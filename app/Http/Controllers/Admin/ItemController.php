<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\item\
{
    storeItem,
    updateItem
};
use App\Services\Admin\ItemService;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ItemService $item)
    {
        $items = $item->index();
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
    public function store(storeItem $request , ItemService $item)
    {
        $storeItem = $item->store($request);
        return $storeItem ? redirect()->back()->with('successAddItem','Item is added successfully') : "There is an error";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id , ItemService $item)
    {
        $item = $item->show($id);
        return view('admin.items.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id , ItemService $item)
    {
        $item = $item->edit($id);
        return view('admin.items.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateItem $request, string $id , ItemService $item)
    {
        $itemUpdate = $item->update($id,$request);
        return $itemUpdate ? redirect()->back()->with('successEditItem','Item is updated successfully') : "There is an error";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id , ItemService $item)
    {
        $itemDestroy = $item->destroy($id);
        return $itemDestroy ? redirect()->back()->with('successDeleteItem','Item is deleted successfully') : "There is an error";
    }

    /**
     * Display the specified new item.
     */
    public function newItem(ItemService $item)
    {
        $item = $item->newItem();
        return view('admin.items.newItem',compact('item'));
    }
}
