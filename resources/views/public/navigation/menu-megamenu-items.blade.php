<?php $link = \Menu::get('main')->{$linkNickname} ?>
<li>
    @if (!empty($inner))
        <h6 class="pl-10"><strong>{{ $link->title }}</strong></h6>
    @else
        <h5 class="pl-10"><strong>{{ $link->title }}</strong></h5>
    @endif
</li>
@foreach ($link->children() as $child)
    @if ($child->hasChildren())
        @include('public.navigation.menu-megamenu-items', ['linkNickname' => $child->nickname, 'inner' => true])
    @else
        <li><a href="{{$child->url(0)}}">{{ $child->title }}</a></li>
    @endif
@endforeach