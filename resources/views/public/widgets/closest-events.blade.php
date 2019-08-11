<?php
/**
 * @var \App\Domain\Courses\CourseEvent[] $events
 */
?>
<div class="latest-news">
    <h3 class="widget-title line-bottom">Ближайшие <a href="{{ route('courses.course-schedule') }}" class="text-theme-colored">курсы:</a></h3>
    <div class="bxslider bx-nav-top" data-count="4">
        @foreach($events as $event)
            <div class="event media mt-0 mb-20 no-bg no-border">
                <div class="event-date media-left text-center flip bg-theme-colored p-15 pt-20">
                    <ul>
                        <li class="font-14 text-white font-weight-600 border-bottom pb-10">{{ app('App\Locale\Date')->shortMonthName(date ('m', strtotime($event->beginning_date))) }},</li>
                        <li class="font-15 text-white font-weight-600 pb-10">{{ date ('Y', strtotime($event->beginning_date)) }}</li>
                    </ul>
                </div>
                <div class="media-body pl-20">
                    <div class="event-content pull-left flip">
                        <h4 class="event-title media-heading font-weight-400 mb-0"><a href="{{ $event->course_link }}">{{ $event->courselist->course }}</a></h4>
                        <span class="inline-block text-gray-darkgray mr-10 font-14"><i class="fa fa-calendar mr-5 text-theme-colored"></i>
                            @if(true)
                                {{ date ('d', strtotime($event->beginning_date)) }}
                                <span class="text-lowercase">{{ app('App\Locale\Date')->shortMonthName(date ('m', strtotime($event->beginning_date))) }}.</span>
                                @if ($event->expiration_date)
                                    -
                                    {{ date ('d', strtotime($event->expiration_date)) }}
                                    <span class="text-lowercase">{{ app('App\Locale\Date')->shortMonthName(date ('m', strtotime($event->expiration_date))) }}.</span>
                                    {{ date ('Y', strtotime($event->expiration_date)) }}
                                @else
                                    {{ date ('Y', strtotime($event->beginning_date)) }}
                                @endif
                            @else
                                Уточняются
                            @endif
                        </span>
                        <span class="text-gray-darkgray font-14"><i class="fa fa-map-marker mr-5"></i> {{ $event->city }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-center"><a class="text-theme-colored font-weight-600 inline-block mt-15" href="{{ route('courses.course-schedule') }}">Смотреть подробнее...</a></div>
</div>
