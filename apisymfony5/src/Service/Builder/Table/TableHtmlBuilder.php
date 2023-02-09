<?php

namespace App\Service\Builder\Table;

use App\Service\Builder\Table\Body\TableBodyBuilder;
use App\Service\Builder\Table\Body\TableBodyRow;
use App\Service\Builder\Table\Header\TableHeaderBuilder;
use App\Service\Builder\Table\Header\TableHeaderRow;

class TableHtmlBuilder
{
    protected TableHeaderBuilder $header;

    protected TableBodyBuilder $body;

    protected array $options = [];

    public function __construct(array $options = [])
    {
        $this->header = new TableHeaderBuilder();
        $this->body = new TableBodyBuilder();
    }

    public function addHeader(TableHeaderRow $header): static
    {
        $this->header->addRow($header);

        return $this;
    }

    public function addSortableHeader(): static
    {
        return $this;
    }

    public function addBody(TableBodyRow $row): static
    {
        $this->body->addRow($row);

        return $this;
    }


    /**
     * @return string
    */
    public function createHtml(): string
    {
        $html[] = '<table>';
        $html[] = $this->header->createHtmlRowsHeader();
        $html[] = $this->body->createHtmlRowsBody();
        $html[] = '</table>';

        return join(PHP_EOL, array_filter($html));
    }
}
