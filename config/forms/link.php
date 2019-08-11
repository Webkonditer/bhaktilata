<?php

return [
    'title' => 'Отправить заявку ',
    'fields' => [
        'adres' => [
            'type' => 'string',
            'caption' => 'Адрес ',
            'required' => true,
            'placeholder' => 'Адрес ссылки',
        ],
        'depart' => [
            'type' => 'string',
            'caption' => 'Раздел ',
            'required' => true,
            'placeholder' => 'В какой раздел добавить ссылку',
        ],
       'descr' => [
            'type' => 'text',
            'caption' => 'Описание ',
            'rows' => 3,
            'required' => true,
            'placeholder' => 'Описание для сайта ',
        ],
       'description' => [
            'type' => 'text',
            'caption' => 'Комментарий ',
            'required' => false,
            'rows' => 7,
            'placeholder' => 'Ваш комментарий, если есть ',
        ],
    ],
    'send_to' => 'makarovt@gmail.com',
    'send_to_client' => 'email',
    'submit' => 'Отправить',
    'parameters' => [
        'show_close_modal' => true,
    ],
];
