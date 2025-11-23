<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OpeningHour;
use App\Http\Requests\admin\system\updateOpeningHour;

class OpeningHourController extends Controller
{

    public function edit(OpeningHour $openingHour)
    {
        return view('admin.system.editOpeningHour',compact('openingHour'));
    }

    public function update(OpeningHour $openingHour, updateOpeningHour $request)
    {
        $validated = $request->validated();
        $openingHour->update($validated);
        return redirect()->route('system.index')->with(['success' => 'OpeningHour updated successfully']);
    }

    public function destroy(OpeningHour $openingHour)
    {
        $openingHour->delete();
        return redirect()->back()->with(['success' => 'OpeningHour deleted successfully']);
    }
}
