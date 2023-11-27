<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CityDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCity;
use App\Http\Requests\Admin\UpdateCity;
use App\Models\City;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends BaseAdminController
{
    public function __construct()
    {
      $this->permissionsAdmin('services',$read = true, $create = true, $update = true, $delete = true);
    }

    public function index()
    {
        $services = Service::with('subservices')->get();
        return view('admin.services.index',compact('services'));
    }

   
}
