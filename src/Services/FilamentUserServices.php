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
}
