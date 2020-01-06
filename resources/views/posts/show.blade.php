@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('posts.show', $post))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('app.show.title', ['item' => __('posts.show', ['post' => $post->id])])</h2>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <button type="button" class="btn btn-outline-primary"
                                onclick="location.href='{{ route('posts.edit', ['post' => $post]) }}'"
                                title="@lang('app.edit.title', ['id' => $post->id])">
                            @lang('app.edit')
                        </button>
                        <button class="btn btn-outline-danger"
                                onclick="window.location='{{ route('posts.delete', ['post' => $post]) }}'"
                                title="@lang('app.delete.title', ['id' => $post->id])">
                            @lang('app.delete')
                        </button>
                    </div>
                    <div class="well">
                        <dl>
                            @foreach($post->toArray() as $key => $value)
                                <dt>@lang('posts.'.$key)</dt>
                                @if(in_array($key, $post->getDates()) && $post->$key)
                                    <dd>{{ $post->$key->format('d/m/Y H:i:s') }}</dd>
                                @else
                                    <dd>{{ $value }}</dd>
                                @endif
                            @endforeach
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
