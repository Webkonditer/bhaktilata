<?php

return [
    'title' => 'Регистрация на Саманья-бхакти-шастры',
    'fields' => [
        'name' => [
            'type' => 'string',
            'caption' => 'Имя ',
            'required' => false,
            'placeholder' => 'Ваше имя',
        ],
        'email' => [
            'type' => 'email',
            'caption' => 'E-mail ',
            'required' => false,
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
            'required' => false,
            'placeholder' => 'Ваш Skype, если есть ',
        ],
        'city' => [
            'type' => 'string',
            'caption' => 'Город ',
            'required' => false,
            'placeholder' => 'Ваш город проживания ',
        ],
        'require' => [
            'type' => 'string',
            'caption' => 'Требования к студентам ',
            'required' => false,
            'placeholder' => 'Подходите ли Вы под требования к студентам курса?',
        ],
        'time' => [
            'type' => 'string',
            'caption' => 'Когда вы НЕ можете... ',
            'required' => false,
            'placeholder' => 'Укажите время по Мск, когда Вы точно не сможете быть на встречах с куратором ',
        ],
        'description' => [
            'type' => 'text',
            'caption' => 'Комментарий ',
            'required' => false,
            'rows' => 5,
            'placeholder' => 'Ваш комментарий, если есть ',
        ],
    ],
    'send_to' => 'info@bhaktilata.ru',
    'send_to_client' => 'email',
    'submit' => 'Отправить',
    'parameters' => [
        'show_close_modal' => true,
    ],
];
