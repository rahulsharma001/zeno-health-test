<?php

namespace App\Repository;

abstract class BaseRepository implements BaseRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * @inheritDoc
     */
    public function store($attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * @inheritDoc
     */
    public function update($id, $attributes)
    {
        return $this->model
            ->whereId($id)
            ->update($attributes);
    }

    /**
     * @inheritDoc
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param mixed $id
     * 
     * @return mixed
     */
    public function delete($id)
    {
        return $this->model
            ->whereId($id)
            ->delete();
    }
}
