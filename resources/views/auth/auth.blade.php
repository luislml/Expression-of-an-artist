@extends('layouts.app-auth')

@section('content')

<div class="cont-auth">
    <login></login>
    {{-- @include('auth.login') --}}
    <register></register>
    {{-- @include('auth.register') --}}
    @include('auth.overlay')
</div>
    
@endsection
