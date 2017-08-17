@extends('public.layout')

@section('content')
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ $page->image }}" style="background-image: url(&quot;{{ $page->image }}&quot;); background-position: 50% 62px;">
        <div class="container pt-60 pb-40">
            <!-- Section Content -->
            <div class="section-content pt-100">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title text-white">{{ $page->title }}</h3>
                        @include('public.navigation.crumbs-menu')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="content">{!! \App\Forms\FormsInsertion::process($page->content) !!}</div>
        </div>
    </section>
@endsection