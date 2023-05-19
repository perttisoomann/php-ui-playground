<?php

namespace PHPUI\Core;

abstract class UIResource
{
    public const LOAD_ONCE = true;

    public readonly string $resource;
    public readonly string $renderArea;
    public readonly array $attributes;

    abstract public function render(): string;

    public function __construct(string $resource, string $location = '', array $attributes = [])
    {
        $this->resource = $resource;
        $this->renderArea = $location;
        $this->attributes = $attributes;
    }

    protected function getFormattedAttributes(array $additionalAttributes = []): string
    {
        $attributes = array_merge($additionalAttributes, $this->attributes);

        $formattedAttributes = array_map(
            static function ($value, $key)
            {
                if ($value === null) {
                    return $key;
                }

                return "$key=\"$value\"";
            },
            $attributes,
            array_keys($attributes)
        );

        return implode(' ', $formattedAttributes);
    }
}
