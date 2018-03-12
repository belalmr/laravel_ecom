<?php

namespace App\DataTables;

//use App\Http\Middleware\Admin;
use App\Admin;
use Yajra\DataTables\Services\DataTable;

class AdminDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable1($query)
    {
        return datatables($query)
            ->addColumn('action', 'admindatatable.action');
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
            ->addAction(['width' => '80px'])
            // ->parameters($this->getBuilderParameters());
            ->parameters([
//                'dom' => 'Blfrtip',
                'lengthMenu' => [[10, 25, 50, 100, -1], [10, 25, 50, 'All Recorde']]
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
            'id',
            'name',
            'email',
            'action',
            'created_at',
            'updated_at'
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
