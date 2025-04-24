<?php

namespace App\Services;

use App\Http\Requests\CategoryRequest;
use App\Repositories\CategoryRepositoryInterface;
use App\Tratis\CustomJsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryService implements CategoryServiceInterface
{
    use CustomJsonResponse;

    protected string $contextPluralName = "Categories";

    public function __construct(protected CategoryRepositoryInterface $repository) {}

    public function all()
    {
        return $this->execute(fn () => $this->repository->all(), $this->getMethodContext());
    }

    public function find(string $id)
    {
        return $this->execute(fn () => $this->repository->find($id), $this->getMethodContext());
    }

    public function store(CategoryRequest $request)
    {
        return $this->execute(fn () => $this->repository->store($request->validated()), $this->getMethodContext());
    }

    public function update(string $id, CategoryRequest $request)
    {
        return $this->execute(
            fn () => $this->repository->update($id, $request->validated()),
            $this->getMethodContext()
        );

    }

    public function destroy(string $id)
    {
        return $this->execute(
            fn () => $this->repository->destroy($id),
            $this->getMethodContext()
        );
    }
}