@extends('admin.layout')

@section('crumbs')<li class="active">Добавить преподавателя</li>@endsection

@section('content')
  <h2>Список преподаватей:</h2>

<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('admin.teachers.create') }}" class="btn btn-primary">Добавить преподавателя</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <table class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Название: активируйте, чтобы изменить сортировку">
                        ID
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Код: активируйте, чтобы изменить сортировку">
                        Фото
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Статус: активируйте, чтобы изменить сортировку">
                        Имя
                    </th>

                    <th class="action" style="width:30px !important;"></th>
                    <th class="action" style="width:30px !important;"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($teachers as $teacher)
                    <tr role="row">
                        <td>{{ $teacher->id }}</td>
                        <td><img height="40"  src="{{ asset('/storage/'.$teacher->foto) }}" alt="..."></td>
                        <td>{{ $teacher->name }}</td>
                        <td><a href="{{ route('admin.teachers.edit', ['teacher' => $teacher->id]) }}"><i class="icon glyphicon glyphicon-pencil"></i></a></td>
                        <td><a onclick="return confirm ('Удалить преподавателя?')" href="{{ route('admin.teachers.delete', ['teacher' => $teacher->id]) }}"><i class="icon glyphicon glyphicon-remove"></i></a></td>
                    </tr>
                  @empty
                    <tr>
                      <td><h2>Преподаватели отсутствуют</h2></td>
                    </tr>

                @endforelse
            </tbody>


        </table>
    </div>
</div>
@endsection
