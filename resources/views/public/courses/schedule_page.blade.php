

<ul class="nav nav-tabs boot-tabs" id="myTab">
  @forelse($courselist->schedules as $schedule)
    <li>
      <h4><a class="btn btn-border btn-theme-colored btn-lg" data-toggle="tab" href="#profile{{ $schedule->id }}">{{ $schedule->city }}, {{ date ('d.m.Y', strtotime($schedule->beginning_date)) }} - {{ date ('d.m.Y', strtotime($schedule->expiration_date)) }}</a></h4>
    </li>
  @empty
    <h4 align="center">Нет доступных курсов.</h4>
  @endforelse
</ul>

<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade in active" id="home">
    <p align="center"><strong>Выберите, пожалуйста, подходящий вам курс.</strong></p>
    &nbsp;

    <p align="center"><strong><a class="text-theme-colored smooth-scroll-to-target" href="#invite">Или пригласите нашего преподавателя в свою общину/регион</a></strong></p>
  </div>

  @foreach($courselist->schedules as $schedule)
    <div class="tab-pane fade" id="profile{{ $schedule->id }}">
    <div class="row">
      <div class="col-md-4">
        <div class="job-overview">
          <dl class="dl-horizontal">
            <dt><i class="fa fa-map text-theme-colored mt-5 font-15"></i></dt>
            <dd>
              <h5 class="mt-0">Город:</h5>

              <p>{{ $schedule->city }}</p>
            </dd>
          </dl>

          <dl class="dl-horizontal">
            <dt><i class="fa fa-map-marker text-theme-colored mt-5 font-15"></i></dt>
            <dd>
              <h5 class="mt-0">Место:</h5>

              <p>{{ $schedule->place }}</p>
            </dd>
          </dl>

          <dl class="dl-horizontal">
            <dt><i class="fa fa-calendar text-theme-colored mt-5 font-15"></i></dt>
            <dd>
              <h5 class="mt-0">Даты:</h5>

              <p>{{ date ('d.m.Y', strtotime($schedule->beginning_date)) }} - {{ date ('d.m.Y', strtotime($schedule->expiration_date)) }}</p>
            </dd>
          </dl>

          <dl class="dl-horizontal">
            <dt><i class="fa fa-money text-theme-colored mt-5 font-15"></i></dt>
            <dd>
              <h5 class="mt-0">Стоимость:</h5>

              <p>{{ $schedule->cost }}</p>
            </dd>
          </dl>

          <dl class="dl-horizontal">
            <dt><i class="fa fa-home text-theme-colored mt-5 font-15"></i></dt>
            <dd>
              <h5 class="mt-0">Проживание:</h5>

              <p>{{ $schedule->accommodation }}</p>
            </dd>
          </dl>
        </div>
      </div>

      <div class="col-md-4">
        <div class="job-overview">
          <dl class="dl-horizontal">
            <dt><i class="fa fa-graduation-cap text-theme-colored mt-5 font-15"></i></dt>
            <dd>
              <h5 class="mt-0">Формат:</h5>

              <p>{{ $schedule->format }}</p>
            </dd>
          </dl>

          <dl class="dl-horizontal">
            <dt><i class="fa fa-pencil text-theme-colored mt-5 font-15"></i></dt>
            <dd>
              <h5 class="mt-0">Домашнее задание:</h5>

              <p>{{ $schedule->homework }}</p>
            </dd>
          </dl>

          <dl class="dl-horizontal">
            <dt><i class="fa fa-warning text-theme-colored mt-5 font-15"></i></dt>
            <dd>
              <h5 class="mt-0">Требования к студентам:</h5>

              <p>{{ $schedule->requirements_for_students }}</p>
            </dd>
          </dl>

          <dl class="dl-horizontal">
            <dt><i class="fa fa-envelope text-theme-colored mt-5 font-15"></i></dt>
            <dd>
              <h5 class="mt-0">По всем вопросам:</h5>

              <p>Имя: {{ json_decode($schedule->contacts, TRUE)['name'] }}</p>
              <p>Телефон: {{ json_decode($schedule->contacts, TRUE)['phone'] }}</p>
              <p>E-mail: {{ json_decode($schedule->contacts, TRUE)['mail'] }}</p>

            </dd>
          </dl>

          <dl class="dl-horizontal">
          </dl>
        </div>
      </div>

      <div class="col-md-4">
        <p><strong><i class="fa fa-user text-theme-colored mt-5 font-15"></i> Преподаватель:</strong></p>

        <p>&nbsp;</p>

        <div class="team-member">
          <div class="volunteer-thumb"><img alt="" class="img-fullwidth img-responsive" src="{{asset('/storage/'.$schedule->teacher_foto)}}" /></div>

          <div class="member-info">
            <div class="member-biography">
              <h3 class="text-white">{{ json_decode($schedule->teacher, TRUE)['name'] }}</h3>

              <h5 class="text-white">{{ json_decode($schedule->teacher, TRUE)['position'] }}</h5>
            </div>
          </div>
        </div>
        &nbsp;

        <div class="text-center"><br />
          @if ($schedule->is_opened)
            {{--<a class="btn btn-theme-colored btn-xl" data-target="#myModal2" data-toggle="modal">Зарегистрироваться!</a><br /> &nbsp;--}}
            <a class="btn btn-theme-colored btn-xl" href="{{ $schedule->reg_link }}" data-toggle="modal">Зарегистрироваться!</a><br /> &nbsp;
          @else
            <a class="btn btn-info btn-xl" data-toggle="modal">Регистрация недоступна</a><br /> &nbsp;
          @endif
        </div>
      </div>


    </div>
    &nbsp;

    <div class="job-overview">
      <dl class="dl-horizontal">
        <dt><i class="fa fa-sticky-note-o text-theme-colored mt-5 font-15"></i></dt>
        <dd>
          <h5 class="mt-0">Подробное описание:</h5>

          <div class="container col-md-12">
            {!! $schedule->description !!}
          </div>
        </dd>
      </dl>
      &nbsp;
      @if ($schedule->map_code)
        <dl class="dl-horizontal">
          <dt><i class="fa fa-flag text-theme-colored mt-5 font-15"></i></dt>
          <dd>
            <h5 class="mt-0">Место проведения на карте:</h5>
          </dd>
        </dl>
        <dl class="dl-horizontal">
          {!! $schedule->map_code !!}
        </dl>
      @endif

    </div>
  </div>
  @endforeach

  <div aria-labelledby="myModalLabel" class="modal fade" id="myModal2" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header"><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>

          <h4 class="modal-title" id="myModalLabel">Регистрация</h4>
      </div>
      <div class="modal-body">
        <form action="forms/ttc1" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="formCode" value="ttc1">
            <div class="form-group ">
            <label for="ttc1_name">
                Имя <span>*</span>:
            </label>
            <input type="text" class="form-control" id="ttc1_name" name="name" placeholder="Ваше имя" value="">
                    </div>

            <div class="form-group ">
            <label for="ttc1_email">
                E-mail <span>*</span>:
            </label>
            <input type="email" class="form-control" id="ttc1_email" name="email" placeholder="Ваш e-mail" value="">
                    </div>

            <div class="form-group ">
            <label for="ttc1_phone">
                Телефон :
            </label>
            <input type="text" class="form-control" id="ttc1_phone" name="phone" placeholder="Ваш телефон " value="">
                    </div>

            <div class="form-group ">
            <label for="ttc1_skype">
                Skype <span>*</span>:
            </label>
            <input type="text" class="form-control" id="ttc1_skype" name="skype" placeholder="Ваш Skype, если есть " value="">
                    </div>

            <div class="form-group ">
            <label for="ttc1_city">
                Город <span>*</span>:
            </label>
            <input type="text" class="form-control" id="ttc1_city" name="city" placeholder="Ваш город проживания " value="">
                    </div>

            <div class="form-group ">
            <label for="ttc1_require">
                Требования к студентам <span>*</span>:
            </label>
            <input type="text" class="form-control" id="ttc1_require" name="require" placeholder="Подходите ли Вы под требования к студентам курса?" value="">
                    </div>

            <div class="form-group ">
            <label for="ttc1_description">
                Комментарий :
            </label>
            <textarea class="form-control" name="description" id="ttc1_description" rows="5" placeholder="Ваш комментарий, если есть "></textarea>
                    </div>

        <div class="form-group">
        <p class="help-block"><span style="font-size: 8px">Я согласен с политикой обработки персональных данных и пользовательским соглашением.</span></p>
    </div>
            <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
            <button type="submit" class="btn btn-theme-colored">Отправить</button>
</form>

      </div>
    </div>
        </div>
      </div>
    </div>
  </div>

</div>
