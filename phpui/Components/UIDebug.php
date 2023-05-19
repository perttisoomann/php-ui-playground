<?php

namespace PHPUI\Components;

use PHPUI\Core\UIComponent;

class UIDebug extends UIComponent
{
    protected int $startTime;

    public function __construct(float $startTime = null)
    {
        if ($startTime === null) {
            $startTime = hrtime(true);
        }

        $this->startTime = $startTime;
        $this->setTemplate('views/debug.php');
    }

    public function getVariables(): array
    {
        $duration = hrtime(true) - $this->startTime;

        $renderedComponents = $this->renderer->getRenderedComponents();
        ksort($renderedComponents);

        return [
            'scriptRuntimeDuration' => $duration / 1000000000,
            'scriptMemoryUsage' => memory_get_peak_usage(true),
            'phpVersion' => PHP_VERSION,
            'totalComponentsRendered' => array_sum($renderedComponents),
            'renderedComponents' => $renderedComponents,
        ];
    }
}
