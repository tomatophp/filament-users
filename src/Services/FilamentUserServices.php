<?php

namespace TomatoPHP\FilamentUsers\Services;

class FilamentUserServices
{
    private array $relations = [];

    public function register(array | string $relation): void
    {
        if (is_array($relation)) {
            foreach ($relation as $item) {
                $this->relations[] = $item;
            }
        } else {
            $this->relations[] = $relation;
        }
    }

    public function getRelations(): array
    {
        return $this->relations;
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
