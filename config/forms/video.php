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
        'skype' => [
            'type' => 'string',
            'caption' => 'Skype ',
            'required' => false,
            'placeholder' => 'Ваш Skype, если есть',
        ],
       'project' => [
            'type' => 'text',
            'caption' => 'Какой проект Вы представляете ',
            'rows' => 3,
            'required' => true,
            'placeholder' => 'Мы готовы размещать видео только от зарекомендовавших себя проектов! ',
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
