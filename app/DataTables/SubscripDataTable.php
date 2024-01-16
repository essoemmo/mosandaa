<?php

namespace App\DataTables;

use App\Models\Subscrip;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SubscripDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query);
            
    }
        /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Section $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Subscrip $model)
    {
        return $model->query();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('subscrip-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->parameters([
                        "processing" => true,
                        "serverSide" => true,
                        "responsive" => true,
                        "searching"  => true,
                        "drawCallback" => "function( settings ) {
                            feather.replace();
                         }"
                        ]);
                   // ->orderBy(0);
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
            'email' => ['title' => __('admin.email'), 'data' => 'email'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Subscrip_' . date('YmdHis');
    }
}