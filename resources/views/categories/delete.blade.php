@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('categories.delete', $category))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('app.delete.title', ['id' => $category->id])</h2>
                    <p class="lead">@lang('app.delete.question', ['item' => __('categories.show', ['category' => $category->id ])])</p>
                </div>
                <div class="card-body">
                    <div class="well">
                        <dl>
                            @foreach($category->getAttributes() as $key => $value)
                                <dt>@lang('categories.'.$key)</dt>
                                @if(in_array($key, $category->getDates()))
                                    <dd>{{ $category->$key->format('d/m/Y H:i:s') }}</dd>
                                @else
                                    <dd>{{ $value }}</dd>
                                @endif
                            @endforeach
                        </dl>
                    </div>
                    <div class="form-group">
                        <form action="{{ route('categories.destroy', ['category' => $category]) }}" method="post" name="delete">
                            @method('delete')
                            @csrf
                            <button type="button" class="btn btn-outline-dark" onclick="location.href='{{ route('categories.show', ['category' => $category]) }}'">@lang('app.cancel')</button>
                            <button type="submit" class="btn btn-primary">@lang('app.delete')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

