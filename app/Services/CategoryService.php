<?php

namespace App\Services;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Repositories\CategoryRepositoryInterface;
use App\Tratis\CustomJsonResponse;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryService implements CategoryServiceInterface
{
    use CustomJsonResponse;

    protected string $contextPluralName = "Categories";

    public function __construct(protected CategoryRepositoryInterface $repository) {}

    public function all(): JsonResponse
    {
        return $this->execute(fn () =>
            CategoryResource::collection($this->repository->all()),
            $this->getMethodContext()
        );
    }

    public function find(string $id): JsonResponse
    {
        return $this->execute(fn () =>
            new CategoryResource($this->repository->find($id)),
            $this->getMethodContext()
        );
    }

    public function store(CategoryRequest $request): JsonResponse
    {
        return $this->execute(fn () =>
            new CategoryResource($this->repository->store($request->validated())),
            $this->getMethodContext()
        );
    }

    public function update(string $id, CategoryRequest $request): JsonResponse
    {
        return $this->execute(fn () =>
            new CategoryResource($this->repository->update($id, $request->validated())),
            $this->getMethodContext()
        );

    }

    public function destroy(string $id): JsonResponse
    {
        return $this->execute(
            fn () => $this->repository->destroy($id),
            $this->getMethodContext()
        );
    }
}
