<?php

namespace PHPUI\Core;

class UIMetadata
{
    public readonly int $total;
    public readonly int $current;

    public function __construct(int $total, int $current)
    {
        $this->total = $total;
        $this->current = $current;
    }
}
