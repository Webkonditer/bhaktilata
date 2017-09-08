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
            <!-- form start -->
                <form role="form" name="edit" action="{{ route('admin.contact.store', ['contact' => $contact]) }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="checkbox">
                                <label for="published">
                                    <input type="checkbox"
                                           id="published"
                                           name="edit[published]"
                                           {{ $contact->isPublished() ? 'checked="checked"' : '' }}
                                    /> Отображается на сайте
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sort">Порядок вывода</label>
                            <input type="text"
                                   name="edit[sort]"
                                   class="form-control"
                                   id="sort"
                                   value="{{$contact->sort}}"
                            />
                        </div>
                        <div class="form-group">
                            <label for="section">Раздел</label>
                            <select name="edit[section]" id="section" class="form-control">
                                <option value="">Не указан</option>
                                @foreach($categories as $categoryId => $categoryTitle)
                                    <option value="{{$categoryId}}" {{$categoryId == $contact->section ? 'selected' : ''}}>{{$categoryTitle}}</option>
                                @endforeach;
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="place">Проект/регион/город</label>
                            <input type="text"
                                   name="edit[place]"
                                   class="form-control"
                                   id="place"
                                   value="{{$contact->place}}"
                            />
                        </div>
                        <div class="form-group">
                            <label for="name">Имя</label>
                            <input type="text"
                                   name="edit[name]"
                                   class="form-control"
                                   id="name"
                                   value="{{$contact->name}}"
                            />
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text"
                                   name="edit[email]"
                                   class="form-control"
                                   id="email"
                                   value="{{$contact->email}}"
                            />
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="edit[submit]" value="1" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection