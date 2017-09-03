<?php
/**
 * @var \Illuminate\Support\Collection[] $contacts
 */
?>
@extends('public.layout')

@section('content')
    <section class="inner-header divider parallax" data-bg-img="" style="background-image: url(&quot;&quot;); background-position: 50% 62px;">
        <div class="container pt-80 pb-20">
            <!-- Section Content -->
            <div class="section-content pt-140">
                <div class="row">
                    <div class="col-md-12">
                        @include('public.navigation.crumbs-menu')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="content">
                <div class="section-title text-center">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <h1 class="mt-0">Связаться с...</h1>

                            <div class="title-icon"><i class="fa fa-user-plus fa-3x"></i></div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default col-md-12" id="part1">
                    <div class="panel-body leaders">
                        <div class="panel-group toggle transparent">
                            @if (!$contacts[1]->isEmpty())
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title"><a data-toggle="collapse" href="#toggle11"><span class="open-sub"></span>Ответственными за образование в регионах и проектах</a></div>
                                    </div>

                                    <div class="panel-collapse collapse" id="toggle11">
                                        <div class="panel-body">
                                            <div class="col-md-8 col-md-offset-2">
                                                <table class="table table-striped table-bordered table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <th>Регион или проект</th>
                                                        <th>Имя ответственного</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($contacts[1] as $contact)
                                                            <tr>
                                                                <th scope="row">{{ $contact->place }}</th>
                                                                <td><a data-toggle="modal" href="#leader-contact-form">{{ $contact->name }}</a></td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (!$contacts[2]->isEmpty())
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title"><a data-toggle="collapse" href="#toggle12"><span class="open-sub"></span>Авторизованными центрами Бхакти-шастр в России</a></div>
                                    </div>

                                    <div class="panel-collapse collapse" id="toggle12">
                                        <div class="panel-body">
                                            <p>Здесь представлены только российские центры, которые были авторизованы в международном ИСККОН.</p>

                                            <p>Узнать, как авторизовать Ваш центр можно <a class="text-theme-colored" href="/cooperation/become-a-teacher">здесь</a>.</p>

                                            <div class="col-md-8 col-md-offset-2">
                                                <table class="table table-striped table-bordered table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <th>Расположение центра</th>
                                                        <th>Ответственный за работу центра</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($contacts[2] as $contact)
                                                            <tr>
                                                                <th scope="row">{{ $contact->place }}</th>
                                                                <td><a data-toggle="modal" data-contact-id="{{ $contact->id }}" href="#leader-contact-form">{{ $contact->name }}</a></td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (!$contacts[3]->isEmpty())
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title"><a data-toggle="collapse" href="#toggle13"><span class="open-sub"></span>Преподавателями курса &quot;Ученик в ИСККОН&quot;</a></div>
                                    </div>

                                    <div class="panel-collapse collapse" id="toggle13">
                                        <div class="panel-body">
                                            <p>Если вы нашли устаревшую информацию в данной таблице, пожалуйста, напишите о ней действующему координатору отдела вайшнавского образования ЦОСКР.</p>
                                            &nbsp;

                                            <div class="col-md-8 col-md-offset-2">
                                                <table class="table table-striped table-bordered table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <th>Город</th>
                                                        <th>Преподаватель</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($contacts[3] as $contact)
                                                            <tr>
                                                                <th scope="row">{{ $contact->place }}</th>
                                                                <td><a data-toggle="modal" href="#leader-contact-form">{{ $contact->name }}</a></td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (!$contacts[4]->isEmpty())
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title"><a data-toggle="collapse" href="#toggle14"><span class="open-sub"></span>Преподавателями курса &quot;Подготовки учителей, часть 1&quot;</a></div>
                                    </div>

                                    <div class="panel-collapse collapse" id="toggle14">
                                        <div class="panel-body">
                                            <div class="col-md-8 col-md-offset-2">
                                                <table class="table table-striped table-bordered table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <th>Регион проживания</th>
                                                        <th>Преподаватель</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($contacts[4] as $contact)
                                                            <tr>
                                                                <th scope="row">{{ $contact->place }}</th>
                                                                <td><a data-toggle="modal" href="#leader-contact-form">{{ $contact->name }}</a></td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div aria-labelledby="leader-contact-form-label" class="modal fade" id="leader-contact-form" role="dialog" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header"><button aria-label="Закрыть" class="close" data-dismiss="leader-contact-form" type="button"><span aria-hidden="true">&times;</span></button>

                        <h4 class="modal-title" id="leader-contact-form-дabel">Форма для связи</h4>
                    </div>

                    <div class="modal-body">
                        {!! $form->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(function() {
            $('.leaders a[data-toggle="modal"]').click(function() {
                $('#contacts_leaders_contact_id').val($(this).attr('data-contact-id'));
            })

        })
    </script>
@endsection