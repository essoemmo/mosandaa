<?php

namespace App\DataTables;

use App\Models\JobRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class JobRequestDataTable extends DataTable
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
             if (Auth::guard('admin')->user()->hasPermission('request_jobs-read')){
                $btn = '<button type="button" class="btn btn-icon btn-icon rounded-circle btn-dark jobreq" data-id="' . $query->id . '" data-name="' . $query->name . '" data-email="' . $query->email . '" data-phone="' . $query->phone . '" data-phone="' . $query->phone . '" data-job_type="' . $query->job_type . '" data-job_address="' . $query->job_address . '"  data-job_address="' . $query->job_address . '" data-job_numb="' . $query->job_numb . '"  data-job_city="' . $query->job_city . '" data-sex="' . $query->sex . '"  data-birth_date="' . $query->birth_date . '"  data-birth_place="' . $query->birth_place . '"  data-special="' . $query->special . '" data-graduation_rate="' . $query->graduation_rate . '"  data-experience ="' . $query->experience . '"data-graduation_year="' . $query->graduation_year . '" data-Fellowships ="' . $query->Fellowships . '"  data-note ="' . $query->note . '"
              data-toggle="modal" data-target="#details"> <i data-feather="eye"></i></button> &nbsp;';
            }

            if (Auth::guard('admin')->user()->hasPermission('request_jobs-delete')){
                $btn = $btn .
                '<form class=" delete"  action="' . route("request_jobs.destroy", $query->id) . '"  method="POST" id="delform"
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
     * @param \App\Models\JobRequest $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(JobRequest $model)
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
                    ->setTableId('jobrequest-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Blfrtip')
                    ->buttons(
                        Button::make('print')
                      //  Button::make('excel')
                    )
                    ->parameters([
                        "processing" => true,
                        "serverSide" => true,
                        "responsive" => true,
                        "searching"=> true,
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
            'job_address' => ['title' =>  __('admin.jobaddress'), 'data' => 'job_address'],
            'job_numb' => ['title' =>  __('admin.job_numb'), 'data' => 'job_numb'],
            'job_city' => ['title' =>  __('admin.city'), 'data' => 'job_city'],
            'name' => ['title' =>  __('admin.name'), 'data' => 'name'],
            'phone' => ['title' =>  __('admin.phone'), 'data' => 'phone'],
            'birth_date' => ['title' =>  __('admin.birthdate'), 'data' => 'birth_date'],
            'sex' => ['title' =>  __('admin.sex'), 'data' => 'sex'],
            'national' => ['title' =>  __('admin.national'), 'data' => 'national'],
            'created_at' => ['title' =>  __('admin.created'), 'data' => 'created_at'],
            'graduation_rate' => ['title' =>  __('admin.graduationrate'), 'data' => 'graduation_rate'],
            'experience_year'  => ['title' =>  __('admin.experience_year'), 'data' => 'experience_year'],
            'is_read' => ['title' =>  __('admin.is_read'), 'data' => 'is_read'],
            'action' => ['title' =>  __('admin.action'), 'data' => 'action'],
        ];
    }

    /**
     * 
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'JobRequest_' . date('YmdHis');
    }
}
