<?php

return [
    'group' => 'ALC',
    'resource' => [
        'id' => 'ID',
        'single' => 'Пользователь',
        'email_verified_at' => 'Email подтвержден',
        'created_at' => 'Создан',
        'updated_at' => 'Изменен',
        'verified' => 'Верифицирован',
        'unverified' => 'Не верифицирован',
        'name' => 'Имя',
        'email' => 'Email',
        'password' => 'Пароль',
        'password_confirmation' => 'Подтверждение пароля',
        'roles' => 'Роли',
        'teams' => 'Команды',
        'label' => 'Пользователи',
        'title' => [
            'show' => 'Показать Пользователя',
            'delete' => 'Удалить Пользователя',
            'impersonate' => 'Войти как Пользователь',
            'create' => 'Создать',
            'edit' => 'Редактировать',
            'list' => 'Пользователи',
            'home' => 'Пользователи',
        ],
        'notificaitons' => [
            'last' => [
                'title' => 'Ошибка',
                'body' => 'Вы не можете удалить последнего пользователя',
            ],
            'self' => [
                'title' => 'Ошибка',
                'body' => 'Вы не можете удалить себя',
            ],
        ],
        'avatar' => 'Аватар',
        'change_password' => 'Изменить пароль',
        'change_password_auto' => 'Пароль изменен автоматически',
        'change_password_success' => 'Пароль изменен успешно',
        'change_password_auto_body' => 'Пароль изменен автоматически',
        'change_password_success_body' => 'Пароль изменен успешно',
        'change_password_auto_body_placeholder' => 'Оставить пустым для автоматического генерации',
        'change_password_success_body_placeholder' => 'Оставить пустым для автоматического генерации',
    ],
    'bulk' => [
        'teams' => 'Обновить команды',
        'roles' => 'Обновить роли',
    ],
    'team' => [
        'title' => 'Команды',
        'single' => 'Команда',
        'columns' => [
            'avatar' => 'Аватар',
            'name' => 'Имя',
            'owner' => 'Владелец',
            'personal_team' => 'Личная команда',
        ],
    ],
    'banner' => [
        'impersonating' => 'Войти как',
        'leave' => 'Выйти из режима',
    ],
];
