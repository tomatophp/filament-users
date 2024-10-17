<?php

namespace TomatoPHP\FilamentUsers\Services;

use Filament\Actions\Action;
use Filament\Forms\Components\Field;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\Column;
use Filament\Tables\Filters\Filter;

class FilamentUserServices
{
    private array $tableActions = [];

    private array $tableColumns = [];

    private array $tableFilters = [];

    private array $actions = [];

    private array $editActions = [];

    private array $createActions = [];

    private array $relationManagers = [];

    private array $formInputs = [];

    public function registerTableAction(\Filament\Tables\Actions\Action | array $action)
    {
        is_array($action) ? $this->tableActions = array_merge($this->tableActions, $action) : $this->tableActions[] = $action;
    }

    public function registerTableColumn(Column | array $column)
    {
        is_array($column) ? $this->tableColumns = array_merge($this->tableColumns, $column) : $this->tableColumns[] = $column;
    }

    public function registerTableFilter(Filter | array $filter)
    {
        is_array($filter) ? $this->tableFilters = array_merge($this->tableFilters, $filter) : $this->tableFilters[] = $filter;
    }

    public function registerAction(Action | array $action)
    {
        is_array($action) ? $this->actions = array_merge($this->actions, $action) : $this->actions[] = $action;
    }

    public function registerEditAction(Action | array $action)
    {
        is_array($action) ? $this->editActions = array_merge($this->editActions, $action) : $this->editActions[] = $action;
    }

    public function registerCreateAction(Action | array $action)
    {
        is_array($action) ? $this->createActions = array_merge($this->createActions, $action) : $this->createActions[] = $action;
    }

    public function registerRelationManager(RelationManager | array $relation)
    {
        is_array($relation) ? $this->relationManagers = array_merge($this->relationManagers, $relation) : $this->relationManagers[] = $relation;
    }

    public function registerFormInput(Field | array $input)
    {
        is_array($input) ? $this->formInputs = array_merge($this->formInputs, $input) : $this->formInputs[] = $input;
    }

    public function getTableActions(): array
    {
        return $this->tableActions;
    }

    public function getTableColumns(): array
    {
        return $this->tableColumns;
    }

    public function getTableFilters(): array
    {
        return $this->tableFilters;
    }

    public function getActions(): array
    {
        return $this->actions;
    }

    public function getEditActions(): array
    {
        return $this->editActions;
    }

    public function getCreateActions(): array
    {
        return $this->createActions;
    }

    public function getRelationManagers(): array
    {
        return $this->relationManagers;
    }

    public function getFormInputs(): array
    {
        return $this->formInputs;
    }
}
