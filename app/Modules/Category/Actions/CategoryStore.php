<?php

namespace App\Modules\Category\Actions;

use App\Models\Category;
use App\Traits\UploadTrait;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class CategoryStore
{
    use UploadTrait;
    
    /**
     * @param CategoryRequest $request
     * @return RedirectResponse|string
    */
    public function handle($request): RedirectResponse|string
    {
        try {
            $icon = null;
            $banner = null;
            
            if($request->icon) {
                $icon = $this->uploadImageToLocal($request->icon, '/category/icon/', 'icon_');
            }

            if($request->banner) {
                $banner = $this->uploadImageToLocal($request->banner, '/category/banner/', 'banner_');
            }
            
            $category = Category::create([
                'name' => $request->name,
                'is_parent' => $request->is_parent,
                'parent_id' => $request->parent_id,
                'icon' => $icon,
                'banner' => $banner,
            ]);

            $notification = array(
                'message' => 'Category created successfully!',
                'alert-type' => 'success'
            );

        } catch (QueryException $qe) {
            Log::error($qe->getMessage());
            $notification = array(
                'message' => $qe->getMessage(),
                'alert-type' => 'error'
            );
        } catch (\Exception $e) {
            Log::error($e->getFile() . ':' . $e->getLine() . ' ' . $e->getMessage());
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
        }
        return redirect()->route('category.index')->with($notification);
    }
}