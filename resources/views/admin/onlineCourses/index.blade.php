@extends('admin.layout')

@section('crumbs')<li class="active">Онлайн курсы</li>@endsection

@section('content')
  <h2>Онлайн курсы</h2>

<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('admin.onlinecourses.create') }}" class="btn btn-primary">Добавить онлайн курс</a>
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
                        Название курсов
                    </th>

                    <th class="action" style="width:30px !important;"></th>
                    <th class="action" style="width:30px !important;"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($onlinecourses as $onlinecourse)
                    <tr role="row">
                        <td>{{ $onlinecourse->id }}</td>
                        <td>{{ $onlinecourse->title }}</td>
                        <td><a href="{{ route('admin.onlinecourses.edit', ['id' => $onlinecourse->id]) }}"><i class="icon glyphicon glyphicon-pencil"></i></a></td>
                        <td><a onclick="return confirm ('Удалить онлайн курс?')" href="{{ route('admin.onlinecourses.delete', ['id' => $onlinecourse->id]) }}"><i class="icon glyphicon glyphicon-remove"></i></a></td>
                    </tr>
                  @empty
                    <tr>
                      <td><h2>Онлайн курсы отсутствуют</h2></td>
                    </tr>

                @endforelse
            </tbody>
            <tfoot>
              <tr>
                <td colspan="3">
                  <li class="pagination pull-right">
                    @if(@isset($onlinecourses))
                      {{$onlinecourses->links()}}
                    @endif
                  </li> .
                </td>
              </tr>
            </tfoot>

        </table>
    </div>
</div>
@endsection
