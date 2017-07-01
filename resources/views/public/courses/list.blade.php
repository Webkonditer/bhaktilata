@extends('public.layout')

@section('content')
    <ul>
        @foreach($courses as $course)
            <li>{{ $course->title }}</li>
        @endforeach
    </ul>
@endsection