@extends('rambo::layouts.admin')

@section('content')
    @foreach ($cards as $card)
        {{ (new $card())->render() }}
    @endforeach
@endsection
