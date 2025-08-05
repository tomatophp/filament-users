<?php

return [
    'group' => 'ALC',
    'resource' => [
        'id' => 'ID',
        'single' => 'Utilizador',
        'email_verified_at' => 'Email Verificado em',
        'created_at' => 'Criado em',
        'updated_at' => 'Atualizado em',
        'verified' => 'Verificado',
        'unverified' => 'Não verificado',
        'name' => 'Nome',
        'email' => 'Email',
        'password' => 'Palavra-passe',
        'password_confirmation' => 'Confirmação de Palavra-passe',
        'roles' => 'Funções',
        'teams' => 'Equipes',
        'label' => 'Utilizadores',
        'title' => [
            'show' => 'Ver Utilizador',
            'delete' => 'Apagar Utilizador',
            'impersonate' => 'Simular Utilizador',
            'create' => 'Criar Utilizador',
            'edit' => 'Editar Utilizador',
            'list' => 'Utilizadores',
            'home' => 'Utilizadores',
        ],
        'notificaitons' => [
            'last' => [
                'title' => 'Erro',
                'body' => 'Não é possível apagar o último utilizador',
            ],
            'self' => [
                'title' => 'Erro',
                'body' => 'Não pode apagar-se a si mesmo',
            ],
        ],
        'avatar' => 'Avatar',
        'change_password' => 'Alterar Palavra-passe',
        'change_password_auto' => 'Palavra-passe alterada automaticamente',
        'change_password_success' => 'Palavra-passe alterada com sucesso',
        'change_password_auto_body' => 'Palavra-passe alterada automaticamente',
        'change_password_success_body' => 'Palavra-passe alterada com sucesso',
        'change_password_auto_body_placeholder' => 'Deixe em branco para gerar automaticamente',
        'change_password_success_body_placeholder' => 'Deixe em branco para gerar automaticamente',
    ],
    'bulk' => [
        'teams' => 'Atualizar Equipes',
        'roles' => 'Atualizar Funções',
    ],
    'team' => [
        'title' => 'Equipes',
        'single' => 'Equipe',
        'columns' => [
            'avatar' => 'Avatar',
            'name' => 'Nome',
            'owner' => 'Proprietário',
            'personal_team' => 'Equipe Pessoal',
        ],
    ],
    'banner' => [
        'impersonating' => 'Simulando',
        'leave' => 'Sair da Simulação',
    ],
];
