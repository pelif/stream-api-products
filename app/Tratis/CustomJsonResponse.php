<?php

namespace App\Tratis;

use Closure;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

trait CustomJsonResponse
{
    private function getContextPluralName(): string
    {
        return $this->contextPluralName;
    }

    private function getMethodContext(): string
    {
        return debug_backtrace()[1]['function'];
    }

    private function getEntityName(): string
    {
        return str_replace("Service", "", (new \ReflectionClass($this))->getShortName());
    }

    private function execute (Closure $action, string $operation): JsonResponse
    {
        if (empty($this->contextPluralName)) {
            throw new \RuntimeException("Operation {$operation} Don't is executed in {$this->getEntityName()}");
        }

        try {
            $result = $action();
            return $this->handleSuccess($result, $operation);
        } catch (\Exception $e) {
            return $this->handleError($operation, $e);
        }
    }

    private function handleSuccess($result , string $operation): JsonResponse
    {
        if ($this->isEmptyREsult($result)) {
            return $this->getNotFoundResponse($operation);
        }

        return response()->json([
            'message' => $this->getSuccessMessage($operation),
            'data' => $result
        ], $this->getSuccessStatus($operation));
    }

    private function getNotFoundResponse(string $operation): JsonResponse
    {
        $message = match ($operation) {
            'all' => "{$this->getContextPluralName()} not found",
            'find' => "{$this->getEntityName()} not found",
            'store' => "{$this->getEntityName()} not created",
            'update' => "{$this->getEntityName()} not updated",
            'destroy' => "{$this->getEntityName()} not deleted",
            default => "operation failed"
        };

        $status = match ($operation) {
            'all', 'find' => 404,
            default => 400
        };

        return response()->json([
            'message' => $message
        ], $status);
    }

    private function getSuccessMessage(string $operation): string
    {
        return match ($operation) {
            'all' => "{$this->getContextPluralName()} retrieved successfully",
            'find' => "{$this->getEntityName()} found successfully",
            'store' => "{$this->getEntityName()} created successfully",
            'update' => "{$this->getEntityName()} updated successfully",
            'destroy' => "{$this->getEntityName()} deleted successfully",
            default => "operation {$operation} not found"
        };
    }

    private function getSuccessStatus(string $operation): int
    {
        return match ($operation) {
            'store' => 201,
            default => 200
        };
    }

    private function handleError(string $operation, \Exception $e): JsonResponse
    {
        return response()->json([
            'message' => "An Error occurred during {$operation} in {$this->getEntityName()}",
            'error' => $e->getMessage()
        ], 500);
    }

    private function isEmptyREsult($result): bool
    {
        return match (true) {
            $result instanceof Collection => $result->isEmpty(),
            is_null($result) => true,
            is_bool($result) => !$result,
            default => false
        };
    }


}
