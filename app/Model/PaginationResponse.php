<?php


namespace App\Model;


class PaginationResponse
{
    public int $total;
    public array $results;
    public int $page;
    public int $limit;
    public string $orderBy = 'name';
    public string $order = 'ASC';

    public function __construct(int $total, array $results, int $page, int $limit, string $orderBy, string $order)
    {
        $this->total = $total;
        $this->results = $results;
        $this->page = $page;
        $this->limit = $limit;
        $this->orderBy = $orderBy;
        $this->order = $order;
    }

    public function isOrderAsc()
    {
        return strtolower($this->order) === 'asc';
    }

    public function isOrderDesc()
    {
        return !$this->isOrderAsc();
    }

    public function isFirstPage(): bool
    {
        return $this->page === 1;
    }

    public function isLastPage(): bool
    {
        return $this->page === (int)ceil($this->total / $this->limit);
    }
}
