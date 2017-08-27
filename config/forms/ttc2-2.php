<?php

return [
    'title' => 'Регистрация на КПУ2-углубление',
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
        'ttc1' => [
            'type' => 'string',
            'caption' => 'Прохождение КПУ1',
            'required' => true,
            'placeholder' => 'У кого и когда Вы проходили КПУ1?',
        ],
        'exp' => [
            'type' => 'string',
            'caption' => 'Ваш опыт',
            'required' => true,
            'placeholder' => 'Ваш опыт в преподавании или ведении групп духовного общения',
        ],
        'service' => [
            'type' => 'string',
            'caption' => 'Ваше служение',
            'required' => true,
            'placeholder' => 'Укажите Ваше текущее служение',
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
