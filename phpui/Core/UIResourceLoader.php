<?php

namespace PHPUI\Core;

class UIResourceLoader
{
    protected bool $ignoreAllComponentResources = false;
    protected array $ignoredComponents = [];

    protected array $processedComponents = [];
    protected array $loadedResources = [];
    protected array $resources = [];

    // TODO array of replacement resources, per resource type, then resource -> new resource
    // TODO add resources automatically to any area - seasonal over-ride, but keep existing
    // TODO ignore all component resources, per resource class

    //
    // SCENARIOS
    // Css is set on component level, load additional CSS
    // Solution:
    // - add per component resources
    //
    // Css is set on component level, load new CSS
    // Solution:
    // - ignore component resources
    // - add per component resource
    //
    // Css is set on resource loader level, just change loader or create new loader
    //

    public function ignoreComponent(string $componentClass = null, string ...$resources): UIResourceLoader
    {
        if ($componentClass === null) {
            $this->ignoreAllComponentResources = true;
        } else {
            $this->ignoredComponents[$componentClass] = [];

            if (!empty($resources)) {
                foreach ($resources as $resourceClass) {
                    $this->ignoredComponents[$componentClass][$resourceClass] = true;
                }
            }
        }

        return $this;
    }

    public function alwaysLoadInArea(string $renderArea, UIResource ...$resources): UIResourceLoader
    {

        return $this;
    }

    public function collectComponentResources(UIComponent $component): void
    {
        $componentClass = get_class($component);
        if (isset($this->processedComponents[$componentClass])) {
            return;
        }

        $this->processedComponents[$componentClass] = true;

        if ($this->ignoreAllComponentResources) {
            return;
        }

        if ($component->hasResources()) {
            foreach ($component->getResources()->getAll() as $resource) {
                if (!$this->shouldResourceBeLoaded($componentClass, get_class($resource))) {
                    continue;
                }

                if ($resource::LOAD_ONCE) {
                    if (!isset($this->loadedResources[$resource->resource])) {
                        $this->resources[] = $resource;
                        $this->loadedResources[$resource->resource] = true;
                    }
                } else {
                    $this->resources[] = $resource;
                }
            }
        }
    }

    public function render(string $renderArea = ''): string
    {
        $html = '';

        foreach ($this->resources as $resource) {
            if ($resource->renderArea === $renderArea) {
                $html .= $resource->render();
            }
        }

        return $html;
    }

    public function shouldResourceBeLoaded($componentClass, $resourceClass): bool
    {
        if (!isset($this->ignoredComponents[$componentClass])) {
            return true;
        }

        if (
            !empty($this->ignoredComponents[$componentClass])
            && !isset($this->ignoredComponents[$componentClass][$resourceClass])
        ) {
            return true;
        }

        return false;
    }
}
