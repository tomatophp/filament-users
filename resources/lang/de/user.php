<?php

return [
    'group' => 'Einstellungen',
    'resource' => [
        'id' => 'ID',
        'single' => 'Benutzer',
        'email_verified_at' => 'E-Mail verifiziert',
        'created_at' => 'Erstellt am',
        'updated_at' => 'Aktualisiert am',
        'verified' => 'Verifiziert',
        'unverified' => 'Nicht verifiziert',
        'name' => 'Name',
        'email' => 'E-Mail',
        'password' => 'Passwort',
        'password_confirmation' => 'Passwort bestätigen',
        'roles' => 'Rollen',
        'teams' => 'Teams',
        'label' => 'Benutzer',
        'title' => [
            'show' => 'Benutzer anzeigen',
            'delete' => 'Benutzer löschen',
            'impersonate' => 'Benutzer imitieren',
            'create' => 'Benutzer erstellen',
            'edit' => 'Benutzer bearbeiten',
            'list' => 'Benutzer',
            'home' => 'Benutzer',
        ],
        'notificaitons' => [
            'last' => [
                'title' => 'Fehler',
                'body' => 'Sie können den letzten Benutzer nicht löschen',
            ],
            'self' => [
                'title' => 'Fehler',
                'body' => 'Sie können sich nicht selbst löschen',
            ],
        ],
        'avatar' => 'Avatar',
        'change_password' => 'Passwort ändern',
        'change_password_auto' => 'Passwort automatisch geändert',
        'change_password_success' => 'Passwort erfolgreich geändert',
        'change_password_auto_body' => 'Passwort automatisch geändert',
        'change_password_success_body' => 'Passwort erfolgreich geändert',
        'change_password_auto_body_placeholder' => 'Leer lassen, um automatisch zu generieren',
        'change_password_success_body_placeholder' => 'Leer lassen, um automatisch zu generieren',
    ],
    'bulk' => [
        'teams' => 'Teams aktualisieren',
        'roles' => 'Rollen aktualisieren',
    ],
    'team' => [
        'title' => 'Teams',
        'single' => 'Team',
        'columns' => [
            'avatar' => 'Avatar',
            'name' => 'Name',
            'owner' => 'Owner',
            'personal_team' => 'Persönliches Team',
        ],
    ],
    'banner' => [
        'impersonating' => 'Imitieren',
        'leave' => 'Imitation beenden',
    ],
];
