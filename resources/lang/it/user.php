<?php

return [
    'group' => 'Configurazione',
    'resource' => [
        'id' => 'ID',
        'single' => 'Utente',
        'email_verified_at' => 'Email Verificata',
        'created_at' => 'Creato il',
        'updated_at' => 'Aggiornato il',
        'verified' => 'Verificato',
        'unverified' => 'Non Verificato',
        'name' => 'Nome',
        'email' => 'Email',
        'password' => 'Password',
        'password_confirmation' => 'Conferma Password',
        'roles' => 'Ruoli',
        'teams' => 'Teams',
        'label' => 'Utenti',
        'title' => [
            'show' => 'Visualizza Utente',
            'delete' => 'Elimina Utente',
            'impersonate' => 'Impersonifica Utente',
            'create' => 'crea Utente',
            'edit' => 'Modifica Utente',
            'list' => 'Utenti',
            'home' => 'Utenti',
        ],
        'notificaitons' => [
            'last' => [
                'title' => 'Errore',
                'body' => "Non puoi eliminare l'ultimo utente",
            ],
            'self' => [
                'title' => 'Errore',
                'body' => 'Non puoi eliminare te stesso',
            ],
        ],
        'avatar' => 'Avatar',
        'change_password' => 'Cambia Password',
        'change_password_auto' => 'Password cambiata automaticamente',
        'change_password_success' => 'Password cambiata con successo',
        'change_password_auto_body' => 'Password cambiata automaticamente',
        'change_password_success_body' => 'Password cambiata con successo',
        'change_password_auto_body_placeholder' => 'Lasciare vuoto per generare automaticamente',
        'change_password_success_body_placeholder' => 'Lasciare vuoto per generare automaticamente',
    ],
    'bulk' => [
        'teams' => 'Aggiorna Team',
        'roles' => 'Aggiorna Ruoli',
    ],
    'team' => [
        'title' => 'Team',
        'single' => 'Team',
        'columns' => [
            'avatar' => 'Avatar',
            'name' => 'Nome',
            'owner' => 'Owner',
            'personal_team' => 'Team Personale',
        ],
    ],
    'banner' => [
        'impersonating' => 'Impersonando',
        'leave' => 'Lasciare l\'Impersonazione',
    ],
];
