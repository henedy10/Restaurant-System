<?php

namespace App\Http\Controllers\Admin;
use App\Models\{Chef};
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\storeChef;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chefs=Chef::select('name','role')->paginate(8);
        return view('admin.chefs.index',compact('chefs'));
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

        return redirect()->back()->with('successAddChef','chef is added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $name)
    {
        $chef=Chef::with('awards')->where('name',$name)->first();
        return view('admin.chefs.show',compact('chef'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
