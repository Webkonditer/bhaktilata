<?php
/**
 * @var \App\Domain\Contacts\Contact $contact
 */
?>
@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">
            {{--<div class="box-header with-border">--}}
            {{--<h3 class="box-title">Quick Example</h3>--}}
            {{--</div>--}}
            {{--<!-- /.box-header -->--}}
                {!! $form->render() !!}
            </div>
        </div>
    </div>
@endsection