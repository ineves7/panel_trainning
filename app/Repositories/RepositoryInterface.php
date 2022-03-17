<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function get();

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null);

    public function create(array $data);

    public function find($id);

    public function update($id, array $data);

    public function delete($id);

    public function restore($id);

    public function forceDelete($id);
}
