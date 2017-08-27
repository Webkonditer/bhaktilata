<?php $linkCount = $links->count() - 1 ?>
@foreach($links as $index => $link)
    <li class="{{ $index == $linkCount ? 'active' : ''}}"  style="font-size: 24px;">
        @if ($link->url() && $index != $linkCount)
            <a href="{!! $link->url() !!}">
        @endif
            {!! $link->title !!}
        @if ($link->url() && $index != $linkCount)
            </a>
        @endif
    </li>
@endforeach
