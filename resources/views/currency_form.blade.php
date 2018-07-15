@extends('layout')

@if($edit_mode)
    @section('title', 'Edit currency' )
@else
    @section('title', 'Add currency' )
@endif

@section('content')

    @parent

    @if($edit_mode)
        <form role="form" method="POST" action="{{ route('currencies.update', $currency->id) }}">
            @method('PATCH')
    @else
        <form role="form" method="POST" action="{{ route('currencies.store') }}">
    @endif

        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            @if($edit_mode)
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $currency->title) }}">
            @else
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            @endif

            @if ($errors->has('title'))
                <span class="alert alert-dange">{{ $errors->first('title') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="short_name">Short Name</label>
            @if($edit_mode)
                <input type="text" class="form-control" id="short_name" name="short_name" value="{{ old('short_name', $currency->short_name) }}">
            @else
                <input type="text" class="form-control" id="short_name" name="short_name" value="{{ old('short_name') }}">
            @endif

            @if ($errors->has('short_name'))
                <span class="alert alert-dange">{{ $errors->first('short_name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            @if($edit_mode)
                <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $currency->price) }}">
            @else
                <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
            @endif

            @if ($errors->has('price'))
                <span class="alert alert-dange">{{ $errors->first('price') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="logo_url">Logo URL</label>
            @if($edit_mode)
                <input type="text" class="form-control" id="logo_url" name="logo_url" value="{{ old('logo_url', $currency->logo_url) }}">
            @else
                <input type="text" class="form-control" id="logo_url" name="logo_url" value="{{ old('logo_url') }}">
            @endif

            @if ($errors->has('logo_url'))
                <span class="alert alert-dange">{{ $errors->first('logo_url') }}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>

@endsection