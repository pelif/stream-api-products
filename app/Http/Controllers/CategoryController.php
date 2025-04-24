<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\User;
use App\Repositories\CategoryRepositoryInterface;
use App\Services\CategoryServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    public function __construct(protected CategoryServiceInterface $service)
    {
    }

    public function index(Request $request): JsonResponse
    {
        return $this->service->all();
    }

    public function show(Request $request, string $id): JsonResponse
    {
        return $this->service->find($id);
    }


    public function store(CategoryRequest $request): JsonResponse
    {
        return $this->service->store($request);
    }

    public function update(CategoryRequest $request, string $id): JsonResponse
    {
        return $this->service->update($id, $request);
    }

    public function destroy(Request $request, string $id): JsonResponse
    {
        return $this->service->destroy($id);
    }


}
