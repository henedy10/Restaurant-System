<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OpeningHour;
use App\Http\Requests\admin\system\updateOpeningHour;
use App\Services\Admin\OpeningHourService;

class OpeningHourController extends Controller
{

    public function __construct(protected OpeningHourService $openingHour)
    {
    }

    public function edit(OpeningHour $openingHour)
    {
        return view('admin.system.editOpeningHour',compact('openingHour'));
    }

    public function update(OpeningHour $openingHour, updateOpeningHour $request)
    {
        $data = $request->validated();
        $this->openingHour->update($data,$openingHour);

        return redirect()->route('system.index')->with(['success' => 'OpeningHour updated successfully']);
    }

    public function destroy(OpeningHour $openingHour)
    {
        $this->openingHour->destroy($openingHour);
        return redirect()->back()->with(['success' => 'OpeningHour deleted successfully']);
    }
}
