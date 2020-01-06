@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('posts.edit', $post))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('app.edit.title', ['id' => $post->id])</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('posts.update', ['post' => $post]) }}" method="post" name="edit">
                        @method('patch')
                        @csrf
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    <label for="title" class="control-label">@lang('posts.title')</label>
    <textarea id="title" class="form-control" name="title" maxlength="150" required autofocus>{{ old('title') ? old('title') : (isset($post->title) ? $post->title : '') }}</textarea>
    @if ($errors->has('title'))
        <span class="help-block">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
    @endif
</div>

        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
    <label for="content" class="control-label">@lang('posts.content')</label>
    <textarea id="content" class="form-control" name="content" maxlength="255" required autofocus>{{ old('content') ? old('content') : (isset($post->content) ? $post->content : '') }}</textarea>
    @if ($errors->has('content'))
        <span class="help-block">
            <strong>{{ $errors->first('content') }}</strong>
        </span>
    @endif
</div>

        <div class="form-group{{ $errors->has('published_at') ? ' has-error' : '' }}">
    <label for="published_at" class="control-label">@lang('posts.published_at')</label>
    <input id="published_at" type="text" class="form-control" name="published_at" value="{{ old('published_at') ? old('published_at') : (isset($post->published_at) ? $post->published_at : '') }}"  autofocus>
    @if ($errors->has('published_at'))
        <span class="help-block">
            <strong>{{ $errors->first('published_at') }}</strong>
        </span>
    @endif
</div>
@push('scripts')
    <script>
        $(function () {
            $("#published_at").datepicker({
                format: 'dd/mm/yyyy',
                language: 'pt-BR'
            }).mask('00/00/0000');
        });
    </script>
@endpush

        <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
    <label for="category_id" class="control-label">@lang('posts.category_id')</label>
    <input id="category_id" type="number" class="form-control" name="category_id" value="{{ old('category_id') ? old('category_id') : (isset($post->category_id) ? $post->category_id : '') }}"   required autofocus>
    @if ($errors->has('category_id'))
        <span class="help-block">
            <strong>{{ $errors->first('category_id') }}</strong>
        </span>
    @endif
</div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">@lang('app.save')</button>
                            <button type="button" class="btn btn-outline-dark" onclick="location.href='{{ route('posts.show', ['post' => $post]) }}'">@lang('app.cancel')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
