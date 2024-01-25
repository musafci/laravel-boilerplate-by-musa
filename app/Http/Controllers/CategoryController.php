<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        // If needed
    }

    /**
     * @return Application|Factory|View|JsonResponse
     * @throws Exception
     */
    public function index()
    {
        $breadcrumbs = [
            'User Management'
        ];

        return view('category.index', compact('breadcrumbs'));
    }
}
