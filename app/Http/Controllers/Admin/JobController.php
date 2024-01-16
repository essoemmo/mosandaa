<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\JobRequestDataTable;
use App\Http\Controllers\Controller;
use App\Models\JobRequest;
use Illuminate\Http\Request;

class JobController extends BaseAdminController
{
    public function __construct()
    {
        $this->permissionsAdmin('request_jobs',$read = true, $create = true, $update = true, $delete = true);
    }

    public function index(JobRequestDataTable $jobs)
    {
        return $jobs->render('admin.job_request.index');
    }

    public function jobDetail(Request $request)
    {
        $job = JobRequest::findOrFail($request->job_id);
        return json_decode($job);    
    }

    public function destroy($id)
    {
        $admin = JobRequest::whereId($id)->delete();
        return response()->json(['status' => 'success']);
    }

    public function RequestJopStatus(Request $request)
    {
        $rate = JobRequest::find($request->rate_id)->update(['is_read' => $request->active]);
        return response()->json(['status' => 'success', 'data' => $rate]);
    }

}
