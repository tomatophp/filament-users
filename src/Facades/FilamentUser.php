<?php

namespace TomatoPHP\FilamentUsers\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \TomatoPHP\FilamentUsers\Services\FilamentUserServices
 *
 * @method static void registerTableAction(\Filament\Tables\Actions\Action|array $action)
 * @method static void registerTableColumn(\Filament\Tables\Columns\Column|array $column)
 * @method static void registerTableFilter(\Filament\Tables\Filters\Filter|array $filter)
 * @method static void registerAction(\Filament\Actions\Action|array $action)
 * @method static void registerEditAction(\Filament\Actions\Action|array $action)
 * @method static void registerCreateAction(\Filament\Actions\Action|array $action)
 * @method static void registerRelationManager(\Filament\Resources\RelationManagers\RelationManager|array $relation)
 * @method static void registerFormInput(\Filament\Forms\Components\Field|array $input)
 * @method static array getTableActions()
 * @method static array getTableColumns()
 * @method static array getTableFilters()
 * @method static array getActions()
 * @method static array getEditActions()
 * @method static array getCreateActions()
 * @method static array getRelationManagers()
 * @method static array getFormInputs()
 */
class FilamentUser extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'filament-user';
    }
}
