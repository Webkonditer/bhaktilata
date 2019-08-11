@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('admin.project.add') }}" class="btn btn-primary">Добавить проект</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <table class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Статус: активируйте, чтобы изменить сортировку">
                        Опубликован
                    </th>
                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Название: активируйте, чтобы изменить сортировку">
                        Название
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Код: активируйте, чтобы изменить сортировку">
                        Код
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Категория: активируйте, чтобы изменить сортировку">
                        Категория
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Категория: активируйте, чтобы изменить сортировку">
                        Состояние
                    </th>
                    <th style="width:30px;"></th>
                    <th style="width:30px;"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                    <tr role="row">
                        <td>{{ $project->isPublished() ? 'Да' : 'Нет' }}</td>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->slug }}</td>
                        <td>{{ $project->category ? $project->category->title : 'Не указана'}}</td>
                        <td><a href="{{ route('admin.project.edit', ['project' => $project]) }}"><i class="icon glyphicon glyphicon-pencil"></i></a></td>
                        <td><a href="{{ route('admin.project.delete', ['project' => $project]) }}"><i class="icon glyphicon glyphicon-remove"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Опубликован</th>
                    <th>Название</th>
                    <th>Код</th>
                    <th>Категория</th>
                    <th colspan="2"></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection