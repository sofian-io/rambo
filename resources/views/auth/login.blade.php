@extends('rambo::layouts.auth')

@section('content')
    <div class="auth">
        <div class="auth-logo">
            <x-rambo::logo />
        </div>

        <div class="auth-form">
            <livewire:rambo-auth-login />
        </div>
    </div>
@endsection
