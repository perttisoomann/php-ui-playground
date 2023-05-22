<?php

namespace Application\Base;

use Application\Resources\InlineCssResource;
use Application\Resources\InlineJsResource;
use Application\Resources\ResourceLocation;
use PHPUI\Core\UIComponent;

class MyTable extends UIComponent
{
    protected array $columns = [];
    protected array $data = [];
    protected bool $showHeader = true;

    public function __construct()
    {
        $this->setTemplate('views/table.php');

        $this->addResource(
            new InlineJsResource(
                'console.log("x");',
                ResourceLocation::BODY->value,
                ['async' => null, 'type' => 'text/javascript']
            ),
            new InlineCssResource(
                'body {color: #f0f !important;}',
                ResourceLocation::BODY->value,
            )
        );
    }

    public function setData(array $data): MyTable
    {
        $this->data = $data;

        return $this;
    }

    public function addColumn(MyTableColumn ...$columns): MyTable
    {
        foreach ($columns as $column) {
            $this->columns[] = $column;
        }

        return $this;
    }

    public function getColumnValue(MyTableColumn $column, array $data): string
    {
        $cellContent = $column->getValue();

        if (is_string($cellContent)) {
            return $data[$cellContent] ?? '';
        }

        return $cellContent->call($this, $data);
    }

    public function getVariables(): array
    {
        return [
            'showHeader' => $this->showHeader,
            'columns' => $this->columns,
            'data' => $this->data,
            'table' => $this,
        ];
    }
}
