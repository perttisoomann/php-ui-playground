<?php

namespace PHPUI\Core;

class UIComponentCollection
{
    protected array $components = [];

    public function add(UIComponent $component): void
    {
        $this->components[] = $component;
    }

    public function getAll(): array
    {
        return $this->components;
    }

    public function filter(?string $componentClass = null): UIComponentCollection
    {
        if ($componentClass === null) {
            return clone $this;
        }

        $collection = new self();

        foreach ($this->components as $component) {
            if ($component instanceof $componentClass) {
                $collection->add($component);
            }
        }

        return $collection;
    }
}
