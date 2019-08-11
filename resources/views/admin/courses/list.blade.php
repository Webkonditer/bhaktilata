@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('admin.course.add') }}" class="btn btn-primary">Добавить курс</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <table class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Название: активируйте, чтобы изменить сортировку">
                        Название
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Код: активируйте, чтобы изменить сортировку">
                        Код
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Статус: активируйте, чтобы изменить сортировку">
                        Статус
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Категория: активируйте, чтобы изменить сортировку">
                        Категория
                    </th>
                    <th style="width:30px;"></th>
                    <th style="width:30px;"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                    <tr role="row">
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->slug }}</td>
                        <td>{{ $course->status }}</td>
                        <td>{{ $course->category ? $course->category->title : 'Не указана'}}</td>
                        <td><a href="{{ route('admin.course.edit', ['course' => $course]) }}"><i class="icon glyphicon glyphicon-pencil"></i></a></td>
                        <td><a href="{{ route('admin.course.delete', ['course' => $course]) }}"><i class="icon glyphicon glyphicon-remove"></i></a></td>
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
    </div>
</div>
@endsection