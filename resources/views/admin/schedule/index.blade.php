@extends('admin.layout')

@section('crumbs')<li class="active">Расписания</li>@endsection

@section('content')
  <h2>Расписания для курсов</h2>

  <div style="font-weight: 600">Код для вставки на страницу курса:</div>

    @forelse ($courselist as $course)
      <div>- {{$course->course}} - <span style = "background-color: #CCC">{{ '<div id="sc">'}}{{$course->id}}{{'</div><script src="js/get_page.js"></script>' }}</span></div>
    @empty
      <div>Доступные курсы отсутствуют</div>
    @endforelse
<br>
<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('admin.schedule.create') }}" class="btn btn-primary">Добавить Расписание</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <table class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Название: активируйте, чтобы изменить сортировку">
                        Курс
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Код: активируйте, чтобы изменить сортировку">
                        Город
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Статус: активируйте, чтобы изменить сортировку">
                        Преподаватель
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Статус: активируйте, чтобы изменить сортировку">
                        Даты
                    </th>

                    <th class="action" style="width:30px !important;"></th>
                    <th class="action" style="width:30px !important;"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($schedules as $schedule)
                    <tr role="row">
                        <td>{{ $schedule->courselist->course }}</td>
                        <td>{{ $schedule->city }}</td>
                        <td>{{ json_decode($schedule->teacher, TRUE)['name'] }}</td>
                        <td>{{ date ('d.m.Y', strtotime($schedule->beginning_date)) }} - {{ date ('d.m.Y', strtotime($schedule->expiration_date)) }}</td>
                        <td><a href="{{ route('admin.schedule.edit', ['id' => $schedule->id]) }}"><i class="icon glyphicon glyphicon-pencil"></i></a></td>
                        <td><a href="{{ route('admin.schedule.delete', ['id' => $schedule->id]) }}"><i class="icon glyphicon glyphicon-remove"></i></a></td>
                    </tr>
                  @empty
                    <tr>
                      <td><h2>Расписания отсутствуют</h2></td>
                    </tr>

                @endforelse
            </tbody>
            <tfoot>
              <tr>
                <td colspan="3">
                  <li class="pagination pull-right">
                    @if(@isset($shedules))
                      {{$shedules->links()}}
                    @endif
                  </li> .
                </td>
              </tr>
            </tfoot>

        </table>
    </div>
</div>
@endsection
