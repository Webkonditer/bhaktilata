<?php

return [
    'title' => 'Связь с нами ',
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
            'placeholder' => 'Тема сообщения',
        ],
        'country' => [
            'type' => 'string',
            'caption' => 'Страна ',
            'required' => true,
            'placeholder' => 'Из какой Вы страны',
        ],
        'city' => [
            'type' => 'string',
            'caption' => 'Город ',
            'required' => true,
            'placeholder' => 'Из какого Вы города',
        ],
        'service' => [
            'type' => 'string',
            'caption' => 'Служение ',
            'required' => true,
            'placeholder' => 'Ваше служение в данной общине или регионе. Мы готовы работать только с лидерами',
        ],
        'size' => [
            'type' => 'string',
            'caption' => 'Размер общины ',
            'required' => true,
            'placeholder' => 'Укажите примерное количество человек на воскресной программе',
        ],
        'description' => [
            'type' => 'text',
            'caption' => 'Текст письма ',
            'required' => true,
            'rows' => 10,
            'placeholder' => 'Ваш текст ',
        ],
    ],
    'send_to' => 'makarovt@gmail.com',
    'send_to_client' => 'email',
    'submit' => 'Отправить',
    'parameters' => [
        'show_close_modal' => false,
    ],
];
