<?php
/**
 * @var \App\Pages\Page $page
 */
?>
@extends('admin.layout')

@section('crumbs')<li class="active">Новый документ</li>@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">

                <h2>Загрузка нового документа</h2>
                <form role="form" name="edit" enctype="multipart/form-data" action="{{ route('admin.documentation.store')}}" method="POST">

                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{$error}}</li>
                        @endforeach
                      </ul>

                    </div>

                  @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="box-body">

                      <div class="form-group">
                          <label for="exampleInputFile">Загрузите файл документа с компьютера</label>
                          <input type="file" name="document" id="exampleInputFile">
                      </div>

                      <div class="form-group">
                          <label for="title">или укажите адрес документа в Интернете</label>
                          <input type="text"
                                 name="document"
                                 class="form-control"
                                 value="{{old('document')}}"
                                 placeholder="http://example.site/any.doc"
                          />
                      </div>

                        <div class="form-group">
                            <label for="title">Выберите категорию</label>
                            <select class="form-control" name="category">
                              @foreach ($categories as $category_list)
                                <option value="{{$category_list}}">
                                  {{$category_list}}
                                </option>
                              @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">или создайте новую категорию</label>
                            <input type="text"
                                   name="new_category"
                                   class="form-control"
                                   value="{{old('new_category')}}"
                                   placeholder="Введите название новой категории"
                            />
                        </div>

                        <div class="form-group">
                            <label for="title">Название документа</label>
                            <input type="text"
                                   name="title"
                                   class="form-control"
                                   id="title"
                                   value="{{old('title')}}"
                                   placeholder="Введите название"
                            />
                        </div>

                        <div class="form-group">
                            <label for="description">Описание документа</label>
                            <textarea id="description"
                                      name="description"
                                      rows="5"
                                      cols="80"
                                      class="js-editor-enabled">
                                      {{old('description')}}
                           </textarea>

                        </div>




                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit" value="1" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
