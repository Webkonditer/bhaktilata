@extends('public.layout')

@section('content')
    <section>
        <h1>{{ $course->title }}</h1>
        <div class="content">{{ $course->description }}</div>
    </section>
@endsection