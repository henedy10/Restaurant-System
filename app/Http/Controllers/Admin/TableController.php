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
        $info = $this->table->index();
        return view('admin.tables.index',compact('info'));
    }

    public function update(storeInfoTables $request ,$id)
    {
        $this->table->update($request->validated() ,$id);
        return redirect()->back()->with(['successMsg' => 'data updated successfully']);
    }
}
