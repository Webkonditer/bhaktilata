@extends('public.layout')

@section('content')
    <section>
        <h1>{{ $page->title }}</h1>
        <div class="content">{!! $page->content !!}</div>
    </section>
@endsection