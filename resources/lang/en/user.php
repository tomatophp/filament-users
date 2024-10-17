<?php

return [
    'group' => 'Settings',
    'resource' => [
        'id' => 'ID',
        'single' => 'User',
        'email_verified_at' => 'Email Verified',
        'created_at' => 'Created At',
        'updated_at' => 'Updated At',
        'verified' => 'Verified',
        'unverified' => 'Unverified',
        'name' => 'Name',
        'email' => 'Email',
        'password' => 'Password',
        'roles' => 'Roles',
        'teams' => 'Teams',
        'label' => 'Users',
        'title' => [
            'show' => 'Show User',
            'delete' => 'Delete User',
            'impersonate' => 'Impersonate User',
            'create' => 'Create User',
            'edit' => 'Edit User',
            'list' => 'Users',
            'home' => 'Users',
        ],
        'notificaitons' => [
            'last' => [
                'title' => 'Error',
                'body' => 'You cannot delete the last user',
            ],
            'self' => [
                'title' => 'Error',
                'body' => 'You cannot delete yourself',
            ],
        ],
    ],
    'bulk' => [
        'teams' => 'Update Teams',
        'roles' => 'Update Roles',
    ],
    'team' => [
        'title' => 'Teams',
        'single' => 'Team',
        'columns' => [
            'avatar' => 'Avatar',
            'name' => 'Name',
            'owner' => 'Owner',
            'personal_team' => 'Personal Team',
        ],
    ],
];
