<?php

namespace App\Repositories;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    /**
     * Get all
     * @return Collection[]
     */
    public function getAll() : Collection;

    /**
     * Get one
     * @param $id
     * @return Collection
     */
    public function find($id) : ?Collection;

    /**
     * Create
     * @param array $attributes
     * @return Model|Collection|null
     */
    public function create(array $attributes) : Model|Collection|null;

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return bool|Collection
     */
    public function update($id, array $attributes) : bool|Collection;

    /**
     * Delete
     * @param $id
     * @return bool
     */
    public function delete($id) : bool;
}
