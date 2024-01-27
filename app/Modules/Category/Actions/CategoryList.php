<?php

namespace App\Modules\Category\Actions;

use App\Models\Category;
use Exception;
use Illuminate\Http\JsonResponse;

class CategoryList {
    
    /**
     * @return JsonResponse
    */
    function handle(): JsonResponse
    {
        try {
            $categories = Category::all();
            return response()->json($categories, 200);
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Failed to fetch categories');
        }
    }
}