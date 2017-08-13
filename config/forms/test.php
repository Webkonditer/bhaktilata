<?php

return [
    'title' => 'Тестовая форма',
    'fields' => [
        'name' => [
            'type' => 'string',
            'caption' => 'Тестовое поле',
            'required' => true,
        ],
        'email' => [
            'type' => 'email',
            'caption' => 'E-mail',
            'required' => true,
        ],
        'description' => [
            'type' => 'text',
            'caption' => 'Описание',
            'required' => true,
            'rows' => 3,
        ],
    ],
    'send_to' => 'Deceased.Ag@yandex.ru',
    'send_to_client' => 'email',
    'submit' => 'Отправить',
    'parameters' => [
        'show_close_modal' => true,
    ],
];
