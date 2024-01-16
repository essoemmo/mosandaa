<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AdsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAds;
use App\Http\Requests\UpdateAds;
use App\Models\Ads;
use Illuminate\Http\Request;

class AdsController extends BaseAdminController
{
    public function __construct()
    {
        $this->permissionsAdmin('ads',$read = true, $create = true, $update = true, $delete = true);
    }

    public function index(AdsDataTable $ads)
    {
        return $ads->render('admin.ads.index');
    }

    public function store(StoreAds $request)
    {
        $ads =  Ads::create($request->validated());
        return response()->json(['status' => 'success', 'data' => $ads]);
    }

    public function update(UpdateAds $request,$id)
    {
        $ads = Ads::findOrFail($id);
        $ads->update($request->validated());
        return response()->json(['status' => 'success', 'data' => $ads]);
    }

    public function adsStatus(Request $request)
    {
        $ads = Ads::find($request->ads_id)->update(['active' => $request->active]);
        return response()->json(['status' => 'success', 'data' => $ads]);
    }

    function destroy($id)
    {
        $ads = Ads::whereId($id)->delete();
        return response()->json(['status' => 'success']);
    }
}
