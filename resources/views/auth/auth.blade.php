@extends('layouts.app-auth')

@section('content')

<div class="cont-auth">
    @include('auth.login') 
    @include('auth.register')
    @include('auth.overlay')
</div>
    
@endsection
