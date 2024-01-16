<?php

namespace App\DataTables;

use App\Models\ConsultDetails;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ConsultDetailDataTable extends DataTable
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
            ->editColumn('description', function ($row) {
                return '<div>'.$row->description.'</div>';
            })
            ->addColumn('action', function ($row) {

                if (Auth::guard('admin')->user()->hasPermission('cons_details-update')){
                    $btn = '<button type="button" class="btn btn-icon btn-icon rounded-circle btn-dark edit" data-toggle="modal"
                    data-target="#modal-edit-cons_details" data-cons_detailsid="'.$row->id.'" data-description_ar="'.$row->description_ar.'" data-description_en="'.$row->description_en.'" data-type="'.$row->type.'"><i data-feather="edit"></i></button> &nbsp;';
                   }else{
                    $btn = '<button  type="button" class="btn btn-icon btn-icon rounded-circle btn-dark disabled"><i data-feather="edit"></i></button>';
                   }

                if (Auth::guard('admin')->user()->hasPermission('cons_details-delete')){
                    $btn = $btn .
                    '<form class="delete"  action="' . route("cons_details.destroy", $row->id) . '"  method="POST" id="delform"
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
            ->rawColumns(['action','description']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ConsultDetailDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ConsultDetails $model)
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
                    ->setTableId('cons_details-table')
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
            'description' => ['title' =>  __('admin.description'), 'data' => 'description'],
            'type' => ['title' =>  __('admin.type'), 'data' => 'type'],
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
        return 'ConsultDetail_' . date('YmdHis');
    }
}
