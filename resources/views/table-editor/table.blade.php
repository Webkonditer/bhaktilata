<table class="table table-bordered table-hover dataTable" role="grid">
    <thead>
        <tr role="row">
            @foreach($table->columns() as $index => $column)
                <th style="{{ $column->parameters()->getWidth() ? 'width: ' . $column->parameters()->getWidth() . ';' : '' }}"
                    class="sorting_asc"
                    aria-sort="ascending"
                    tabindex="{{ $index }}"
                    aria-label="{{ $column->caption() }}: активируйте, чтобы изменить сортировку">
                    {{ $column->caption() }}
                </th>
            @endforeach
            @foreach($table->actions() as $action)
                <th class="action" style="width:30px !important;"></th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($table->rows() as $row)
            <tr role="row">
                @foreach($row->cells() as $cell)
                    <td>{{ $cell->value() }}</td>
                @endforeach
                @foreach($table->actions() as $action)
                    <td><a href="{{ $action->route($row) }}">{!! $action->icon()->render() !!}</a></td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            @foreach($table->columns() as $index => $column)
                <th>{{ $column->caption() }}</th>
            @endforeach
            <th colspan="{{ count($table->actions()) }}"></th>
        </tr>
    </tfoot>
</table>