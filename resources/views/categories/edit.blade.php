@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('categories.edit', $category))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('app.edit.title', ['id' => $category->id])</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('categories.update', ['category' => $category]) }}" method="post"
                          name="edit">
                        @method('patch')
                        @csrf
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="control-label">@lang('categories.title')</label>
                            <textarea id="title" class="form-control" name="title" maxlength="150" required
                                      autofocus>{{ old('title') ? old('title') : (isset($category->title) ? $category->title : '') }}</textarea>
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="control-label">@lang('categories.description')</label>
                            <textarea id="description" class="form-control" name="description" maxlength="255"
                                      autofocus>{{ old('description') ? old('description') : (isset($category->description) ? $category->description : '') }}</textarea>
                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('published_at') ? ' has-error' : '' }}">
                            <label for="published_at" class="control-label">@lang('categories.published_at')</label>
                            <input id="published_at" type="text" class="form-control" name="published_at"
                                   value="{{ old('published_at') ? old('published_at') : (isset($category->published_at) ? $category->published_at : '') }}"
                                   autofocus>
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

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">@lang('app.save')</button>
                            <button type="button" class="btn btn-outline-dark"
                                    onclick="location.href='{{ route('categories.show', ['category' => $category]) }}'">@lang('app.cancel')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
