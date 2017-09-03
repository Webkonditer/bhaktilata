@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('admin.contacts.add') }}" class="btn btn-primary">Добавить контакт</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <table class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Название: активируйте, чтобы изменить сортировку">
                        Раздел
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Код: активируйте, чтобы изменить сортировку">
                        Город/Регион/Проект
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Статус: активируйте, чтобы изменить сортировку">
                        Имя
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Статус: активируйте, чтобы изменить сортировку">
                        E-mail
                    </th>
                    <th class="action" style="width:30px !important;"></th>
                    <th class="action" style="width:30px !important;"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                    <tr role="row">
                        <td>{{ $contact->getSectionTitle() }}</td>
                        <td>{{ $contact->place }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td><a href="{{ route('admin.contact.edit', ['page' => $contact]) }}"><i class="icon glyphicon glyphicon-pencil"></i></a></td>
                        <td><a href="{{ route('admin.contact.delete', ['page' => $contact]) }}"><i class="icon glyphicon glyphicon-remove"></i></a></td>
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