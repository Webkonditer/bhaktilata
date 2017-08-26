<?php

return [
    'title' => 'Сообщить об ошибке ',
    'fields' => [
        'description' => [
            'type' => 'text',
            'caption' => 'Текст ',
            'required' => true,
            'rows' => 7,
            'placeholder' => 'Ваш текст ',
        ],
    ],
    'send_to' => 'makarovt@gmail.com',
    'send_to_client' => 'email',
    'submit' => 'Отправить',
    'parameters' => [
        'show_close_modal' => true,
    ],
];
