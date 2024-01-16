<?php

namespace App\DataTables;

use App\Models\Branch;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class BranchDataTable extends DataTable
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
            ->addColumn('action', function ($row) {
                if (Auth::guard('admin')->user()->hasPermission('branches-delete')){
                    $btn =
                    '<form class="delete"  action="' . route("branches.destroy", $row->id) . '"  method="POST" id="delform"
                    style="display: inline-block; right: 50px;" >
                    <input name="_method" type="hidden" value="DELETE">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                    <button type="submit" class="btn btn-icon btn-icon rounded-circle btn-danger" title=" ' . 'Delete' . ' "><i data-feather="trash-2"></i></button>
                        </form>';
                }else{
                    $btn = '<button class="btn btn-danger btn-xs disabled"><i data-feather="trash-2"></i></button>';
                }

                return $btn;
            })
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Branch $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Branch $model)
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
                    ->setTableId('branches-table')
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
            'name' => ['name' =>  __('admin.name'), 'data' => 'name'],
            'address' => ['title' =>  __('admin.address'), 'data' => 'address'],
            'phone' => ['title' =>  __('admin.phone'), 'data' => 'phone'],
            'fax' => ['title' =>  __('admin.fax'), 'data' => 'fax'],
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
        return 'Branch_' . date('YmdHis');
    }
}
