<?php

namespace PHPUI\Core;

abstract class UIRenderer
{
    protected string $metadataVariableName = 'metadata';

    protected array $componentsRendered = [];
    protected array $componentsWithMissingTemplate = [];

    protected UIResourceLoader $resourceLoader;

    public function __construct(UIResourceLoader $resourceLoader = null)
    {
        $this->resourceLoader = $resourceLoader ?? new UIResourceLoader();
    }

    public function getRenderedComponents(): array
    {
        return $this->componentsRendered;
    }

    public function setMetadataVariableName(string $variableName): UIRenderer
    {
        // TODO: throw error on invalid variable name

        $this->metadataVariableName = $variableName;

        return $this;
    }

    public function setResourceLoader(UIResourceLoader $resourceLoader): UIRenderer
    {
        $this->resourceLoader = $resourceLoader;

        return $this;
    }

    public function getResourceLoader(): UIResourceLoader
    {
        return $this->resourceLoader;
    }

    public function render(UIComponent|UIComponentCollection $components): string
    {
        if ($components instanceof UIComponent) {
            $components = [$components];
        } else {
            $components = $components->getAll();
        }

        $output = '';

        $total = count($components);
        $current = 0;

        foreach ($components as $component) {
            ++$current;

            $this->getResourceLoader()->collectComponentResources($component);

            $componentClassName = get_class($component);

            if (!isset($this->componentsRendered[$componentClassName])) {
                $this->componentsRendered[$componentClassName] = 0;
            }
            ++$this->componentsRendered[$componentClassName];

            $component->setRenderer($this);
            $variables = $component->getVariables();

            foreach ($variables as $key => $variable) {
                if ($variable instanceof UIComponentCollection) {
                    $variables[$key] = $this->render($variable);
                }
            }

            $variables[$this->metadataVariableName] = new UIMetadata($total, $current);

            $templateFile = $component->getTemplate();
            if ($templateFile !== '') {
                $output .= $this->renderComponent($templateFile, $variables);
            } else {
                $this->componentsWithMissingTemplate[$componentClassName] = 1;
            }
        }

        return $output;
    }

    abstract public function renderComponent(string $templateFile, array $variables = []): string;
}