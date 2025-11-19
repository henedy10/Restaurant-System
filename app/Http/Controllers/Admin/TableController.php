<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\system\storeInfoTables;
use App\Services\Admin\TableService;

class TableController extends Controller
{
    protected TableService $table;

    public function __construct(TableService $table)
    {
        $this->table = $table;
    }

    public function index()
    {
        $info               = $this->table->index();
        $countTables        = $info['countTables'];
        $countBookingTables = $info['countBookingTables'];

        return view('admin.tables.index',compact('countTables','countBookingTables'));
    }

    public function store(storeInfoTables $request)
    {
        $tableStore = $this->table->store($request);
        return $tableStore ? redirect()->back()->with(['successMsg' => 'data updated successfully']) : "There is an error";
    }
}
