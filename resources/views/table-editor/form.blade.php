<form role="form" name="edit" action="{{ $form->action() }}" method="{{ $form->method() }}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="box-body">
        @foreach($form->fields() as $field)
            {!! $field->render() !!}
        @endforeach
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <button type="submit" name="edit[submit]" value="1" class="btn btn-primary">Сохранить</button>
    </div>
</form>