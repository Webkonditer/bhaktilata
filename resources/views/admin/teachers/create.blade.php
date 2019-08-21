<?php
/**
 * @var \App\Pages\Page $page
 */
?>
@extends('admin.layout')

@section('crumbs')<li class="active">Новый преподаватель</li>@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">

                <h2>Добавление нового преподавателя</h2>
                {{-----------------------------}}

                <form role="form" name="edit" action="{{ route('admin.teachers.store')}}" method="POST" enctype="multipart/form-data">

                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{$error}}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif

                  <input name="_token" value="{{ csrf_token() }}" type="hidden">

                  <div class="box-body">

                    <div class="form-group">
                      <label for="teacher">Имя</label>
                      <input name="name" class="form-control"
                        value="{{old('name')}}"
                        placeholder="Имя"
                        type="text"
                      />
                    </div>

                    <div class="form-group">
                      <label for="image">Фото преподавателя (Не более 2 Мб)</label>
                      <input name="foto" id="image" value="" type="file">
                    </div>

                    <div class="form-group">
                        <label for="description">Описание преподавателя</label><br>
                        <textarea id="description"
                                  name="description"
                                  rows="5"
                                  cols="80">
                                  {{old('description')}}
                       </textarea>
                    </div>

                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                      <button type="submit" name="edit[submit]" value="1" class="btn btn-primary">Сохранить</button>
                  </div>
              </form>

                {{----------------------------------}}
            </div>
        </div>
    </div>
@endsection
