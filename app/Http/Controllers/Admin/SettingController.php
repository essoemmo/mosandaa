<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSetting;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\DataTables\SubscripDataTable;

class SettingController extends BaseAdminController
{
    public function __construct()
    {
        $this->permissionsAdmin('settings',$read = true, $create = false, $update = true, $delete = false);
    }
    
    public function subscrips(SubscripDataTable $ads)
    {
        return $ads->render('admin.subscrips.index');
    }

    public function index()
    {
        $setting = Setting::first();
        return view('admin.settings.index', compact('setting'));
    }

    public function update(UpdateSetting $request)
    {
        $setting = Setting::findOrFail(1);
        $setting->update($request->validated());
        return response()->json(['status' => 'success']);
    }
}
