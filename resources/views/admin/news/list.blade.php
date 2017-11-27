<?php
/**
 * @var \App\Domain\Contacts\Contact[]|Collection $contacts
 */
?>
@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('admin.news.add') }}" class="btn btn-primary">Добавить новость</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div>{{ $paging->render() }}</div>
        <table class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
                <tr role="row">
                    <th style="width: 45px;" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Название: активируйте, чтобы изменить сортировку">
                        Вкл.
                    </th>
                    <th style="width: 75px;" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Название: активируйте, чтобы изменить сортировку">
                        Код
                    </th>
                    <th style="width: 75px;" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Название: активируйте, чтобы изменить сортировку">
                        Заголовок
                    </th>
                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Название: активируйте, чтобы изменить сортировку">
                        Дата
                    </th>
                    <th class="action" style="width:30px !important;"></th>
                    <th class="action" style="width:30px !important;"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($news as $newsItem)
                    <tr role="row">
                        <td>{{ $newsItem->isPublished() ? 'Да' : 'Нет' }}</td>
                        <td>{{ $newsItem->slug}}</td>
                        <td>{{ $newsItem->title}}</td>
                        <td>{{ $newsItem->date ? $newsItem->date->format('d.m.Y') : '' }}</td>
                        <td><a href="{{ route('admin.news.edit', ['newsItem' => $newsItem]) }}"><i class="icon glyphicon glyphicon-pencil"></i></a></td>
                        <td><a href="{{ route('admin.news.delete', ['newsItem' => $newsItem]) }}"><i class="icon glyphicon glyphicon-remove"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Вкл.</th>
                    <th>Код</th>
                    <th>Заголовок</th>
                    <th>Дата</th>
                    <th colspan="2"></th>
                </tr>
            </tfoot>
        </table>
        <div>{{ $paging->render() }}</div>
    </div>
</div>
@endsection