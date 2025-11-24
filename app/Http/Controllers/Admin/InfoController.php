<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\system\storeInfo;
use App\Services\Admin\InfoService;

class InfoController extends Controller
{
    public function __construct(protected InfoService $info)
    {
    }

    public function index()
    {
        $info = $this->info->index();
        return view('admin.info.index',compact('info'));
    }

    public function store(storeInfo $request)
    {
        $this->info->store($request->validated());
        return redirect()->back()->with(['successMsg' => 'Info stored successfully']);
    }

    public function update(storeInfo $request)
    {
        $this->info->update($request->validated());
        return redirect()->back()->with(['successMsg' => 'Info updated successfully']);
    }
}
