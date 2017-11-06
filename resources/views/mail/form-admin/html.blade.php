<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новое обращение с сайта</title>
</head>
<body>
    <p>Новое обращение с сайта {{ $form->getTitle() }}</p>
    <table>
        @foreach ($form->fields() as $fieldCode => $field)
            <tr>
                <td>{{ $field->getCaption() }}:</td>
                <td>{{ $field->getValue() }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>