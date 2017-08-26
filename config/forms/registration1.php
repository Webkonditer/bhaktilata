<?php

return [
    'title' => 'Заказ книг ',
    'fields' => [
        'name' => [
            'type' => 'string',
            'caption' => 'Имя ',
            'required' => true,
            'placeholder' => 'Ваши ФИО',
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
            'required' => true,
            'placeholder' => 'Ваш телефон ',
        ],
        'adress' => [
            'type' => 'string',
            'caption' => 'Ваш почтовый адрес ',
            'required' => true,
            'placeholder' => 'Индекс, страна, город, улица, дом, кв. ',
        ],
        'book' => [
            'type' => 'string',
            'caption' => 'Название книги ',
            'required' => true,
            'placeholder' => 'Название заказываемой книги',
        ],
        'quantity' => [
            'type' => 'string',
            'caption' => 'Количество книг ',
            'required' => true,
            'placeholder' => 'Количество книг',
        ],
        'description' => [
            'type' => 'text',
            'caption' => 'Комментарий ',
            'required' => true,
            'rows' => 2,
            'placeholder' => 'Ваш текст ',
        ],
    ],
    'send_to' => 'print.edu.coskr@mail.ru',
    'send_to_client' => 'email',
    'submit' => 'Отправить',
    'parameters' => [
        'show_close_modal' => false,
    ],
];
