<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\system\storeInfo;
use App\Models\RestaurantInfo;

class SystemController extends Controller
{
    public function index()
    {
        $info = RestaurantInfo::latest()->first();
        return view('admin/manageSys',compact('info'));
    }

    public function storeInfo(storeInfo $request)
    {
        $validated = $request->validated();
        RestaurantInfo::updateOrInsert($validated);

        return redirect()->back()->with(['successMsg' => 'Info stored successfully']);
    }
}
