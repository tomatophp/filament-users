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
    'group' => null,

    /**
     * ---------------------------------------------
     * Change The Navigation Sort
     * ---------------------------------------------
     * The navigation sort of the resource.
     */
    'navigation_sort' => 9,

    /**
     * ---------------------------------------------
     * Change The Navigation Icon
     * ---------------------------------------------
     * The navigation icon of the resource.
     */
    'navigation_icon' => 'heroicon-o-user',

    /**
     * ---------------------------------------------
     * User Filament Impersonate
     * ---------------------------------------------
     * if you are using filament impersonate, you can set this to true.
     */
    'impersonate' => [
        'enabled' => true,
        'banner' => [
            // Available hooks: https://filamentphp.com/docs/3.x/support/render-hooks#available-render-hooks
            'render_hook' => env('FILAMENT_IMPERSONATE_BANNER_RENDER_HOOK', 'panels::body.start'),

            // Currently supports 'dark', 'light' and 'auto'.
            'style' => env('FILAMENT_IMPERSONATE_BANNER_STYLE', 'dark'),

            // Turn this off if you want `absolute` positioning, so the banner scrolls out of view
            'fixed' => env('FILAMENT_IMPERSONATE_BANNER_FIXED', true),

            // Currently supports 'top' and 'bottom'.
            'position' => env('FILAMENT_IMPERSONATE_BANNER_POSITION', 'top'),

            'styles' => [
                'light' => [
                    'text' => '#1f2937',
                    'background' => '#f3f4f6',
                    'border' => '#e8eaec',
                ],
                'dark' => [
                    'text' => '#f3f4f6',
                    'background' => '#1f2937',
                    'border' => '#374151',
                ],
            ],
        ],
        'redirect_to' => '/admin',
        'back_to' => '/admin',
        'leave_middleware' => 'auth',
        'auth_guard' => 'web',
    ],

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
     * Use Styled Columns
     * ---------------------------------------------
     * if you want to use styled columns for the resource.
     */
    'styled_columns' => false,

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

    /**
     * ---------------------------------------------
     * Resource Building
     * ---------------------------------------------
     * if you want to use the resource custom class
     */
    'resource' => [
        'table' => [
            'class' => \TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables\UsersTable::class,
            'filters' => \TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables\UserFilters::class,
            'actions' => \TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables\UserActions::class,
            'bulkActions' => \TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables\UserBulkActions::class,
        ],
        'form' => [
            'class' => \TomatoPHP\FilamentUsers\Filament\Resources\Users\Schemas\UserForm::class,
        ],
        'infolist' => [
            'class' => \TomatoPHP\FilamentUsers\Filament\Resources\Users\Schemas\UserInfolist::class,
        ],
    ],

    /**
     * ---------------------------------------------
     * Avatar Collection
     * ---------------------------------------------
     * if you want to use a custom avatar collection.
     */
    'avatar_collection' => 'avatar',
];
