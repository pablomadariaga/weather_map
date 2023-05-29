<?php

namespace App\Repositories;

use App\Models\History;

/**
 * Interface HistoryRepositoryInterface
 * @package App\Repositories
 */
interface HistoryRepositoryInterface
{
    /**
     * Create a new history entry.
     *
     * @param array $data
     * @return History
     */
    public function create(array $data): History;

    /**
     * Get all history entries.
     *
     * @return array
     */
    public function getAll(): array;
}
