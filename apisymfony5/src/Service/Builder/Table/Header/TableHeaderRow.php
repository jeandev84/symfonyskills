<?php

namespace App\Service\Builder\Table\Header;

class TableHeaderRow
{
    protected $label;

    protected $options = [];

    public function __construct(string $label, array $options = [])
    {
        $this->label = $label;
        $this->options = $options;
    }

    public function render()
    {
        return "<th>$this->label</th>";
    }
}
