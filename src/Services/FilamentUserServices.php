<?php

declare(strict_types=1);

namespace TomatoPHP\FilamentUsers\Services;

use TomatoPHP\FilamentUsers\Concerns\Impersonates;

class FilamentUserServices
{
    use Impersonates;

    private array $relations = [];

    public function register(array | string $relation): void
    {
        if (is_array($relation)) {
            foreach ($relation as $item) {
                $this->relations[] = $item;
            }

            return;
        }

        $this->relations[] = $relation;
    }

    public function getRelations(): array
    {
        return $this->relations;
    }

    public static function getModel(): string
    {
        $config = config('filament-users.model');

        if (! is_array($config)) {
            $model = $config;

            if (! class_exists($model)) {
                throw new \RuntimeException("Model class {$model} does not exist.");
            }

            return $model;
        }

        $id = filament()->getId();
        $model = $config[$id] ?? reset($config);

        if (! class_exists($model)) {
            throw new \RuntimeException("Model class {$model} does not exist.");
        }

        return $model;
    }
}
