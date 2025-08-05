<?php

return [
    'group' => 'ALC',
    'resource' => [
        'id' => 'ID',
        'single' => 'Gebruiker',
        'email_verified_at' => 'Email Geverifieerd',
        'created_at' => 'Aangemaakt Op',
        'updated_at' => 'Bijgewerkt Op',
        'verified' => 'Geverifieerd',
        'unverified' => 'Niet geverifieerd',
        'name' => 'Naam',
        'email' => 'Email',
        'password' => 'Wachtwoord',
        'password_confirmation' => 'Wachtwoord Bevestigen',
        'roles' => 'Rollen',
        'teams' => 'Teams',
        'label' => 'Gebruikers',
        'title' => [
            'show' => 'Toon Gebruiker',
            'delete' => 'Verwijder Gebruiker',
            'impersonate' => 'Impersonate Gebruiker',
            'create' => 'Maak Gebruiker',
            'edit' => 'Bewerk Gebruiker',
            'list' => 'Gebruikers',
            'home' => 'Gebruikers',
        ],
        'notificaitons' => [
            'last' => [
                'title' => 'Fout',
                'body' => 'Je kunt de laatste gebruiker niet verwijderen',
            ],
            'self' => [
                'title' => 'Fout',
                'body' => 'Je kunt jezelf niet verwijderen',
            ],
        ],
        'avatar' => 'Avatar',
        'change_password' => 'Wachtwoord wijzigen',
        'change_password_auto' => 'Wachtwoord is automatisch gewijzigd',
        'change_password_success' => 'Wachtwoord is succesvol gewijzigd',
        'change_password_auto_body' => 'Wachtwoord is automatisch gewijzigd',
        'change_password_success_body' => 'Wachtwoord is succesvol gewijzigd',
        'change_password_auto_body_placeholder' => 'Laat leeg voor automatisch genereren',
        'change_password_success_body_placeholder' => 'Laat leeg voor automatisch genereren',
    ],
    'bulk' => [
        'teams' => 'Teams bijwerken',
        'roles' => 'Rollen bijwerken',
    ],
    'team' => [
        'title' => 'Teams',
        'single' => 'Team',
        'columns' => [
            'avatar' => 'Avatar',
            'name' => 'Name',
            'owner' => 'Owner',
            'personal_team' => 'Persoonlijk Team',
        ],
    ],
    'banner' => [
        'impersonating' => 'Impersonate',
        'leave' => 'Leave Impersonation',
    ],
];
