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
        'password_confirmation' => 'Confirmar Contraseña',
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
        'avatar' => 'Avatar',
        'change_password' => 'Cambiar Contraseña',
        'change_password_auto' => 'Contraseña cambiada automáticamente',
        'change_password_success' => 'Contraseña cambiada correctamente',
        'change_password_auto_body' => 'Contraseña cambiada automáticamente',
        'change_password_success_body' => 'Contraseña cambiada correctamente',
        'change_password_auto_body_placeholder' => 'Dejar en blanco para generar automáticamente',
        'change_password_success_body_placeholder' => 'Dejar en blanco para generar automáticamente',
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
    'banner' => [
        'impersonating' => 'Suplantando',
        'leave' => 'Salir de la Suplantación',
    ],
];
