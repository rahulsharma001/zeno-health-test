<?php

declare(strict_types=1);

namespace App\Repository;

interface BaseRepositoryInterface
{
    /**
     * Return all models in a collection
     *
     * @return mixed
     */
    public function all();

    /**
     * Create a new record
     *
     * @param $attributes
     * @return mixed
     */
    public function store($attributes);

    /**
     * Update an existing model
     *
     * @param $id
     * @param $attributes
     * @return mixed
     */
    public function update($id, $attributes);

    /**
     * Get a model with a specific idea
     *
     * @param $id
     * @return mixed
     */
    public function find($id);
}
