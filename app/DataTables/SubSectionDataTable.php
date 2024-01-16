<?php

namespace App\DataTables;

use App\Models\SubSection;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SubSectionDataTable extends DataTable
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
            ->editColumn('created_at', function ($query) {
                $start = Carbon::parse($query->created_at)->format('Y-m-d');
                return $start;
            })
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
              ->editColumn('is_banner', function ($query) {
                if ($query->is_banner) {
                    $btn = '
                    <div align="center">
                        <label class="switch">
                        <input data-id="' . $query->id . '" type="checkbox" id="checkBanner" checked>
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
                        <input data-id="' . $query->id . '" type="checkbox" id="checkBanner">
                            <div class="slider round">
                                <span class="on">ON</span>
                                <span class="off">OFF</span>
                            </div>
                        </label>
                    </div>';
                }

                return $btn;
            })
            ->addColumn('image', function ($query) {
                if ($query->images) {
                    return '<button type="button" class="btn btn-icon btn-icon rounded-circle btn-dark photo" data-id="' . $query->id . '" data-toggle="modal" data-target="#typesList"> <i data-feather="eye"></i></button> &nbsp;';
                }
                return '<div align="center">No Image</div>';
            })
            ->addColumn('action', function ($row) {

                if (Auth::guard('admin')->user()->hasPermission('sections-update')) {
                    $btn = '<button type="button" class="btn btn-icon btn-icon rounded-circle btn-dark edit" data-toggle="modal"
                    data-target="#modal-edit-subsection" data-subsectionid="' . $row->id . '" data-title_ar="' . $row->title_ar . '" data-title_en="' . $row->title_en . '" data-description_en="' . $row->description_en . '" data-description_ar="' . $row->description_ar . '" data-subsection_image="' . $row->image . '" data-url="' . $row->url . '"  data-datesec="' . $row->created_at . '"><i data-feather="edit"></i></button> &nbsp;';
                } else {
                    $btn = '<button  type="button" class="btn btn-icon btn-icon rounded-circle btn-dark disabled"><i data-feather="edit"></i></button>';
                }

                if (Auth::guard('admin')->user()->hasPermission('sections-delete')) {
                    $btn = $btn .
                        '<form class="delete"  action="' . route("subsections.destroy", $row->id) . '"  method="POST" id="delform"
                    style="display: inline-block; right: 50px;" >
                    <input name="_method" type="hidden" value="DELETE">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                    <button type="submit" class="btn btn-icon btn-icon rounded-circle btn-danger" title=" ' . 'Delete' . ' "><i data-feather="trash-2"></i></button>
                        </form>';
                } else {
                    $btn = $btn . '<button class="btn btn-danger btn-xs disabled"><i data-feather="trash-2"></i></button>';
                }

                return $btn;
            })
            ->rawColumns(['action', 'image','active','is_banner']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\SubSection $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SubSection $model)
    {
        return $model->query()->where('section_id', $this->id);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('section-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->parameters([
                "processing" => true,
                "serverSide" => true,
                "responsive" => true,
                "searching" => true,
                "drawCallback" => "function( settings ) {
                            feather.replace();
                        }"
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
            'title' => ['title' => __('admin.title'), 'data' => 'title'],
            'description' => ['title' => __('admin.description'), 'data' => 'description', 'width' => '40%'],
            'active' => ['title' =>  __('admin.active'), 'data' => 'active'],
            'is_banner' => ['title' =>  __('admin.is_banner'), 'data' => 'is_banner'],
            'image' => ['title' => __('admin.image'), 'data' => 'image'],
            'created_at' => ['title' => __('admin.date'), 'data' => 'created_at'],
            'action' => ['title' => __('admin.action'), 'data' => 'action', 'orderable' => false, 'searchable' => false],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'SubSection_' . date('YmdHis');
    }
}
