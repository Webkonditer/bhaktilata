<?php $linkCount = $links->count() - 1 ?>
@foreach($links as $index => $link)
    <li class="{{ $index == $linkCount ? 'active' : ''}}">
        @if ($index != $linkCount)
            <a href="{!! $link->url() !!}">
        @endif
            {!! $link->title !!}
        @if ($index != $linkCount)
            </a>
        @endif
    </li>
@endforeach
