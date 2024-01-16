<?php

namespace App\DataTables;

use Illuminate\Support\Facades\Auth;
use App\Models\Ads;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class AdsDataTable extends DataTable
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
            ->editColumn('active', function ($query) {
                if ($query->active) {
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
            ->addColumn('action', function ($row) {

                if (Auth::guard('admin')->user()->hasPermission('ads-update')){
                    $btn = '<button type="button" class="btn btn-icon btn-icon rounded-circle btn-dark edit" data-toggle="modal"
                    data-target="#modal-edit-ads" data-adsid="'.$row->id.'"  data-title_en="'.$row->title_en.'" data-title_ar="'.$row->title_ar.'" ><i data-feather="edit"></i></button> &nbsp;';
                   }else{
                    $btn = '<button  type="button" class="btn btn-icon btn-icon rounded-circle btn-dark disabled"><i data-feather="edit"></i></button>';
                   }

                if (Auth::guard('admin')->user()->hasPermission('ads-delete')){
                    $btn = $btn .
                    '<form class="delete"  action="' . route("ads.destroy", $row->id) . '"  method="POST" id="delform"
                    style="display: inline-block; right: 50px;" >
                    <input name="_method" type="hidden" value="DELETE">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                    <button type="submit" class="btn btn-icon btn-icon rounded-circle btn-danger" title=" ' . 'Delete' . ' "><i data-feather="trash-2"></i></button>
                        </form>';
                }else{
                    $btn = $btn . '<button class="btn btn-danger btn-xs disabled"><i data-feather="trash-2"></i></button>';
                }

                return $btn;
            })
            ->rawColumns(['action', 'active']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Ad $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Ads $model)
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
                    ->setTableId('ads-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
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
            'title' => ['title' =>  __('admin.title'), 'data' => 'title'],
            'active' => ['title' =>  __('admin.active'), 'data' => 'active'],
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
        return 'Ads_' . date('YmdHis');
    }
}
