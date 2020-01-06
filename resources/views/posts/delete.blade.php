@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('posts.delete', $post))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('app.delete.title', ['id' => $post->id])</h2>
                    <p class="lead">@lang('app.delete.question', ['item' => __('posts.show', ['post' => $post->id ])])</p>
                </div>
                <div class="card-body">
                    <div class="well">
                        <dl>
                            @foreach($post->getAttributes() as $key => $value)
                                <dt>@lang('posts.'.$key)</dt>
                                @if(in_array($key, $post->getDates()))
                                    <dd>{{ $post->$key->format('d/m/Y H:i:s') }}</dd>
                                @else
                                    <dd>{{ $value }}</dd>
                                @endif
                            @endforeach
                        </dl>
                    </div>
                </div>
                <div class="form-group">
                    <form action="{{ route('posts.destroy', ['post' => $post]) }}" method="post" name="delete">
                        @method('delete')
                        @csrf
                        <button type="button" class="btn btn-outline-dark" onclick="location.href='{{ route('posts.show', ['post' => $post]) }}'">@lang('app.cancel')</button>
                        <button type="submit" class="btn btn-primary">@lang('app.delete')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

