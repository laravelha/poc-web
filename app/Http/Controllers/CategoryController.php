<?php

namespace App\Http\Controllers;


use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Category;

use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $columns = Category::getColumns();

        return view('categories.index', compact('columns'));
    }

    /**
     * Get a listing of the resource.
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function data()
    {
        return Category::getDatatable();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CategoryStoreRequest $request
     *
     * @return RedirectResponse
     */
    public function store(CategoryStoreRequest $request)
    {
        try {
            $category = Category::create($request->validated());
            return redirect()->route('categories.show', ['category' => $category->id])
                ->with(['type' => 'success', 'message' => __('messages.success.store', ['item' => __('categories.show', ['category' => $category->id])])]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['type' => 'danger', 'message' => __('messages.danger.store', ['item' => __('categories.moidel')])])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Category $category
     *
     * @return Factory|View
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category $category
     *
     * @return Factory|View
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage
     *
     * @param  CategoryUpdateRequest $request
     * @param  Category $category
     *
     * @return RedirectResponse
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        try {
            $category->update($request->validated());
            return redirect()->route('categories.show', ['category' => $category->id])
                ->with(['type' => 'success', 'message' => __('messages.success.update', ['item' => __('categories.show', ['category' => $category->id])])]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['type' => 'danger', 'message' => __('messages.danger.update', ['item' => __('categories.show', ['category' => $category->id])])])
                ->withInput();
        }
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  Category $category
     *
     * @return Factory|View
     */
    public function delete(Category $category)
    {
        return view('categories.delete', compact('category'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category $category
     *
     * @return RedirectResponse
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();

            return redirect()->route('categories.index')
                ->with(['type' => 'success', 'message' => __('messages.success.destroy', ['item' => __('categories.show', ['category' => $category->id])])]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['type' => 'danger', 'message' => __('messages.danger.destroy', ['item' => __('categories.show', ['category' => $category->id])])])
                ->withInput();
        }
    }
}
