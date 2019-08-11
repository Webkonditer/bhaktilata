<div class="modal-body">
  <form action="{{ route('simple.form.store', 'video') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="formCode" value="video" />
    <div class="form-group ">
      <label for="video_name">
        Имя <span>*</span>:
      </label>
      <input type="text" class="form-control" id="video_name" name="name" placeholder="Ваше имя" value="" />
    </div>

    <div class="form-group ">
      <label for="video_email">
        E-mail <span>*</span>:
      </label>
      <input type="email" class="form-control" id="video_email" name="email" placeholder="Ваш e-mail" value="" />
    </div>

    <div class="form-group ">
      <label for="video_skype">
        Skype :
      </label>
      <input type="text" class="form-control" id="video_skype" name="skype" placeholder="Ваш Skype, если есть" value="" />
    </div>

    <div class="form-group ">
      <label for="video_project">
        Какой проект Вы представляете <span>*</span>:
      </label>
      <textarea class="form-control" name="project" id="video_project" rows="3" placeholder="Мы готовы размещать видео только от зарекомендовавших себя проектов! "></textarea>
    </div>

    <div class="form-group ">
      <label for="video_description">
        Комментарий :
      </label>
      <textarea class="form-control" name="description" id="video_description" rows="7" placeholder="Ваш комментарий, если есть "></textarea>
    </div>

    <div class="form-group">
      <p class="help-block"><span style="font-size: 8px">Я согласен с политикой обработки персональных данных и пользовательским соглашением.</span></p>
    </div>
    <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
    <button type="submit" class="btn btn-theme-colored">Отправить</button>
  </form>
</div>
