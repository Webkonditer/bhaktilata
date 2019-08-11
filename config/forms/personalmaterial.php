<?php

return [
    'title' => 'Отправить заявку ',
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
       'author' => [
            'type' => 'string',
            'caption' => 'Автор ',
            'required' => true,
            'placeholder' => 'Автор материалов ',
        ],
        'descr' => [
            'type' => 'text',
            'caption' => 'Описание ',
            'rows' => 3,
            'required' => true,
            'placeholder' => 'Описание материалов для сайта ',
        ],
         'department' => [
            'type' => 'string',
            'caption' => 'Раздел ',
            'required' => true,
            'placeholder' => 'В какой раздел добавить материалы ',
        ],
        'description' => [
            'type' => 'text',
            'caption' => 'Комментарий ',
            'required' => false,
            'rows' => 5,
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
