@extends('public.layout')

@section('content')
<section class="inner-header divider parallax" data-bg-img="/images/sp/photo3.jpg" style="background-image: url(/images/sp/photo3.jpg); background-position: 50% -45px;">
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
<section>
	<div class="container news-item">
		<div class="section-title text-center">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<h1 class="mt-0">Документы</h1>

					<div class="title-icon">
						<i class="fa fa-folder-open-o fa-3x"></i>
					</div>
				</div>
			</div>
		</div>

		
	   
		<ul class="nav nav-tabs boot-tabs" id="myTab">

			@forelse ($profiles as $key=>$profile)

				@if($key == 1)
					<li class="active"><a class="btn btn-default btn-theme-colored btn-circled" data-toggle="tab" href="#{{ $profile['link'] }}">{{ $profile['cat'] }}</a></li>
				@else
					<li><a class="btn btn-default btn-theme-colored btn-circled" data-toggle="tab" href="#{{ $profile['link'] }}">{{ $profile['cat'] }}</a></li>
				@endif
				@empty
					<h2>Документы отсутствуют</h2>
			@endforelse
		</ul>

    
		<div class="tab-content" id="myTabContent">
			@forelse ($profiles as $key=>$profile)
				<?php $row = 1 ?>

				<div class="tab-pane fade @if($key == 1)in active @endif" id="{{ $profile['link'] }}">

					@forelse ($profile['data'] as $key=>$data)

							<div  class="col-md-6">
								<h3><a class="faa-parent animated-hover" href="@if(substr($data->link, 0, 4) == 'http'){{$data->link}}@else{{asset('/storage/'.$data->link)}}@endif" target="_blank"><i class="fa fa-book faa-tada"></i> {{$data->title}}</a></h3>
								{!!$data->description!!}
							</div>
							@if($row % 2 == 0)<div style="clear:both"></div> @endif
							<?php $row++ ?>
						@empty
							<div></div>
					@endforelse
				</div>
				
				@empty
					<div></div>
			@endforelse
			<div style="clear:both"></div>
		</div>		
	</div>
</section>
@endsection
