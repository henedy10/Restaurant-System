<?php

namespace App\Http\Controllers\Admin;
use App\Models\Chef;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\chef\{storeChef,updateChef};

class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.chefs.index');
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    public function create()
    {
        return view('admin.chefs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeChef $request)
    {

        $imageName = str_replace(' ','_',$request->name) . '.' . $request->file('image')->getClientOriginalExtension();
        $imagePath = $request->file('image')->storeAs('chef_images',$imageName,'public');

        Chef::create([
            'name'  => $request->name,
            'role'  => $request->role,
            'info'  => $request->info,
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('successAddChef','Chef is added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chef $chef)
    {
        return view('admin.chefs.show',compact('chef'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chef $chef)
    {
        return view('admin.chefs.edit',compact('chef'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateChef $request, Chef $chef)
    {
        $imageName = time().'-'.str_replace(' ','_',$request->name) . '.' . $request->file('image')->getClientOriginalExtension();
        $imagePath = $request->file('image')->storeAs('chef_images',$imageName,'public');
        $chef->update([
            'name'  => $request->name,
            'role'  => $request->role,
            'info'  => $request->info,
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('successEditChef','Chef is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chef $chef)
    {
        $chef->delete();
        return redirect()->back()->with('successDeleteChef','Chef is deleted successfully');
    }
}
