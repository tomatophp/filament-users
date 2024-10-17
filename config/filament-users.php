<?php

return [
    /**
     * ---------------------------------------------
     * Publish Resource
     * ---------------------------------------------
     * The resource that will be used for the user management.
     * If you want to use your own resource, you can set this to true.
     * and use `php artisan filament-user:publish` to publish the resource.
     */
    'publish_resource' => false,

    /**
     * ---------------------------------------------
     * Change The Group Name And Override Translated One
     * ---------------------------------------------
     * The Group name of the resource.
     */
    'group' => 'Settings',

    /**
     * ---------------------------------------------
     * User Filament Impersonate
     * ---------------------------------------------
     * if you are using filament impersonate, you can set this to true.
     */
    'impersonate' => true,

    /**
     * ---------------------------------------------
     * User Filament Shield
     * ---------------------------------------------
     *  if you are using filament shield, you can set this to true.
     */
    'shield' => false,

    /**
     * ---------------------------------------------
     * Use Simple Resource
     * ---------------------------------------------
     * change the resource from pages to modals by allow simple resource.
     */
    'simple' => false,

    /**
     * ---------------------------------------------
     * Use Teams
     * ---------------------------------------------
     * if you want to allow team resource and filters and actions.
     */
    'teams' => false,

    /**
     * ---------------------------------------------
     * User Model
     * ---------------------------------------------
     * if you when to custom the user model path
     */
    'model' => \App\Models\User::class,

    /**
     * ---------------------------------------------
     * Team Model
     * ---------------------------------------------
     * if you when to custom the team model path
     */
    'team_model' => \App\Models\Team::class,

    /**
     * ---------------------------------------------
     * Role Model
     * ---------------------------------------------
     * if you when to custom the role model path
     */
    'roles_model' => \Spatie\Permission\Models\Role::class,
];
