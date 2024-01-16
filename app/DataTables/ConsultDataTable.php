<?php

namespace App\DataTables;

use App\Models\Consult;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Auth;

class ConsultDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($row) {

                if (Auth::guard('admin')->user()->hasPermission('consults-update')){
                    $btn = '<button type="button" class="btn btn-icon btn-icon rounded-circle btn-dark edit" data-toggle="modal"
                    data-target="#modal-edit-consults" data-consultsid="'.$row->id.'"
                    data-name_ar="'.$row->name_ar.'" data-name_en="'.$row->name_en.'"  data-title_en="'.$row->title_en.'" data-title_ar="'.$row->title_ar.'" data-description_ar="'.$row->description_ar.'" data-description_en="'.$row->description_en.'" data-position_ar = "'.$row->position_ar.'" data-position_en = "'.$row->position_en.'" data-type = "'.$row->type.'" data-consults_image="'.$row->image.'"><i data-feather="edit"></i></button> &nbsp;';
                   }else{
                    $btn = '<button  type="button" class="btn btn-icon btn-icon rounded-circle btn-dark disabled"><i data-feather="edit"></i></button>';
                   }

                if (Auth::guard('admin')->user()->hasPermission('consults-delete')){
                    $btn = $btn .
                    '<form class="delete"  action="' . route("consults.destroy", $row->id) . '"  method="POST" id="delform"
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

    public function query(Consult $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
                    ->setTableId('consult-table')
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

    protected function getColumns()
    {
        return [
            'id' => ['title' => 'ID', 'data' => 'id'],
            'name' => ['title' =>  __('admin.name'), 'data' => 'name'],
            'title' => ['title' =>  __('admin.title'), 'data' => 'title'],
            'position' => ['title' =>  __('admin.position'), 'data' => 'position'],
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
        return 'Consult_' . date('YmdHis');
    }
}
