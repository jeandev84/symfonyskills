<?php
namespace App\Service\Builder\Table\Body;

class TableBodyRow
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
        return "<td>$this->label</td>";
    }
}
