<?php

namespace App\Repositories;

interface CategoryRepositoryInterface
{
    public function all();
    public function find(string $id);
    public function store(array $data);
    public function update(string $id, array $data);
    public function destroy(string $id);
}
