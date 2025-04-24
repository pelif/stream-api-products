<?php

namespace App\Services;

use App\Http\Requests\CategoryRequest;

interface CategoryServiceInterface
{
    public function all();
    public function find(string $id);
    public function store(CategoryRequest $request);
    public function update(string $id, CategoryRequest $request);
    public function destroy(string $id);
}