@extends('public.layout')

@section('content')
    <section class="inner-header divider parallax hidden-xs" data-bg-img="{{ $page->image }}" style="background-image: url(&quot;{{ $page->image }}&quot;); background-position: 50% 62px;">
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
            <div class="content">{!! \App\Forms\FormsInsertion::process($page->content) !!}</div>
        </div>
    </section>
@endsection