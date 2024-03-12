<?php

namespace App\Modules\Blog\Actions;

use App\Models\Blog;
use App\Traits\UploadTrait;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class StoreBlog
{
    use UploadTrait;

    /**
     * @param $request
     * @param $model
     * @return RedirectResponse
    */
    public function handle($request, $model): RedirectResponse
    {
        try {
            $image = null;

            if($request->image) {
                $image = $this->uploadImageToLocal($request->image, '/blog/image/', 'blog_');
            }

            Blog::create([
                'category_id' => $request->category_id,
                'slug' => Str::slug($request->title),
                'title' => $request->title,
                'body' => $request->body,
                'image' => $image,
                'created_by' => Auth::user()->id,
            ]);

            $notification = array(
                'message' => 'Blog created successfully!',
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
        return redirect()->route('blog.index')->with($notification);
    }
}