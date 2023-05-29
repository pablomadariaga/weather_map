<?php

namespace App\Repositories;

use App\Models\History;

/**
 * Class HistoryRepository
 * @package App\Repositories
 */
class HistoryRepository implements HistoryRepositoryInterface
{
    /**
     * Create a new history entry.
     *
     * @param array $data
     * @return History
     */
    public function create(array $data): History
    {
        return History::create($data);
    }

    /**
     * Get all history entries.
     *
     * @return array
     */
    public function getAll(): array
    {
        return History::with('city')->get()->toArray();
    }
}
