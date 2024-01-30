<?php

namespace App\Modules\Category\Actions;

use App\Models\Category;
use Illuminate\Http\JsonResponse;

class ParentCategory
{
    /**
     * @return JsonResponse
    */
    public function handle($category): JsonResponse
    {
        $category = Category::where('id', $category)->value('name') ?? 'Parent Deleted';
        return response()->json($category, 200);
    }
}