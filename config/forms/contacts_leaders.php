<?php

return [
    'customClass' => \App\CustomForms\ContactLeaderForm::class,
    'title' => 'Связаться с ответственным',
    'fields' => [
        'name' => [
            'type' => 'string',
            'caption' => 'Имя ',
            'required' => true,
            'placeholder' => 'Ваше имя',
        ],
        'email' => [
            'type' => 'email',
            'caption' => 'E-mail ',
            'required' => true,
            'placeholder' => 'Ваш e-mail',
        ],
        'message' => [
            'type' => 'text',
            'caption' => 'Сообщение',
            'required' => true,
            'rows' => 5,
            'placeholder' => 'Ваш вопрос или обращение',
        ],
        'contact_id' => [
            'caption' => 'Получатель',
            'type' => 'hidden',
        ],
    ],
    'send_to' => 'Deceased.Ag@yandex.ru',
    'send_to_client' => 'email',
    'submit' => 'Отправить',
    'parameters' => [
        'show_close_modal' => true,
    ],
];
