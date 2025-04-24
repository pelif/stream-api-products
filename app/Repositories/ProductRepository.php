<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository implements CategoryRepositoryInterface
{
    protected $model = Product::class;

    public function all()
    {
        return $this->model::all();
    }

    public function find($id)
    {
        return $this->model::find($id);
    }

    public function store(array $data)
    {
        return $this->model::create($data);
    }

    public function update($id, array $data)
    {
        return $this->model::find($id)->update($data);
    }

    public function destroy($id)
    {
        return $this->model::find($id)->delete();
    }
}
