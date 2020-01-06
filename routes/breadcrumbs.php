<?php

use \Illuminate\Support\Facades\Lang;

Breadcrumbs::for('index', function ($breadcrumbs) {
    $breadcrumbs->push(Lang::get('app.index'), route('index'));
});

Breadcrumbs::for('home', function ($breadcrumbs) {
    $breadcrumbs->push(Lang::get('app.home'), route('home'));
});

Breadcrumbs::for('login', function ($breadcrumbs) {
    $breadcrumbs->push(Lang::get('login'), route('login'));
});

Breadcrumbs::for('logout', function ($breadcrumbs) {
    $breadcrumbs->push(Lang::get('logout'), route('logout'));
});

Breadcrumbs::for('register', function ($breadcrumbs) {
    $breadcrumbs->push(Lang::get('register'), route('register'));
});

Breadcrumbs::for('password.confirm', function ($breadcrumbs) {
    $breadcrumbs->push(Lang::get('password.confirm'), route('password.confirm'));
});

Breadcrumbs::for('password.email', function ($breadcrumbs) {
    $breadcrumbs->push(Lang::get('password.email'), route('password.email'));
});

Breadcrumbs::for('password.reset', function ($breadcrumbs) {
    $breadcrumbs->push(Lang::get('password.reset'), route('password.reset'));
});

Breadcrumbs::for('categories.index', function ($breadcrumbs) {
   $breadcrumbs->push(Lang::get('categories.index'), route('categories.index'));
});

Breadcrumbs::for('categories.create', function ($breadcrumbs) {
   $breadcrumbs->parent('categories.index');
   $breadcrumbs->push(Lang::get('categories.create'), route('categories.create'));
});

Breadcrumbs::for('categories.show', function ($breadcrumbs, $category) {
   $breadcrumbs->parent('categories.index');
   $breadcrumbs->push(Lang::get('categories.show', ['category' => $category->id]), route('categories.show', $category->id));
});

Breadcrumbs::for('categories.edit', function ($breadcrumbs, $category) {
   $breadcrumbs->parent('categories.show', $category);
   $breadcrumbs->push(Lang::get('categories.edit', ['category' => $category->id]), route('categories.edit', $category->id));
});

Breadcrumbs::for('categories.delete', function ($breadcrumbs, $category) {
   $breadcrumbs->parent('categories.show', $category);
   $breadcrumbs->push(Lang::get('categories.delete', ['category' => $category->id]), route('categories.delete', $category->id));
});

Breadcrumbs::for('posts.index', function ($breadcrumbs) {
   $breadcrumbs->push(Lang::get('posts.index'), route('posts.index'));
});

Breadcrumbs::for('posts.create', function ($breadcrumbs) {
   $breadcrumbs->parent('posts.index');
   $breadcrumbs->push(Lang::get('posts.create'), route('posts.create'));
});

Breadcrumbs::for('posts.show', function ($breadcrumbs, $post) {
   $breadcrumbs->parent('posts.index');
   $breadcrumbs->push(Lang::get('posts.show', ['post' => $post->id]), route('posts.show', $post->id));
});

Breadcrumbs::for('posts.edit', function ($breadcrumbs, $post) {
   $breadcrumbs->parent('posts.show', $post);
   $breadcrumbs->push(Lang::get('posts.edit', ['post' => $post->id]), route('posts.edit', $post->id));
});

Breadcrumbs::for('posts.delete', function ($breadcrumbs, $post) {
   $breadcrumbs->parent('posts.show', $post);
   $breadcrumbs->push(Lang::get('posts.delete', ['post' => $post->id]), route('posts.delete', $post->id));
});
