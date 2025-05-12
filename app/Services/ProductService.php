<?php

namespace App\Services;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductsResource;
use App\Models\Product;
use App\Repositories\ProductRepositoryInterface;
use App\Tratis\CustomJsonResponse;
use Illuminate\Http\JsonResponse;

class ProductService implements ProductServiceInterface
{
    use CustomJsonResponse;

    protected string $contextPluralName = "Products";

    public function __construct(protected ProductRepositoryInterface $repository) {}

    public function all(): JsonResponse
    {
        return $this->execute(fn () =>
            ProductsResource::collection($this->repository->all()),
            $this->getMethodContext()
        );
    }

    public function find(string $id): JsonResponse
    {
        return $this->execute(fn () =>
            new ProductsResource($this->repository->find($id)),
            $this->getMethodContext()
        );
    }

    public function store(ProductRequest $request): JsonResponse
    {
        return $this->execute(fn () =>
            new ProductsResource($this->repository->store($request->validated())),
            $this->getMethodContext()
        );
    }

    public function update(string $id, ProductRequest $request): JsonResponse
    {
        return $this->execute(fn () =>
            new ProductsResource($this->repository->update($id, $request->validated())),
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
