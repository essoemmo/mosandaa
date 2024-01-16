<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BranchDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBranch;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends BaseAdminController
{
    public function __construct()
    {
        $this->permissionsAdmin('branches',$read = true, $create = true, $update = true, $delete = true);
    }

    public function index(BranchDataTable $branch)
    {
        return $branch->render('admin.branches.index');
    }

    public function store(StoreBranch $request)
    {
        $branch =  Branch::create($request->validated());
        return response()->json(['status' => 'success', 'data' => $branch]);
    }

    function destroy($id)
    {
        $branch = Branch::whereId($id)->delete();
        return response()->json(['status' => 'success']);
    }
}
