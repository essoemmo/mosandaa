<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\SubserviceUpdateRequest;
use App\Models\Subservice;
use Illuminate\Http\Request;

class SubServiceController extends BaseAdminController
{
    public function __construct()
    {
    }

    public function getSubserviceData($subserviceId)
    {
        $subservice = Subservice::findOrFail($subserviceId);

        return view('admin.subservice.modal', compact('subservice'));
    }

    public function update(SubserviceUpdateRequest $request, Subservice $subservice)
    {
        $subservice->update($request->validated());

        return response()->json(['message' => 'Subservice updated successfully']);
    }
}
