<?php

namespace App\Modules\Blog\Helper;

use App\Models\Blog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class BlogHelper
{
    protected Blog $table;
    private const NO_BLOG_FOUND = "No blog data found!";

    public function __construct(Blog $blog)
    {
        $this->table = $blog;
    }

    /**
     * @return Blog
    */
    public function modelOf(): Blog
    {
        return $this->table;
    }

    /**
     * @param int $id
     * @return mixed
    */
    public function findInstance(int $id = 0): mixed
    {
        return $this->table::find($id);
    }

    /**
     * @return RedirectResponse
     */
    public function noBlogFound(): RedirectResponse
    {
        Log::info(self::NO_BLOG_FOUND);
        $notification = array(
            'message' => self::NO_BLOG_FOUND,
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}