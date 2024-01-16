<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\ConsultDataTable;
use App\Http\Requests\StoreConsults;
use App\Http\Requests\UpdateConsults;
use App\Models\Consult;

class ConsultController extends BaseAdminController
{
    public function __construct()
    {
        $this->permissionsAdmin('consults',$read = true, $create = true, $update = true, $delete = true);
    }

    public function index(ConsultDataTable $consults)
    {
        return $consults->render('admin.consultants.index');
    }

    public function store(StoreConsults $request)
    {
        $consults =  Consult::create($request->validated());
        if ($request->image) {
            $consults->update([
                'image' => UploadImage($request->image,'consults'),
            ]);
        }
        return response()->json(['status' => 'success', 'data' => $consults]);
    }

    public function update(UpdateConsults $request,$id)
    {
        $consults = Consult::findOrFail($id);
        $consults->update($request->validated());
        if ($request->image) {
            $consults->update([
                'image' => UploadImage($request->image,'consults'),
            ]);
        }
        return response()->json(['status' => 'success', 'data' => $consults]);
    }

    function destroy($id)
    {
        $consults = Consult::find($id);
        unlink($consults->image);
        $consults->delete();
        return response()->json(['status' => 'success']);
    }
}
