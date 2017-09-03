<?php
/**
 * @var App\Forms\Form $form
 */
?>
<form action="{{ $form->getAction() }}" method="{{ $form->getMethod() }}">
    {{ csrf_field() }}
    <input type="hidden" name="formCode" value="{{ $form->getCode() }}" />
    @foreach($form->visibleFields() as $field)
        <div class="form-group {{$field->hasErrors() ? 'has-error' : ''}}">
            <label for="{{ $field->getName() }}">
                {{ $field->getCaption() }}{!! $field->isRequired() ? '<span>*</span>' : ''!!}:
            </label>
            {!! $field->render() !!}
            @if ($field->hasErrors())
                <span class="help-block">{{ implode('<br/>', $field->getErrors()) }}</span>
            @endif
        </div>

    @endforeach
    <div class="form-group">
        <p class="help-block"><span style="font-size: 8px">Я согласен с политикой обработки персональных данных и пользовательским соглашением.</span></p>
    </div>
    @if ($form->getParameter('show_close_modal'))
        <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
    @endif
    @foreach($form->hiddenFields() as $field)
        {!! $field->render() !!}
    @endforeach
    <button type="submit" class="btn btn-theme-colored">{{ $form->getSubmitText() }}</button>
</form>
