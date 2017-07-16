@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <table class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Название: активируйте, чтобы изменить сортировку">
                        Название
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Код: активируйте, чтобы изменить сортировку">
                        Адрес
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Статус: активируйте, чтобы изменить сортировку">
                        Статус
                    </th>
                    <th class="action" style="width:30px !important;"></th>
                    <th class="action" style="width:30px !important;"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($pages as $page)
                    <tr role="row">
                        <td>{{ $page->title }}</td>
                        <td>{{ $page->path }}</td>
                        <td>{{ $page->status }}</td>
                        <td><a href="{{ route('admin.page.edit', ['page' => $page]) }}"><i class="icon glyphicon glyphicon-pencil"></i></a></td>
                        <td><a href="{{ route('admin.page.delete', ['page' => $page]) }}"><i class="icon glyphicon glyphicon-remove"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Название</th>
                    <th>Код</th>
                    <th>Статус</th>
                    <th>Категория</th>
                </tr>
            </tfoot>
        </table>
        <a href="{{ route('admin.pages.add') }}" class="btn btn-block btn-primary">Добавить</a>
    </div>
</div>
@endsection