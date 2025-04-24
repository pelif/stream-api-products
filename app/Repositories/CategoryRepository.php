<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $model = Category::class;

    public function all()
    {
        return $this->model::all();
    }

    public function find(string $id)
    {
        return $this->model::find($id);
    }

    public function store(array $data)
    {
        $data['user_id'] = Auth::user()->id;
        return $this->model::create($data);
    }

    public function update(string $id, array $data)
    {
        $update = $this->model::find($id)->update($data);

        if ($update)
            return $this->model::find($id);

        throw new \Exception('Category not updated');
    }

    public function destroy(string $id)
    {
        return $this->model::find($id)->delete();
    }
}
