Новое обращение с сайта {{ $form->getTitle() }}
@foreach ($form->fields() as $fieldCode => $field)
    {{ $field->getCaption() }}: {{ $field->getValue() }}
@endforeach
