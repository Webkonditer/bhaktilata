@extends('public.layout')

@section('content')
<section class="inner-header divider parallax hidden-xs" data-bg-img="/images/sp/photo3.jpg" style="background-image: url(/images/sp/photo3.jpg); background-position: 50% -45px;">
  <div class="container pt-80 pb-20">
    <!-- Section Content -->
    <div class="section-content pt-140">
      <div class="row">
        <div class="col-md-12">
          @include('public.navigation.crumbs-menu')
        </div>
      </div>
    </div>
  </div>
</section>

{{-----------------------------------------------------------------------}}
<section>
  <div class="container">
    <div class="content">
      <div class="section-title text-center">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <h1 class="mt-0">Видео и вебинары</h1>

            <div class="title-icon"><i class="fa fa-video-camera fa-3x"></i></div>
          </div>
        </div>
      </div>
    </div>

      {{------------------------}}
<section>
      <div class="row">
        <div class="hidden-sm hidden-lg hidden-md">
          <h5 class="widget-title line-bottom">Категории</h5>
          <div class="categories">
            <ul class="list angle-double-right list-border">
              @forelse ($profiles as $key=>$profile)
              @if($key == 1)
              <li class="active"><a data-toggle="tab" href="#{{ $profile['link'] }}">{{ $profile['cat'] }}</a></li>
              @else
              <li><a data-toggle="tab" href="#{{ $profile['link'] }}">{{ $profile['cat'] }}</a></li>
              @endif
              @empty
              <h2>Категории отсутствуют</h2>
              @endforelse
            </ul>
          </div>
        </div>
        {{----------------------}} {{--Боковое меню--}}
        <div class="col-md-3 col-sm-3 scrolltofixed-container hidden-xs">
          <div class="widget scrolltofixed z-index-0" style="z-index=98">
            <h5 class="widget-title line-bottom">Категории</h5>
            <div class="categories">
              <ul class="list angle-double-right list-border">
                @forelse ($profiles as $key=>$profile)
                @if($key == 1)
                <li class="active"><a data-toggle="tab" href="#{{ $profile['link'] }}">{{ $profile['cat'] }}</a></li>
                @else
                <li><a data-toggle="tab" href="#{{ $profile['link'] }}">{{ $profile['cat'] }}</a></li>
                @endif
                @empty
                <h2>Категории отсутствуют</h2>
                @endforelse
              </ul>
            </div>
            <br />
            <div class="text-center">
              <p>Хотите увидеть здесь свои вебинары?</p>
              <a class="btn btn-default btn-theme-colored btn-circled btn-lg" data-target="#myModal" data-toggle="modal">Подайте заявку!</a>
            </div>
          </div>
        </div>

        {{---------------------------------------------------}}

        <div aria-labelledby="myModalLabel" class="modal fade" id="myModal" role="dialog" tabindex="-1">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                      <span aria-hidden="true">&times;</span>
                    </button>
                <h4 class="modal-title" id="myModalLabel">Отправить заявку</h4>
              </div>
              <div class="modal-body">
                {{---------------------------------------------------}}
                @include('public.videos.form') {{---------------------------------------------------}}
              </div>
            </div>
          </div>
        </div>
        {{--------------------------------------------------------------------------------------}}
        <div class="tab-content" id="myTabContent" style="border:none">
          @forelse ($profiles as $key=>$profile)
          <?php $row = 1 ?>
          <div class="tab-pane fade @if($key == 1)in active @endif"  id="{{ $profile['link'] }}"> {{--------------------------}}
          <div class="col-md-9 col-sm-9">
            <div class="tab-content">
              <div class="tab-pane fade in active" id="tab1">
                <div class="row">
                  @forelse ($profile['data'] as $key=>$data)
                  <div class="col-md-6">
                    <article class="post clearfix mb-30 bg-lighter">
                      <div class="entry-header">
                        <iframe allowfullscreen="" height="240" src="{{$data->video_uri}}" width="360"></iframe>
                      </div>
                      <div class="entry-content">
                        <div class="entry-meta media mt-0 no-bg no-border">
                          <div class="media-body">
                            <h3 align="center" class="title">{{$data->title}}</h3>
                          </div>
                        </div>
                        <p>
                          <i class="fa fa-user mr-5 text-theme-colored"></i>
                          <strong>Автор: </strong>{{$data->autor}}
                        </p>
                        <p>
                          <i class="fa fa-pencil mr-5 text-theme-colored"></i>
                          <strong>Описание: </strong>{{$data->description}}
                        </p>
                        <p>
                          <i class="fa fa-edge mr-5 text-theme-colored"></i>
                          <strong>Сайт: </strong>
                          <a class="text-theme-colored" href="{{$data->site_link}}" target="_blank">
                                      {{$data->site_link}}
                                    </a>
                        </p>
                        <div class="clearfix">&nbsp;</div>
                      </div>
                    </article>
                  </div>
                  @if($row % 2 == 0)
                  <div style="clear:both"></div>
                  @endif
                  <?php $row++ ?>
                  @empty
                  <div></div>
                  @endforelse
                </div>
              </div>
            </div>
          </div>
          {{-----------------------------------}}
        </div>
        @empty
        <div></div>
        @endforelse

        {{--------------------------------------------------------------------------------------}}
      </div>

</section>
@endsection
