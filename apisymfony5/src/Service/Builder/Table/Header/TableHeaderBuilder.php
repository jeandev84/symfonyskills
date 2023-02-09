<?php

namespace App\Service\Builder\Table\Header;

class TableHeaderBuilder
{
    /**
     * @var TableHeaderRow[]
     */
    protected array $rows = [];

    /**
     * @return $this
     */
    public function addRow(TableHeaderRow $row): static
    {
        $this->rows[] = $row;

        return $this;
    }

    public function createHtmlRowsHeader(): string
    {
        if (empty($this->rows)) {
            return '';
        }

        $html[] = '<thead>';
        foreach ($this->rows as $header) {
            $html[] = $header->renderHtml();
        }
        $html[] = '</thead>';

        return join(PHP_EOL, $html);
    }
}
