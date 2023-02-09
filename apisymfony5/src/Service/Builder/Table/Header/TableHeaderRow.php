<?php

namespace App\Service\Builder\Table\Header;

class TableHeaderRow
{

    /**
     * @var string
    */
    protected string $label;


    /**
     * @var array
    */
    protected array $options = [];


    /**
     * @param string $label
     * @param array $options
    */
    public function __construct(string $label, array $options = [])
    {
        $this->label = $label;
        $this->options = $options;
    }


    /**
     * @return string
    */
    public function renderHtml(): string
    {
        return "<th>$this->label</th>";
    }
}
