<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductRepository implements ProductRepositoryInterface
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
        $data['user_id'] = Auth::user()->id;
        return $this->model::create($data);
    }

    public function update($id, array $data)
    {
        $update = $this->model::find($id)->update($data);

        if ($update)
            return $this->model::find($id);

        throw new \Exception('Product not updated');
    }

    public function destroy($id)
    {
        return $this->model::find($id)->delete();
    }
}
