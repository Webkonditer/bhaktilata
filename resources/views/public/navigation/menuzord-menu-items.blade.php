@foreach($links as $link)
    <li class="{{$link->isActive ? 'active' : ''}}"><a href="{!! $link->url() !!}">{!! $link->title !!}</a>
        @if($link->hasChildren())
            <ul class="dropdown">
                @include('public.navigation.menuzord-menu-items', ['links' => $link->children()])
            </ul>
        @endif
    </li>
@endforeach
