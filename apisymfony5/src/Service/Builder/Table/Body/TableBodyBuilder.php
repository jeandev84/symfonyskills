<?php

namespace App\Service\Builder\Table\Body;

class TableBodyBuilder
{
    /**
     * @var TableBodyRow[]
     */
    protected array $rows = [];

    public function addRow(TableBodyRow $row): static
    {
        $this->rows[] = $row;

        return $this;
    }


    /**
     * @return string
    */
    public function render(): string
    {
        if (empty($this->rows)) {
            return '';
        }

        $html[] = '<tbody>';
        foreach ($this->rows as $body) {
            $html[] = '<tr>';
            $html[] = $body->render();
            $html[] = '</tr>';
        }
        $html[] = '</tbody>';

        return join(PHP_EOL, $html);
    }
}
