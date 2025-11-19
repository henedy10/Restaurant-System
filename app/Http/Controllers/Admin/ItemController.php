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
    protected ItemService $item;

    public function __construct(ItemService $item)
    {
        $this->item = $item;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = $this->item->index();
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
        $this->item->store($request->validated());
        return redirect()->back()->with('successAddItem','Item is added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = $this->item->show($id);
        return view('admin.items.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = $this->item->edit($id);
        return view('admin.items.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateItem $request, string $id)
    {
        $this->item->update($id,$request->validated());
        return redirect()->back()->with('successEditItem','Item is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->item->destroy($id);
        return redirect()->back()->with('successDeleteItem','Item is deleted successfully');
    }

    /**
     * Display the specified new item.
     */
    public function newItem()
    {
        $item = $this->item->newItem();
        return view('admin.items.newItem',compact('item'));
    }
}
