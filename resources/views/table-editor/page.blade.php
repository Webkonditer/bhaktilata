<?php
/**
 * @var \App\Domain\Contacts\Contact[]|Collection $contacts
 */
?>
@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <a href="{{ $addAction['route'] }}" class="btn btn-primary">{{ $addAction['text'] }}</a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div>{{ $paging->render() }}</div>
            {!! $table->render() !!}
            <div>{{ $paging->render() }}</div>
        </div>
    </div>
@endsection