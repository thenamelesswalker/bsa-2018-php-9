@extends('layout')

@section('title', $currency->title )

@section('content')

    @parent
@if ($currency != null)
    <table class="table">
        <tr>
            <th>Logo</th>
            <td><img src="{{ $currency->logo_url }}"></td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $currency->title }}</td>
        </tr>
        <tr>
            <th>Short Name</th>
            <td>{{ $currency->short_name }}</td>
        </tr>
        <tr>
            <th>Price</th>
            <td>{{ $currency->price }}</td>
        </tr>

        <tr>
            @can('update', $currency)
                <td><a class="btn btn-primary edit-button" role="button"
                       href="{{ route('currencies.edit', $currency->id) }}">Edit</a></td>
            @endcan
            @can('delete', $currency)
                <td>
                    <form method="POST" action="{{ route('currencies.destroy', $currency->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-button">Delete</button>
                    </form>
                </td>
            @endcan
        </tr>

    </table>
@else
    <<div class="alert alert-danger" role="alert">
        No such currency
    </div>

@endif

@endsection