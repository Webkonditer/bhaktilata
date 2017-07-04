<?php
/**
 * @var \App\Courses\Course $course
 */
?>
@extends('public.layout')

@section('content')
    <ul>
        @foreach($courses as $course)
            <li><a href="{{ route('courses.course', [
                'course_category_slug' => $course->category->slug,
                'course_slug' => $course->slug,
            ]) }}">{{ $course->title }}</a></li>
        @endforeach
    </ul>
@endsection