<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ServiceRequestDataTable;
use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;

class ServiceController extends BaseAdminController
{
    public function __construct()
    {
        $this->permissionsAdmin('request_service',$read = true, $create = true, $update = true, $delete = true);
    }

    public function index(ServiceRequestDataTable $ads)
    {
        return $ads->render('admin.service_request.index');
    }

    public function serviceDetail(Request $request)
    {
        $service = ServiceRequest::findOrFail($request->service_id);
        return json_decode($service);
    }

    public function destroy($id)
    {
        $admin = ServiceRequest::whereId($id)->delete();
        return response()->json(['status' => 'success']);
    }

    public function RequestServiceStatus(Request $request)
    {
      
        $ServiceRequest= ServiceRequest::find($request->is_read)->update(['is_read' => $request->active]);
        return response()->json(['status' => 'success', 'data' => $ServiceRequest]);
    }
}
