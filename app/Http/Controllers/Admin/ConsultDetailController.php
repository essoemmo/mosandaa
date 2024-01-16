<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ConsultDetailDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConsultDetails;
use App\Http\Requests\UpdateConsultDetails;
use App\Models\ConsultDetails;
use Illuminate\Http\Request;

class ConsultDetailController extends BaseAdminController
{
    public function __construct()
    {
        $this->permissionsAdmin('cons_details',$read = true, $create = true, $update = true, $delete = true);
    }

    public function index(ConsultDetailDataTable $cons_details)
    {
        return $cons_details->render('admin.cons_details.index');
    }

    public function store(StoreConsultDetails $request)
    {
        $cons_details =  ConsultDetails::create($request->validated());
        return response()->json(['status' => 'success', 'data' => $cons_details]);
    }

    public function update(UpdateConsultDetails $request,$id)
    {
        $cons_details = ConsultDetails::findOrFail($id);
        $cons_details->update($request->validated());
        return response()->json(['status' => 'success', 'data' => $cons_details]);
    }

    function destroy($id)
    {
        $cons_details = ConsultDetails::whereId($id)->delete();
        return response()->json(['status' => 'success']);
    }
}
