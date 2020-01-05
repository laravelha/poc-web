@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('categories.show', $category))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('app.show.title', ['item' => __('categories.show', ['category' => $category->id])])</h2>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <button type="button" class="btn btn-outline-primary"
                                onclick="location.href='{{ route('categories.edit', ['category' => $category]) }}'"
                                title="@lang('app.edit.title', ['id' => $category->id])">
                            @lang('app.edit')
                        </button>
                        <button class="btn btn-outline-danger"
                                onclick="window.location='{{ route('categories.delete', ['category' => $category]) }}'"
                                title="@lang('app.delete.title', ['id' => $category->id])">
                            @lang('app.delete')
                        </button>
                    </div>
                    <div class="well">
                        <dl>
                            @foreach($category->toArray() as $key => $value)
                                <dt>@lang('categories.'.$key)</dt>
                                @if(in_array($key, $category->getDates()) && $category->$key)
                                    <dd>{{ $category->$key->format('d/m/Y H:i:s') }}</dd>
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
