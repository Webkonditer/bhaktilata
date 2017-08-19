@foreach($links as $link)
    <li class="{{$link->isActive ? 'active' : ''}} {{$link->megamenu ? 'with-mega' : ''}}">
        <a {!! $link->url() ? 'href="' . $link->url() . '"' : '' !!}>{!! $link->title !!}</a>
        @if($link->hasChildren())
            @if ($link->megamenu)
                <div class="megamenu">
                    <div class="megamenu-row">
                        <div class="col3">
                            <ul class="list-unstyled list-dashed">
                                @include('public.navigation.menu-megamenu-items', ['linkNickname' => 'projects_non_confessional'])
                                @include('public.navigation.menu-megamenu-items', ['linkNickname' => 'projects_mentoring'])
                            </ul>
                        </div>
                        <div class="col3">
                            <ul class="list-unstyled list-dashed">
                                @include('public.navigation.menu-megamenu-items', ['linkNickname' => 'projects_philosophy_and_practice'])
                            </ul>
                        </div>
                        <div class="col3">
                            <ul class="list-unstyled list-dashed">
                                @include('public.navigation.menu-megamenu-items', ['linkNickname' => 'projects_serving_in_mission'])
                            </ul>
                        </div>
                        <div class="col3">
                            <ul class="list-unstyled list-dashed">
                                @include('public.navigation.menu-megamenu-items', ['linkNickname' => 'projects_simple_life'])
                                @include('public.navigation.menu-megamenu-items', ['linkNickname' => 'projects_creating_commons'])
                                @include('public.navigation.menu-megamenu-items', ['linkNickname' => 'projects_another_projects'])
                            </ul>
                        </div>
                    </div>
                </div>
            @else
            <ul class="dropdown">
                @include('public.navigation.menuzord-menu-items', ['links' => $link->children()])
            </ul>
            @endif
        @endif
    </li>
@endforeach
