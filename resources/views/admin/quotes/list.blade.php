@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('admin.quotes.add') }}" class="btn btn-primary">Добавить цитату</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <table class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Название: активируйте, чтобы изменить сортировку">
                        День публикации
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Код: активируйте, чтобы изменить сортировку">
                        Дата цитаты
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Статус: активируйте, чтобы изменить сортировку">
                        Место цитаты
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Статус: активируйте, чтобы изменить сортировку">
                        Подпись цитаты
                    </th>
                    <th class="action" style="width:30px !important;"></th>
                    <th class="action" style="width:30px !important;"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($quotes as $quote)
                    <tr role="row">
                        <td>{{ $quote->day->format('d.m.Y') }}</td>
                        <td>{{ $quote->date ? $quote->date->format('d.m.Y') : '' }}</td>
                        <td>{{ $quote->location }}</td>
                        <td>{{ $quote->author }}</td>
                        <td><a href="{{ route('admin.quote.edit', ['quote' => $quote]) }}"><i class="icon glyphicon glyphicon-pencil"></i></a></td>
                        <td><a href="{{ route('admin.quote.delete', ['quote' => $quote]) }}"><i class="icon glyphicon glyphicon-remove"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>День публикации</th>
                    <th>Дата цитаты</th>
                    <th>Место цитаты</th>
                    <th>Подпись цитаты</th>
                    <th colspan="2"></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection