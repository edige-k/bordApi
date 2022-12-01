<?php


namespace App\Repositories;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface EloquentRepositoryInterface
{
    /**
     * Get all models.
     *
     * @param array $columns
     * @param array $relations
     * @param array $relations_count
     * @return Collection
     */
    public function getAll(
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): Collection;

    /**
     * @param array|string[] $columns
     * @param array $relations
     * @param array $relations_count
     * @return Builder
     */
    public function getAllQuery(
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): Builder;

    /**
     * @param array $filters
     * @param array $columns
     * @param array $relations
     * @param array $relations_count
     * @return Builder
     */
    public function getByCustomFiltersQuery(
        array $filters,
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): Builder;

    /**
     * @param array $filters
     * @param array $columns
     * @param array $relations
     * @param array $relations_count
     * @return Collection
     */
    public function getByCustomFilters(
        array $filters,
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): Collection;

    /**
     * @param string $value
     * @param string|null $key
     * @return array
     */
    public function getList(
        string $value,
        ?string $key
    ): array;

    /**
     * Find.
     *
     * @param string $modelId
     * @param array $columns
     * @param array $relations
     * @param array $relations_count
     * @return Model|null
     */
    public function find(
        string $modelId,
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): ?Model;

    /**
     * Find Or Fail.
     *
     * @param string $modelId
     * @param array $columns
     * @param array $relations
     * @param array $relations_count
     * @return Model|null
     */
    public function findOrFail(
        string $modelId,
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): ?Model;

    /**
     * First where.
     *
     * @param array $condition
     * @param array $columns
     * @param array $relations
     * @param array $relations_count
     * @return Model|null
     */
    public function firstWhere(
        array $condition,
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): ?Model;

    /**
     * Create a model.
     *
     * @param array $payload
     * @return Model
     */
    public function create(array $payload): Model;


    /**
     * Update a model by ID.
     *
     * @param string $modelId
     * @param array $payload
     * @return int
     */
    public function update(
        string $modelId,
        array $payload
    ): int;

    /**
     * Create multiple models.
     *
     * @param $values
     * @return bool
     */
    public function insert($values): bool;

    /**
     * Update any model.
     *
     * @param $values
     * @param $uniqueBy
     * @param null $update
     * @return int
     */
    public function upsert($values, $uniqueBy, $update = null): int;

    /**
     * @return int
     */

    public function count(): int;
}