<?php

namespace App\Modules\Category\Actions;

use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class CategoryDelete
{
    /**
     * @param CategoryRequest $request
     * @return JsonResponse
    */
    public function handle($request): JsonResponse
    {
        try {
            Category::find($request->id)->delete();

            $notification = [
                'msg'       => "Category deleted successfully.",
                'status'    => 'success'
            ];
        }  catch (QueryException $qe) {
            Log::error($qe->getMessage());

            $notification = [
                'msg'       => "Operation Failed!",
                'status'    => 'error'
            ];
        } catch (\Exception $e) {
            Log::error($e->getFile() . ':' . $e->getLine() . ' ' . $e->getMessage());
            $notification = [
                'msg'       => "Operation Failed!",
                'status'    => 'error'
            ];
        }
        return response()->json($notification);
    }
}
