<?php

namespace PHPUI\Renderers;

use PHPUI\Core\UIRenderer;

class UIPhpRenderer extends UIRenderer
{
    private string $templatePath = '';

    public function setTemplatePath(string $path): void
    {
        $this->templatePath = $path;
    }

    public function renderComponent(string $templateFile, array $variables = []): string
    {
        extract($variables, EXTR_SKIP);

        ob_start();
        include($this->templatePath . $templateFile);

        return ob_get_clean();
    }
}
