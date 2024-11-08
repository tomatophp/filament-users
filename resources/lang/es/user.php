<?php

return [
    'group' => 'Configuraciones',
    'resource' => [
        'id' => 'ID',
        'single' => 'Usuario',
        'email_verified_at' => 'Correo electrónico verificado',
        'created_at' => 'Creado',
        'updated_at' => 'Actualizado',
        'verified' => 'Verificado',
        'unverified' => 'No Verificado',
        'name' => 'Nombre',
        'email' => 'Correo Electrónico',
        'password' => 'Contraseña',
        'roles' => 'Roles',
        'teams' => 'Equipos',
        'label' => 'Usuarios',
        'title' => [
            'show' => 'Mostrar Usuario',
            'delete' => 'Eliminar Usuario',
            'impersonate' => 'Suplantar Usuario',
            'create' => 'Crear Usuario',
            'edit' => 'Editar Usuario',
            'list' => 'Usuarios',
            'home' => 'Usuarios',
        ],
        'notificaitons' => [
            'last' => [
                'title' => 'Error',
                'body' => 'No puedes eliminar el último usuario',
            ],
            'self' => [
                'title' => 'Error',
                'body' => 'No puedes eliminarte a ti mismo',
            ],
        ],
    ],
    'bulk' => [
        'teams' => 'Actualizar Equipos',
        'roles' => 'Actualizar Roles',
    ],
    'team' => [
        'title' => 'Equipos',
        'single' => 'Equipo',
        'columns' => [
            'avatar' => 'Avatar',
            'name' => 'Nombre',
            'owner' => 'Propietario',
            'personal_team' => 'Equipo Personal',
        ],
    ],
];
