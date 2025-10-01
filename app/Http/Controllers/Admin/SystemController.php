<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\system\storeInfo;
use App\Http\Requests\admin\system\storeOpeningHour;
use App\Http\Requests\admin\system\updateOpeningHour;
use App\Models\OpeningHour;
use App\Models\RestaurantInfo;

class SystemController extends Controller
{
    public function index()
    {
        $info         = RestaurantInfo::latest()->first();
        $openingHours = OpeningHour::paginate(4);
        return view('admin/system/manageSys',compact('info','openingHours'));
    }

    public function storeInfo(storeInfo $request)
    {
        $validated = $request->validated();
        RestaurantInfo::updateOrInsert($validated);
        return redirect()->back()->with(['successMsg' => 'Info stored successfully']);
    }

    public function editOpeningHour(OpeningHour $openingHour)
    {
        return view('admin.system.editOpeningHour',compact('openingHour'));
    }

    public function updateOpeningHour(OpeningHour $openingHour, updateOpeningHour $request)
    {
        $validated = $request->validated();
        $openingHour->update($validated);
        return redirect()->route('system.index')->with(['success' => 'OpeningHour updated successfully']);
    }

    public function destroyOpeningHour(OpeningHour $openingHour)
    {
        $openingHour->delete();
        return redirect()->back()->with(['success' => 'OpeningHour deleted successfully']);
    }
}
