<?php

return [
    'title' => 'Связь с нами',
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
        'skype' => [
            'type' => 'string',
            'caption' => 'Skype ',
            'required' => false,
            'placeholder' => 'Ваш Skype, если есть ',
        ],
        'topic' => [
            'type' => 'string',
            'caption' => 'Тема сообщения ',
            'required' => true,
            'placeholder' => 'Тема Вашего сообщения ',
        ],
        'description' => [
            'type' => 'text',
            'caption' => 'Текст ',
            'required' => true,
            'rows' => 10,
            'placeholder' => 'Ваш текст ',
        ],
    ],
    'send_to' => 'sekretariatbhaktilata@gmail.com',
    'send_to_client' => 'email',
    'submit' => 'Отправить',
    'parameters' => [
        'show_close_modal' => false,
    ],
];
