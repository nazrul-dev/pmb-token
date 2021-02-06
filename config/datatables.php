<?php
return [
    'search'         => [
        'smart'            => true,
        'multi_term'       => true,
        'case_insensitive' => true,
        'use_wildcards'    => false,
        'starts_with'      => false,
    ],
    'index_column'   => 'DT_RowIndex',
    'engines'        => [
        'eloquent'   => Yajra\DataTables\EloquentDataTable::class,
        'query'      => Yajra\DataTables\QueryDataTable::class,
        'collection' => Yajra\DataTables\CollectionDataTable::class,
        'resource'   => Yajra\DataTables\ApiResourceDataTable::class,
    ],
    'builders'       => [
        //Illuminate\Database\Eloquent\Relations\Relation::class => 'eloquent',
        //Illuminate\Database\Eloquent\Builder::class            => 'eloquent',
        //Illuminate\Database\Query\Builder::class               => 'query',
        //Illuminate\Support\Collection::class                   => 'collection',
    ],
    'nulls_last_sql' => ':column :direction NULLS LAST',
    'error'          => env('DATATABLES_ERROR', null),
    'columns'        => [
        'excess'    => ['rn', 'row_num'],
        'escape'    => '*',
        'raw'       => ['action'],
        'blacklist' => ['password', 'remember_token'],
        'whitelist' => '*',
    ],
    'json'           => [
        'header'  => [],
        'options' => 0,
    ],
];
