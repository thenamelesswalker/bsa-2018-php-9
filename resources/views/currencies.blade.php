@extends('layout')

@section('title', "Currency market")

@section('content')

@parent

<h1>Currency market</h1>

@if (count($currencies) > 0)

<table class="table">
    <tr>
        <th>Logo</th>
        <th>Name</th>
        <th>Short Name</th>
        <th>Price</th>
            <th>Edit</th>
            <th>Delete</th>
    </tr>
    @foreach($currencies as $currency)
    <tr>
        <td><img src="{{ $currency->logo_url }}"></td>
        <td><a href="{{ URL::route('currencies.show', $currency->id) }}">{{ $currency->title }}</a></td>
        <td>{{ $currency->short_name }}</td>
        <td>{{ $currency->price }}</td>
        @can('update', $currency)
            <td><a class="btn btn-primary edit-button" role="button" href="{{ route('currencies.edit', $currency->id) }}">Edit</a></td>
        @endcan
        @can('delete', $currency)
        <td><form method="POST" action="{{ route('currencies.destroy', $currency->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete-button">Delete</button>
            </form>
        </td>
        @endcan
    </tr>

    @endforeach

</table>

@else
    <div class="alert alert-danger" role="alert">
        No currencies
    </div>
@endif

@endsection