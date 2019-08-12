@extends('public.layout')

@section('content')
    <section class="inner-header divider parallax hidden-xs layer-overlay overlay-dark-5" data-bg-img="http://placehold.it/1920x1080" style="background-image: url(&quot;http://placehold.it/1920x1080&quot;); background-position: 50% 62px;">
        <div class="container pt-60 pb-40">
            <!-- Section Content -->
            <div class="section-content pt-100">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title text-white">Сообщение отправлено</h1>
                        @include('public.navigation.crumbs-menu')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <p>Ваше сообщение успешно отправлено и мы свяжемся с Вами в ближайшее время.</p>
            <p>Спасибо за обращение!</p>
        </div>
    </section>
@endsection