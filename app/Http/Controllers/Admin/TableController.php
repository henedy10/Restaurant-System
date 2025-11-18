<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\system\storeInfoTables;
use App\Services\Admin\TableService;

class TableController extends Controller
{
    public function index(TableService $table)
    {
        $info               = $table->index();
        $countTables        = $info['countTables'];
        $countBookingTables = $info['countBookingTables'];

        return view('admin.tables.index',compact('countTables','countBookingTables'));
    }

    public function store(storeInfoTables $request , TableService $table)
    {
        $tableStore = $table->store($request);
        return $tableStore ? redirect()->back()->with(['successMsg' => 'data updated successfully']) : "There is an error";
    }
}
