<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\system\
{
    storeImage,
    storeInfo,
    updateOpeningHour,
};
use App\Models\client\Subscriber;
use App\Models\
{
    OpeningHour,
    RestaurantInfo,
    Image
};

class SystemController extends Controller
{
    public function index()
    {
        $info         = RestaurantInfo::first();
        $openingHours = OpeningHour::paginate(4);
        return view('admin.system.manageSys',compact('info','openingHours'));
    }

    public function indexSubscribers()
    {
        $subscribers = Subscriber::paginate(20);
        return view('admin.system.Subscribers',compact('subscribers'));
    }

    public function storeInfo(storeInfo $request)
    {
        $validated = $request->validated();
        RestaurantInfo::updateOrInsert($validated);
        return redirect()->back()->with(['successMsg' => 'Info stored successfully']);
    }

    public function updateInfo(storeInfo $request , RestaurantInfo $systemInfo)
    {
        $validated = $request->validated();
        $systemInfo->update($validated);
        return redirect()->back()->with(['successMsg' => 'Info updated successfully']);
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

    public function storeImage(storeImage $request)
    {
        $imageName = time().'-'.str_replace(' ','_',$request->name) . '.' . $request->file('image')->getClientOriginalExtension();
        $imagePath = $request->file('image')->storeAs('sys_images',$imageName,'public');
        Image::create([
            'name'    => $request->name ,
            'path'    => $imagePath ,
            'section' => $request->section ,
        ]);
        return redirect()->back();
    }
}
