<?php

return [
    'title' => 'Регистрация на Ученик в ИСККОН',
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
        'phone' => [
            'type' => 'string',
            'caption' => 'Телефон ',
            'required' => false,
            'placeholder' => 'Ваш телефон ',
        ],
        'skype' => [
            'type' => 'string',
            'caption' => 'Skype ',
            'required' => true,
            'placeholder' => 'Ваш Skype, если есть ',
        ],
        'city' => [
            'type' => 'string',
            'caption' => 'Город ',
            'required' => true,
            'placeholder' => 'Ваш город проживания ',
        ],
        'require' => [
            'type' => 'string',
            'caption' => 'Требования к студентам ',
            'required' => true,
            'placeholder' => 'Подходите ли Вы под требования к студентам курса?',
        ],
        'description' => [
            'type' => 'text',
            'caption' => 'Комментарий ',
            'required' => false,
            'rows' => 5,
            'placeholder' => 'Ваш комментарий, если есть ',
        ],
    ],
    'send_to' => 'bhaktisastri@mail.ru',
    'send_to_client' => 'email',
    'submit' => 'Отправить',
    'parameters' => [
        'show_close_modal' => true,
    ],
];
