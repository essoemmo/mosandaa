<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\RateDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRate;
use App\Models\Rate;
use Illuminate\Http\Request;

class RatesController extends BaseAdminController
{
    public function __construct()
    {
        $this->permissionsAdmin('rates',$read = true, $create = false, $update = false, $delete = true);
    }

    public function index(RateDataTable $rates)
    {
        return $rates->render('admin.rates.index');
    }

    public function RateStatus(Request $request)
    {
        $rate = Rate::find($request->rate_id)->update(['active' => $request->active]);
        return response()->json(['status' => 'success', 'data' => $rate]);
    }

    function destroy($id)
    {
        $rate = Rate::whereId($id)->delete();
        return response()->json(['status' => 'success']);
    }
}
