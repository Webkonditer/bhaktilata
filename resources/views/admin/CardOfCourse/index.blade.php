@extends('admin.layout')

@section('crumbs')<li class="active">Карточки онлайн курсов</li>@endsection

@section('content')
  <h2>Карточки онлайн курсов</h2>

<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('admin.cardofcourses.create') }}" class="btn btn-primary">Добавить новую карточку</a>
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
                @forelse($cardofcourses as $cardofcourse)
                    <tr role="row">
                        <td>{{ $cardofcourse->id }}</td>
                        <td>{{ $cardofcourse->title }}</td>
                        <td><a href="{{ route('admin.cardofcourses.edit', ['id' => $cardofcourse->id]) }}"><i class="icon glyphicon glyphicon-pencil"></i></a></td>
                        <td><a onclick="return confirm ('Удалить карточку курса?')" href="{{ route('admin.cardofcourses.delete', ['id' => $cardofcourse->id]) }}"><i class="icon glyphicon glyphicon-remove"></i></a></td>
                    </tr>
                  @empty
                    <tr>
                      <td><h2>Карточки онлайн курсов отсутствуют</h2></td>
                    </tr>

                @endforelse
            </tbody>
            <tfoot>
              <tr>
                <td colspan="3">
                  <li class="pagination pull-right">
                    @if(@isset($cardofcourses))
                      {{$cardofcourses->links()}}
                    @endif
                  </li>
                </td>
              </tr>
            </tfoot>

        </table>
    </div>
</div>
@endsection
