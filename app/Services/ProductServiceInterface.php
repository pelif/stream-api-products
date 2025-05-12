<?php

namespace App\Services;

use App\Http\Requests\ProductRequest;
use App\Models\Product;

interface ProductServiceInterface
{
    public function all();
    public function find(string $id);
    public function store(ProductRequest $request);
    public function update(string $id, ProductRequest $request);
    public function destroy(string $id);
}
