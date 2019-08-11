


<?php
/**
 * @var \App\Pages\Page $page
 */
?>
@extends('admin.layout')

@section('crumbs')<li class="active">Редактирование документа</li>@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">

                <h2>Редактирование данных документа</h2>
                <form role="form" name="edit" enctype="multipart/form-data"
                action="{{ route('admin.documentation.update', $documentation)}}" method="POST">

                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{$error}}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="box-body">

                      <div class="form-group">
                          <label for="exampleInputFile">Загрузите измененный файл документа</label>
                          <input type="file" name="document" id="exampleInputFile">
                      </div>

                      <div class="form-group">
                          <label for="title">или укажите новый адрес документа в Интернете</label>
                          <input type="text"
                                 name="document"
                                 class="form-control"
                                 value="@if(old('document')){{old('document')}} @else{{$documentation->link}} @endif"
                                 placeholder="http://example.site/any.doc"
                          />
                      </div>

                        <div class="form-group">
                            <label for="title">Категория</label>
                            <select class="form-control" name="category">
                              @foreach ($categories as $category_list)
                                <option value="{{$category_list}}"
                                @if ($category_list == old('new_category'))
                                  selected = "selected"
                                @elseif ($category_list == $documentation->category)
                                  selected = "selected"
                                @endif
                                >
                                  {{$category_list}}
                                </option>
                              @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">Новая категория</label>
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
                                   value="@if(old('title')){{old('title')}} @else{{$documentation->title}} @endif"
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
                                      @if(old('description')){{old('description')}} @else{{$documentation->description}} @endif
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
