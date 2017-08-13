<?php
/**
 * @var App\Forms\Form $form
 */
?>
<form action="{{ $form->getAction() }}" method="{{ $form->getMethod() }}">
    {{ csrf_field() }}
    <input type="hidden" name="formCode" value="{{ $form->getCode() }}" />
    @foreach($form->fields() as $field)
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
        <p class="help-block">Отправляя данную форму, даю согласие на обработку моих персональных данных в соответствии с <a class="text-info" href="https://bhaktilata.ru/docs/policy.pdf" target="_blank"> политикой в отношении обработки персональных данных</a> и <a class="text-info" href="https://bhaktilata.ru/docs/terms.pdf" target="_blank"> пользовательским соглашением.</a></p>
    </div>
    @if ($form->getParameter('show_close_modal'))
        <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
    @endif
    <button type="submit" class="btn btn-theme-colored">{{ $form->getSubmitText() }}</button>
</form>
