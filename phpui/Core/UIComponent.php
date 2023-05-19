<?php

namespace PHPUI\Core;

abstract class UIComponent
{
    protected string $templateFile = '';
    protected UIComponentCollection $components;
    protected UIResourceCollection $resources;
    protected UIRenderer $renderer;

    public function getComponents(): UIComponentCollection
    {
         return $this->components ??= new UIComponentCollection();
    }

    public function addComponent(UIComponent ...$components): UIComponent
    {
        foreach ($components as $component) {
            $this->getComponents()->add($component);
        }

        return $this;
    }

    public function hasResources(): bool
    {
        return isset($this->resources) && $this->resources->hasResources();
    }

    public function getResources(): UIResourceCollection
    {
        return $this->resources ??= new UIResourceCollection();
    }

    public function addResource(UIResource ...$resources): UIComponent
    {
        foreach ($resources as $resource) {
            $this->getResources()->add($resource);
        }

        return $this;
    }

    public function setRenderer(UIRenderer $renderer): UIComponent
    {
        $this->renderer = $renderer;

        return $this;
    }

    public function setTemplate(string $templateFile): UIComponent
    {
        $this->templateFile = $templateFile;

        return $this;
    }

    public function getTemplate(): string
    {
        return $this->templateFile;
    }

    public function getVariables(): array
    {
        return [];
    }
}
