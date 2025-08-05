<?php

return [
    'group' => 'ALC',
    'resource' => [
        'id' => 'ID',
        'single' => 'Usuário',
        'email_verified_at' => 'Email Verificado',
        'created_at' => 'Criado em',
        'updated_at' => 'Atualizado em',
        'verified' => 'Verificado',
        'unverified' => 'Não verificado',
        'name' => 'Nome',
        'email' => 'Email',
        'password' => 'Senha',
        'password_confirmation' => 'Confirmação de Senha',
        'roles' => 'Funções',
        'teams' => 'Equipes',
        'label' => 'Usuários',
        'title' => [
            'show' => 'Mostrar Usuário',
            'delete' => 'Deletar Usuário',
            'impersonate' => 'Despersonificar Usuário',
            'create' => 'Criar Usuário',
            'edit' => 'Editar Usuário',
            'list' => 'Usuários',
            'home' => 'Usuários',
        ],
        'notificaitons' => [
            'last' => [
                'title' => 'Erro',
                'body' => 'Você não pode deletar o último usuário',
            ],
            'self' => [
                'title' => 'Erro',
                'body' => 'Você não pode deletar a si mesmo',
            ],
        ],
        'avatar' => 'Avatar',
        'change_password' => 'Alterar Senha',
        'change_password_auto' => 'Senha alterada automaticamente',
        'change_password_success' => 'Senha alterada com sucesso',
        'change_password_auto_body' => 'Senha alterada automaticamente',
        'change_password_success_body' => 'Senha alterada com sucesso',
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
        'impersonating' => 'Despersonificando',
        'leave' => 'Sair da Despersonificação',
    ],
];
