@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('admin.project.category.add') }}" class="btn btn-primary">Добавить категорию</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <table class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Статус: активируйте, чтобы изменить сортировку">
                        Опубликована
                    </th>
                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Название: активируйте, чтобы изменить сортировку">
                        Название
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Код: активируйте, чтобы изменить сортировку">
                        Код
                    </th>
                    <th style="width:30px;"></th>
                    <th style="width:30px;"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr role="row">
                        <td>{{ $category->isPublished() ? 'Да' : 'Нет'}}</td>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->slug }}</td>
                        <td><a href="{{ route('admin.project.category.edit', ['category' => $category]) }}"><i class="icon glyphicon glyphicon-pencil"></i></a></td>
                        <td><a href="{{ route('admin.project.category.delete', ['course' => $category]) }}"><i class="icon glyphicon glyphicon-remove"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Название</th>
                    <th>Код</th>
                    <th>Статус</th>
                    <th colspan="2"></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection