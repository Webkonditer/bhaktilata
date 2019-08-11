@extends('admin.layout')

@section('crumbs')<li class="active">Видео и вебинары</li>@endsection

@section('content')
  <h2>Список добавленных видео и вебинаров:</h2>

<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('admin.video.create') }}" class="btn btn-primary">Добавить видео или вебинар</a>
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
                        Категория
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Статус: активируйте, чтобы изменить сортировку">
                        Автор
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Статус: активируйте, чтобы изменить сортировку">
                        Дата добавления
                    </th>
                    <th class="action" style="width:30px !important;"></th>
                    <th class="action" style="width:30px !important;"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($videos as $video)
                    <tr role="row">
                        <td>{{ $video->title }}</td>
                        <td>{{ $video->category }}</td>
                        <td>{{ $video->autor }}</td>
                        <td>{{ $video->created_at }}</td>
                        <td><a href="{{ route('admin.video.edit', ['id' => $video->id]) }}"><i class="icon glyphicon glyphicon-pencil"></i></a></td>
                        <td><a href="{{ route('admin.video.delete', ['id' => $video->id]) }}"><i class="icon glyphicon glyphicon-remove"></i></a></td>
                    </tr>
                  @empty
                    <tr>
                      <td><h2>Видео отсутствуют</h2></td>
                    </tr>

                @endforelse
            </tbody>
            <tfoot>
              <tr>
                <td colspan="3">
                  <li class="pagination pull-right">
                    {{$videos->links()}}
                  </li> .
                </td>
              </tr>
            </tfoot>

        </table>
    </div>
</div>
@endsection
