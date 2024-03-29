<?php


namespace App\Repository;


use App\Entity\Task;
use App\Model\PaginationQuery;
use App\Model\PaginationResponse;

interface TaskRepositoryInterface
{
    /**
     * @param PaginationQuery $query
     *
     * @return PaginationResponse
     */
    public function listTasks(PaginationQuery $query): PaginationResponse;

    /**
     * @param int $id
     *
     * @return Task
     */
    public function find(int $id): Task;

    /**
     * @param Task $task
     */
    public function create(Task $task): void;

    /**
     * @param Task $task
     */
    public function update(Task $task): void;
}
