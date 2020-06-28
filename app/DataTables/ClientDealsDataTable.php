<?php

namespace App\DataTables;

use App\ClientDeal;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ClientDealsDataTable extends DataTable
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
			->addColumn('checkbox', 'clientdeals.btn.checkbox')
			->addColumn('delete', 'clientdeals.btn.delete')
			->rawColumns([
                'delete',
                'checkbox',
			]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\ClientDeal $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ClientDeal $model)
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
                    ->setTableId('clientdeals-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)

                    ->parameters([
                        'dom'        => 'Blfrtip',
                        'lengthMenu' => [[10, 25, 50, 100], [10, 25, 50, 100]],
                        'buttons'    => [

                            ['extend'   => 'print', 'className'   => 'btn btn-primary', 'text'   => '<i class="fa fa-print"></i>'],
                            ['extend'   => 'csv', 'className'   => 'btn btn-info', 'text'   => '<i class="fa fa-file"></i> '.trans('clientdeals csv')],
                            ['extend'   => 'excel', 'className'   => 'btn btn-success', 'text'   => '<i class="fa fa-file"></i> '.trans('clientdeals excel')],
                            ['extend'   => 'reload', 'className'   => 'btn btn-default', 'text'   => '<i class="fa fa-refresh"></i>'],
                            ['text' => '<i class="fa fa-trash"></i>', 'className' => 'btn btn-danger delBtn'],

                        ],
                        'initComplete' => " function () {
                            this.api().columns([1,2,3,4,5]).every(function () {
                                var column = this;
                                var input = document.createElement(\"input\");
                                $(input).width('100%');
                                $(input).appendTo($(column.footer()).empty())
                                .on('keyup', function () {
                                    column.search($(this).val(), false, false, true).draw();
                                });
                            });
                        }",

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
				'name'       => 'checkbox',
				'data'       => 'checkbox',
				'title'      => '<input type="checkbox" class="check_all" onclick="check_all()" />',
				'exportable' => false,
				'printable'  => false,
				'orderable'  => false,
				'searchable' => false,
			],
            Column::make('id'),
            Column::make('client_id')->width(60),
            Column::make('client'),
            Column::make('deal_id'),
            Column::make('deal'),
            Column::make('hour'),
            Column::make('accepted'),
            Column::make('refused'),
            Column::computed('delete')
                ->title(trans('delete'))
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ClientDeals_' . date('YmdHis');
    }
}
