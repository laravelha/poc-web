<?php

namespace App\Http\Controllers;


use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Post;

use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Routing\Controller;

class PostController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $columns = Post::getColumns();

        return view('posts.index', compact('columns'));
    }

    /**
     * Get a listing of the resource.
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function data()
    {
        return Post::getDatatable();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PostStoreRequest $request
     *
     * @return RedirectResponse
     */
    public function store(PostStoreRequest $request)
    {
        try {
            $post = Post::create($request->validated());
            return redirect()->route('posts.show', ['post' => $post->id])
                ->with(['type' => 'success', 'message' => __('messages.success.store', ['item' => __('posts.show', ['post' => $post->id])])]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['type' => 'danger', 'message' => __('messages.danger.store', ['item' => __('posts.moidel')])])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Post $post
     *
     * @return Factory|View
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     *
     * @return Factory|View
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage
     *
     * @param  PostUpdateRequest $request
     * @param  Post $post
     *
     * @return RedirectResponse
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        try {
            $post->update($request->validated());
            return redirect()->route('posts.show', ['post' => $post->id])
                ->with(['type' => 'success', 'message' => __('messages.success.update', ['item' => __('posts.show', ['post' => $post->id])])]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['type' => 'danger', 'message' => __('messages.danger.update', ['item' => __('posts.show', ['post' => $post->id])])])
                ->withInput();
        }
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  Post $post
     *
     * @return Factory|View
     */
    public function delete(Post $post)
    {
        return view('posts.delete', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     *
     * @return RedirectResponse
     */
    public function destroy(Post $post)
    {
        try {
            $post->delete();

            return redirect()->route('posts.index')
                ->with(['type' => 'success', 'message' => __('messages.success.destroy', ['item' => __('posts.show', ['post' => $post->id])])]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['type' => 'danger', 'message' => __('messages.danger.destroy', ['item' => __('posts.show', ['post' => $post->id])])])
                ->withInput();
        }
    }
}
