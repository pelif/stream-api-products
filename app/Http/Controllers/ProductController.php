<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\ProductServiceInterface;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(protected ProductServiceInterface $service) {}

    public function index(): JsonResponse
    {
        return $this->service->all();
    }

    public function show(string $id): JsonResponse
    {
        return $this->service->find($id);
    }

    public function store(ProductRequest $request): JsonResponse
    {
        return $this->service->store($request);
    }

    public function update(ProductRequest $request, string $id): JsonResponse
    {
        return $this->service->update($id, $request);
    }

    public function destroy(string $id): JsonResponse
    {
        return $this->service->destroy($id);
    }
}
