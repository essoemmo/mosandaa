<?php

namespace App\DataTables;

use App\Models\ServiceRequest;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Carbon\Carbon;

class ServiceRequestDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('is_read', function ($query) {
                if ($query->is_read) {
                    $btn = '
                    <div align="center">
                        <label class="switch">
                        <input data-id="' . $query->id . '" type="checkbox" id="check" checked>
                            <div class="slider round">
                                <span class="on">ON</span>
                                <span class="off">OFF</span>
                            </div>
                        </label>
                    </div>';
                } else {
                    $btn = '
                    <div align="center">
                        <label class="switch">
                        <input data-id="' . $query->id . '" type="checkbox" id="check">
                            <div class="slider round">
                                <span class="on">ON</span>
                                <span class="off">OFF</span>
                            </div>
                        </label>
                    </div>';
                }

                return $btn;
            })
            ->editColumn('created_at', function ($query) {
                $start = Carbon::parse($query->created_at)->format('Y-m-d');
                return $start;
            })
            ->addColumn('action', function($query){
                if (Auth::guard('admin')->user()->hasPermission('request_service-read')){
                   $btn = '<button type="button" class="btn btn-icon btn-icon rounded-circle btn-dark servicereq" data-id="' . $query->id . '" data-name="' . $query->name . '" data-email="' . $query->email . '" data-phone="' . $query->phone . '" data-phone="' . $query->phone . '" data-organization_name="' . $query->organization_name . '" data-activity_type="' . $query->activity_type . '"  data-legal_entity="' . $query->legal_entity . '" data-service_location="' . $query->service_location . '"  data-request_service="' . $query->request_service. '" data-region="' . $query->region . '"  data-neighbourhood="' . $query->neighbourhood . '" data-price_offer="' . $query->price_offer . '"
                 data-toggle="modal" data-target="#details"> <i data-feather="eye"></i></button> &nbsp;';
               }

               if (Auth::guard('admin')->user()->hasPermission('request_service-delete')){
                   $btn = $btn .
                   '<form class=" delete"  action="' . route("request_service.destroy", $query->id) . '"  method="POST" id="delform"
                   style="display: inline-block; right: 50px;" >
                   <input name="_method" type="hidden" value="DELETE">
                   <input type="hidden" name="_token" value="' . csrf_token() . '">
                   <button type="submit" class="btn btn-icon btn-icon rounded-circle btn-danger" title=" ' . 'Delete' . ' "><i data-feather="trash-2"></i></button>
                       </form>';
               }else{
                   $btn = $btn .'<button class="btn btn-danger btn-xs disabled"><i data-feather="trash-2"></i></button>';
               }
                     return $btn;
            })->setRowClass(function ($query) {
                if($query->is_read == 0){
                    return 'alert-primary';
                }})
                   ->rawColumns(['action','is_read']);
                }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ServiceRequest $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ServiceRequest $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('servicerequest-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Blfrtip')
                    // ->buttons(
                    //     Button::make('csv'),
                    //     Button::make('excel')
                    // )
                    ->parameters([
                        "buttons" => [
                            'excelHtml5',
                        ],
                        "lengthMenu" => [
                            [10,25,50,100,-1],[10,25,50]
                        ],
                        "processing" => true,
                        "serverSide" => true,
                        "responsive" => true,
                        "searching"  => true,
                        "drawCallback" => "function( settings ) {
                            feather.replace();
                        }",
                    ])
                    ->orderBy(0);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id' => ['title' => 'ID', 'data' => 'id'],
            'organization_name' => ['title' =>  __('admin.organizationname'), 'data' => 'organization_name'],
            'email' => ['title' =>  __('admin.email'), 'data' => 'email'],
            'phone' => ['title' =>  __('admin.phone'), 'data' => 'phone'],
             'created_at' => ['title' =>  __('admin.created'), 'data' => 'created_at'],
            'region'  => ['title' =>  __('admin.region'), 'data' => 'region'],
            'is_read' => ['title' =>  __('admin.is_read'), 'data' => 'is_read'],
            'action' => ['title' =>  __('admin.action'), 'data' => 'action'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ServiceRequest_' . date('YmdHis');
    }
}
