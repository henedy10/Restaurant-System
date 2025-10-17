<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\system\
{
    storeImage,
    storeInfo,
    storeInfoTables,
    updateOpeningHour,
};
use App\Models\client\Subscriber;
use App\Models\
{
    OpeningHour,
    RestaurantInfo,
    Image
};
use App\Models\client\BookingRoom;

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
        RestaurantInfo::create([
            'email'             => $validated['email'],
            'address'           => $validated['address'],
            'phone'             => $validated['phone'],
            'number_of_tables'  => 0,
        ]);
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

    public function indexTables()
    {
        $countTables        = RestaurantInfo::value('number_of_tables');
        $countBookingTables = BookingRoom::count();
        return view('admin.system.Tables',compact('countTables','countBookingTables'));
    }

    public function storeInfoTables(storeInfoTables $request){
        $validated = $request->validated();
        $info      = RestaurantInfo::select('id','number_of_tables','availability_booking')->first();

        $info->update([
            'number_of_tables'      => $validated['number_of_tables'],
            'availability_booking'  => $validated['booking_availability'] ?? 0,
        ]);
        return redirect()->back()->with(['successMsg' => 'data updated successfully']);
    }
}
