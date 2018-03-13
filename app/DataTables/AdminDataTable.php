<?php

namespace App\DataTables;

//use App\Http\Middleware\Admin;
use App\Admin;

//use PDF;
//use Barryvdh\Snappy;
use phpDocumentor\Reflection\Types\Self_;
use Yajra\DataTables\Services\DataTable;

class AdminDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('edit', 'admin.admins.btn.edit')
            ->addColumn('delete', 'admin.admins.btn.delete')
            ->rawColumns([
                'edit',
                'delete'
            ]);
    }

    public static function lang()
    {
        $langJason = [
            'sProcessing' => trans('admin_lang.sProcessing')
        ];

//        return (object) $langJason;
        return json_encode($langJason);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Admin $model)
    {
//        return $model->newQuery()->select('id', 'add-your-columns-here', 'created_at', 'updated_at');
        return Admin::query();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
//            ->addAction(['width' => '80px'])
            // ->parameters($this->getBuilderParameters());
            ->parameters([
                'dom' => 'Blfrtip',
                'lengthMenu' => [[10, 25, 50, 100, -1], [10, 25, 50, 100, 'All Records']],
                'buttons' => [
                    ['text' => 'Create Admin'],
                    ['extend' => 'print', 'className' => 'btn btn-primary', 'text' => 'print '],
                    ['extend' => 'csv', 'className' => 'btn btn-info', 'text' => '<i class="fa fa-print">print</i>'],
                    ['extend' => 'pdf', 'className' => 'btn btn-info', 'text' => '<i class="fa fa-print">print</i>'],
                    ['extend' => 'refresh', 'className' => 'btn btn-info', 'text' => '<i class="fa fa-print">print</i>'],
                ],
                'language' => self::lang()

            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'name' => 'id',
                'data' => 'id',
                'title' => 'ID'
            ],
            'name',
            'email',
//            'action',
            'created_at',
            'updated_at',
            [
                'name' => 'edit',
                'data' => 'edit',
                'title' => 'Edit',
                'exportable' => false,
                'printable' => false,
                'searchable' => false,
                'orderable' => false,
            ],
            [
                'name' => 'delete',
                'data' => 'delete',
                'title' => 'Delete',
                'exportable' => false,
                'printable' => false,
                'searchable' => false,
                'orderable' => false,
            ],

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Admin_' . date('YmdHis');
    }
}
