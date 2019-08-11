@extends('admin.layout')

@section('crumbs')<li class="active">Документы</li>@endsection

@section('content')
  <h2>Список добавленных документов:</h2>

  @isset($path) <a href="{{ asset('/storage/' . $path) }}">Документ</a>@endisset

<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('admin.documentation.create') }}" class="btn btn-primary">Добавить документ</a>
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
                        Дата добавления
                    </th>
                    <th class="action" style="width:30px !important;"></th>
                    <th class="action" style="width:30px !important;"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($documentations as $documentation)
                    <tr role="row">
                        <td>{{ $documentation->title }}</td>
                        <td>{{ $documentation->category }}</td>
                        <td>{{ $documentation->created_at }}</td>
                        <td><a href="{{ route('admin.documentation.edit', ['id' => $documentation->id]) }}"><i class="icon glyphicon glyphicon-pencil"></i></a></td>
                        <td><a href="{{ route('admin.documentation.delete', ['id' => $documentation->id]) }}"><i class="icon glyphicon glyphicon-remove"></i></a></td>
                    </tr>
                  @empty
                    <tr>
                      <td><h2>Документы отсутствуют</h2></td>
                    </tr>

                @endforelse
            </tbody>
            <tfoot>
              <tr>
                <td colspan="3">
                  <li class="pagination pull-right">
                    {{$documentations->links()}}
                  </li> .
                </td>
              </tr>
            </tfoot>

        </table>
    </div>
</div>
@endsection
