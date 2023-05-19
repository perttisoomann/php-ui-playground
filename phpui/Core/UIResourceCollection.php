<?php

namespace PHPUI\Core;

class UIResourceCollection
{
    protected array $resources = [];

    public function add(UIResource $resource): void
    {
        $this->resources[] = $resource;
    }

    public function hasResources(): bool
    {
        return !empty($this->resources);
    }

    public function getAll(): array
    {
        return $this->resources;
    }
}
