<?php

namespace App\Http\Controllers\Admin;
use App\Models\Chef;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\chef\{storeChef,updateChef};
use App\Services\Admin\ChefService;

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
    public function store(storeChef $request , ChefService $chefService)
    {
        $chefCreate = $chefService->store($request);
        return  $chefCreate ? redirect()->back()->with('successAddChef','Chef is added successfully') : "There is an error";
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
    public function update(updateChef $request, Chef $chef , ChefService $chefService)
    {
        $chefUpdate = $chefService->update($request,$chef);
        return $chefUpdate ? redirect()->back()->with('successEditChef','Chef is updated successfully') : "There is an error";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chef $chef , ChefService $chefService)
    {
        $chefDelete = $chefService->destroy($chef);
        return $chefDelete ? redirect()->back()->with('successDeleteChef','Chef is deleted successfully') : "There is an error";
    }
}
