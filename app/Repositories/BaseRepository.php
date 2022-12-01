<?php


namespace App\Repositories;


use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements EloquentRepositoryInterface
{
    protected Model $model;


    public function getAll(array $columns = ['*'], array $relations = [], array $relations_count = []): Collection
    {
        // TODO: Implement getAll() method.
    }

    public function getAllQuery(array $columns = ['*'], array $relations = [], array $relations_count = []): Builder
    {
        // TODO: Implement getAllQuery() method.
    }

    public function getByCustomFiltersQuery(array $filters, array $columns = ['*'], array $relations = [], array $relations_count = []): Builder
    {
        // TODO: Implement getByCustomFiltersQuery() method.
    }

    public function getByCustomFilters(array $filters, array $columns = ['*'], array $relations = [], array $relations_count = []): Collection
    {
        // TODO: Implement getByCustomFilters() method.
    }

    public function getList(string $value, ?string $key): array
    {
        // TODO: Implement getList() method.
    }

    public function find(string $modelId, array $columns = ['*'], array $relations = [], array $relations_count = []): ?Model
    {
        // TODO: Implement find() method.
    }

    public function findOrFail(string $modelId, array $columns = ['*'], array $relations = [], array $relations_count = []): ?Model
    {
        // TODO: Implement findOrFail() method.
    }

    public function firstWhere(array $condition, array $columns = ['*'], array $relations = [], array $relations_count = []): ?Model
    {
        // TODO: Implement firstWhere() method.
    }

    public function create(array $payload): Model
    {
        return $this->model
            ->query()
            ->create($payload);
    }

    public function update(string $modelId, array $payload): int
    {
        // TODO: Implement update() method.
    }

    public function insert($values): bool
    {
        // TODO: Implement insert() method.
    }

    public function upsert($values, $uniqueBy, $update = null): int
    {
        // TODO: Implement upsert() method.
    }

    public function count(): int
    {
        // TODO: Implement count() method.
    }
}