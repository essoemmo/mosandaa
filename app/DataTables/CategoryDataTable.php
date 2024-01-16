<?php

namespace App\DataTables;

use App\Models\Category;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CategoryDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('status', function ($query) {
                if ($query->active) {
                    $btn = '
                    <div align="center">
                        <label class="switch">
                        <input data-id="' . $query->id . '" data-url = "' . route("category.status") . '" type="checkbox" id="check" data-massage = "' . __('admin.statuschange') . '" checked>
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
                        <input data-id="' . $query->id . '" data-url = "' . route("category.status") . '" type="checkbox" id="check" data-massage = "' . __('admin.statuschange') . '">
                            <div class="slider round">
                                <span class="on">ON</span>
                                <span class="off">OFF</span>
                            </div>
                        </label>
                    </div>';
                }

                return $btn;
            })
            ->addColumn('action', function ($query) {

                $btn ='<button type="button" class="btn btn-icon btn-icon rounded-circle btn-dark edit" data-toggle="modal"
                    data-target="#modal-edit-category" data-categoryid="'.$query->id.'"  data-title_ar="'.$query->title_ar.'" data-title_en="'.$query->title_en.'"><i data-feather="edit"></i></button> &nbsp;';

                $btn = $btn.
                    '<form class="delete"  action="' . route("categories.destroy", $query->id) . '"  method="POST" id="delform"
                    style="display: inline-block; right: 50px;" >
                    <input name="_method" type="hidden" value="DELETE">
                    <input type="hidden" name="_token" id ="token" value="' . csrf_token() . '">
                    <button type="submit" class="btn btn-icon btn-icon rounded-circle btn-danger" title=" ' . 'Delete' . ' "><i data-feather="trash-2"></i></button>
                        </form>';

                return $btn;
            })
            ->rawColumns(['action', 'status']);
    }

    public function query(Category $model)
    {
        return $model->query();
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('category-table')
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
            'title' => ['title' =>  __('admin.title'), 'data' => 'title'],
            'status' => ['title' =>  __('admin.active'), 'data' => 'status', 'orderable' => false, 'searchable' => false],
            'action' => ['title' =>  __('admin.action'), 'data' => 'action', 'orderable' => false, 'searchable' => false],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Category_' . date('YmdHis');
    }

}
