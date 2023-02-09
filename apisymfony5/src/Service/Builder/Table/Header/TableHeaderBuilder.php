<?php

namespace App\Service\Builder\Table\Header;

class TableHeaderBuilder
{

    /**
     * @var TableHeaderRow[]
    */
    protected $rows = [];



    public function addRow(TableHeaderRow $row)
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

        $html[] = '<thead>';
        foreach ($this->rows as $header) {
            $html[] = $header->render();
        }
        $html[] = '</thead>';

        return join(PHP_EOL, $html);
    }
}
