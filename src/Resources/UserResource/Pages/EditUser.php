<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Pages;

use Filament\Resources\Pages\EditRecord;
use TomatoPHP\FilamentUsers\Resources\UserResource;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    public function mutateFormDataBeforeSave(array $data): array
    {
        $getUser = self::getModel()::where('email', $data['email'])->first();
        if ($getUser) {
            if (empty($data['password'])) {
                $data['password'] = $getUser->password;
            }
        }

        return $data;
    }

    public function getTitle(): string
    {
        return trans('filament-users::user.resource.title.edit');
    }

    protected function getActions(): array
    {
        return config('filament-users.resource.pages.edit')::make($this);
    }

    public static function getModel(): string
    {
        // Get the configuration value
        $config = config('filament-users.model');

        // Check if the configuration is an array
        if (is_array($config)) {
            // Get the ID from filament()
            $id = filament()->getId();

            // Check if the key exists in the array
            if (isset($config[$id])) {
                $model = $config[$id];
            } else {
                // If the key does not exist, return the first element of the array
                $model = reset($config);
            }
        } else {
            // If the configuration is not an array, use it as the model
            $model = $config;
        }

        // Ensure the model class exists
        if (! class_exists($model)) {
            throw new \RuntimeException("Model class {$model} does not exist.");
        }

        // Return the model class name (or you can return the count if needed)
        return $model;
    }
}
