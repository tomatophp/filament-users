<?php

namespace TomatoPHP\FilamentUsers\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Laravel\Jetstream\Jetstream;
use TomatoPHP\FilamentUsers\Facades\FilamentUser;
use TomatoPHP\FilamentUsers\Resources\UserResource\Pages;

class UserResource extends Resource
{
    public static function getModel(): string
    {
        return config('filament-users.model');
    }

    protected static ?int $navigationSort = 9;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function getNavigationLabel(): string
    {
        return trans('filament-users::user.resource.label');
    }

    public static function getPluralLabel(): string
    {
        return trans('filament-users::user.resource.label');
    }

    public static function getLabel(): string
    {
        return trans('filament-users::user.resource.single');
    }

    public static function getNavigationGroup(): ?string
    {
        if (config('filament-users.shield')) {
            return __('filament-shield::filament-shield.nav.group');
        }

        return config('filament-users.group') ?: trans('filament-users::user.group');
    }

    public function getTitle(): string
    {
        return trans('filament-users::user.resource.title.resource');
    }

    public static function form(Form $form): Form
    {
        $rows = [
            Forms\Components\TextInput::make('name')
                ->required()
                ->label(trans('filament-users::user.resource.name')),
            Forms\Components\TextInput::make('email')
                ->email()
                ->required()
                ->label(trans('filament-users::user.resource.email')),
            Forms\Components\TextInput::make('password')
                ->label(__('filament-panels::pages/auth/register.form.password.label'))
                ->password()
                ->revealable(filament()->arePasswordsRevealable())
                ->required(fn ($record) => ! $record)
                ->rule(Password::default())
                ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                ->same('passwordConfirmation')
                ->validationAttribute(__('filament-panels::pages/auth/register.form.password.validation_attribute')),
            Forms\Components\TextInput::make('passwordConfirmation')
                ->label(__('filament-panels::pages/auth/register.form.password_confirmation.label'))
                ->password()
                ->revealable(filament()->arePasswordsRevealable())
                ->required(fn ($record) => ! $record)
                ->dehydrated(false),
        ];

        if (config('filament-users.shield') && class_exists(\BezhanSalleh\FilamentShield\FilamentShield::class)) {
            $rows[] = Forms\Components\Select::make('roles')
                ->columnSpanFull()
                ->multiple()
                ->preload()
                ->relationship('roles', 'name')
                ->label(trans('filament-users::user.resource.roles'));
        }

        if (config('filament-users.teams') && class_exists(Jetstream::class)) {
            $rows[] = Forms\Components\Select::make('teams')
                ->columnSpanFull()
                ->multiple()
                ->preload()
                ->relationship('teams', 'name')
                ->label(trans('filament-users::user.resource.teams'));
        }

        $form->schema(array_merge($rows, FilamentUser::getFormInputs()));

        return $form;
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Infolists\Components\TextEntry::make('name')
                ->columnSpanFull()
                ->label(trans('filament-users::user.resource.name')),
            Infolists\Components\TextEntry::make('email')
                ->label(trans('filament-users::user.resource.email')),
            Infolists\Components\TextEntry::make('email_verified_at')
                ->label(trans('filament-users::user.resource.email_verified_at')),
        ]);
    }

    public static function table(Table $table): Table
    {
        $actions = [];

        if (! config('filament-users.simple')) {
            $actions[] = Tables\Actions\ViewAction::make()
                ->iconButton()
                ->tooltip(trans('filament-users::user.resource.title.show'));
        }

        $actions[] = Tables\Actions\EditAction::make()
            ->iconButton()
            ->tooltip(trans('filament-users::user.resource.title.edit'));

        $actions[] = Tables\Actions\DeleteAction::make()
            ->using(function ($record, Tables\Actions\Action $action) {
                $count = config('filament-users.model')::query()->count();
                if ($count === 1) {
                    Notification::make()
                        ->title(trans('filament-users::user.resource.notificaitons.last.title'))
                        ->body(trans('filament-users::user.resource.notificaitons.last.body'))
                        ->danger()
                        ->icon('heroicon-o-exclamation-triangle')
                        ->send();

                    return;
                } elseif (auth()->user()->id === $record->id) {
                    Notification::make()
                        ->title(trans('filament-users::user.resource.notificaitons.self.title'))
                        ->body(trans('filament-users::user.resource.notificaitons.self.body'))
                        ->danger()
                        ->icon('heroicon-o-exclamation-triangle')
                        ->send();

                    return;
                } else {
                    $record->delete();
                    $action->success();
                }

            })
            ->iconButton()
            ->tooltip(trans('filament-users::user.resource.title.delete'));

        if (class_exists(\STS\FilamentImpersonate\Tables\Actions\Impersonate::class) && config('filament-users.impersonate')) {
            $actions[] = \STS\FilamentImpersonate\Tables\Actions\Impersonate::make('impersonate')
                ->redirectTo(fn () => filament()->getCurrentPanel()->getUrl())
                ->tooltip(trans('filament-users::user.resource.title.impersonate'));
        }

        $columns = [
            Tables\Columns\TextColumn::make('id')
                ->sortable()
                ->label(trans('filament-users::user.resource.id')),
            Tables\Columns\TextColumn::make('name')
                ->sortable()
                ->searchable()
                ->label(trans('filament-users::user.resource.name')),
            Tables\Columns\TextColumn::make('email')
                ->sortable()
                ->searchable()
                ->label(trans('filament-users::user.resource.email')),
        ];

        if (config('filament-users.shield') && class_exists(\BezhanSalleh\FilamentShield\FilamentShield::class)) {
            $columns[] = Tables\Columns\TextColumn::make('roles.name')
                ->icon('heroicon-o-shield-check')
                ->color('success')
                ->toggleable()
                ->badge();
        }

        if (config('filament-users.teams') && class_exists(Jetstream::class)) {
            $columns[] = Tables\Columns\TextColumn::make('teams.name')
                ->color('info')
                ->icon('heroicon-o-users')
                ->toggleable()
                ->badge();
        }

        $columns = array_merge($columns, [
            Tables\Columns\IconColumn::make('email_verified_at')
                ->boolean()
                ->sortable()
                ->searchable()
                ->label(trans('filament-users::user.resource.email_verified_at'))
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('created_at')
                ->label(trans('filament-users::user.resource.created_at'))
                ->dateTime('M j, Y')
                ->toggleable(isToggledHiddenByDefault: true)
                ->sortable(),
            Tables\Columns\TextColumn::make('updated_at')
                ->label(trans('filament-users::user.resource.updated_at'))
                ->dateTime('M j, Y')
                ->toggleable(isToggledHiddenByDefault: true)
                ->sortable(),
        ]);

        $filters = [
            Tables\Filters\Filter::make('verified')
                ->label(trans('filament-users::user.resource.verified'))
                ->query(fn (Builder $query): Builder => $query->whereNotNull('email_verified_at')),
            Tables\Filters\Filter::make('unverified')
                ->label(trans('filament-users::user.resource.unverified'))
                ->query(fn (Builder $query): Builder => $query->whereNull('email_verified_at')),
        ];

        if (config('filament-users.shield') && class_exists(\BezhanSalleh\FilamentShield\FilamentShield::class)) {
            $filters[] = Tables\Filters\SelectFilter::make('roles')
                ->label(trans('filament-users::user.resource.roles'))
                ->multiple()
                ->searchable()
                ->preload()
                ->relationship('roles', 'name');
        }

        if (config('filament-users.teams') && class_exists(Jetstream::class)) {
            $filters[] = Tables\Filters\SelectFilter::make('teams')
                ->label(trans('filament-users::user.resource.teams'))
                ->multiple()
                ->searchable()
                ->preload()
                ->relationship('teams', 'name');
        }

        $bulk = [];

        $bulk[] = Tables\Actions\DeleteBulkAction::make();

        if (config('filament-users.shield') && class_exists(\BezhanSalleh\FilamentShield\FilamentShield::class)) {
            $bulk[] = Tables\Actions\BulkAction::make('roles')
                ->icon('heroicon-o-shield-check')
                ->color('success')
                ->requiresConfirmation()
                ->label(trans('filament-users::user.bulk.roles'))
                ->form([
                    Forms\Components\Select::make('roles')
                        ->label(trans('filament-users::user.resource.roles'))
                        ->multiple()
                        ->searchable()
                        ->preload()
                        ->options(config('filament-users.roles_model')::query()->pluck('name', 'id')->toArray()),
                ])
                ->action(function (array $data, Collection $records) {
                    $roles = $data['roles'];

                    $records->each(function ($user) use ($roles) {
                        $user->roles()->sync($roles);
                    });
                })
                ->deselectRecordsAfterCompletion();
        }

        if (config('filament-users.teams') && class_exists(Jetstream::class)) {
            $bulk[] = Tables\Actions\BulkAction::make('teams')
                ->requiresConfirmation()
                ->color('info')
                ->icon('heroicon-o-users')
                ->label(trans('filament-users::user.bulk.teams'))
                ->form([
                    Forms\Components\Select::make('teams')
                        ->label(trans('filament-users::user.resource.teams'))
                        ->multiple()
                        ->searchable()
                        ->preload()
                        ->options(config('filament-users.team_model')::query()->pluck('name', 'id')->toArray()),
                ])
                ->action(function (array $data, Collection $records) {
                    $teams = $data['teams'];

                    $records->each(function ($user) use ($teams) {
                        $user->teams()->sync($teams);
                    });
                })
                ->deselectRecordsAfterCompletion();
        }

        return $table
            ->columns(array_merge($columns, FilamentUser::getTableColumns()))
            ->filters(array_merge($filters, FilamentUser::getTableFilters()))
            ->actions(array_merge($actions, FilamentUser::getTableActions()))
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make($bulk),
            ]);
    }

    public static function getRelations(): array
    {
        return FilamentUser::getRelationManagers();
    }

    public static function getPages(): array
    {
        return config('filament-users.simple') ? [
            'index' => Pages\ManageUsers::route('/'),
        ] : [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
            'view' => Pages\ViewUser::route('/{record}'),
        ];
    }
}
