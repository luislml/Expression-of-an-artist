@php
    if(auth()->user()->hasRoles(['4']) || auth()->user()->hasRoles(['3'])) {
        $layoutUse = 'layouts.app-dash';
    } else {
        $layoutUse = 'layouts.app';
    }
@endphp

@extends($layoutUse)

@section('content')

{{-- <div class="common-banner d-flex align-items-center justify-content-center" style="background-image: url({{ asset('images/blog-img1.jpg') }})">
    <div class="container">
        <div class="main-title text-center mb-0">
            <h2>Mi cuenta</h2>
        </div>
    </div>
</div>

<div class="bg-dark py-5">

    <div class="container">
        <update-account user="{{ Auth::user()->id }}" role="{{ Auth::user()->role_id }}"></update-account>
    </div>

</div> --}}

<v-container class="py-5">
    <update-account user="{{ Auth::user()->id }}" role="{{ Auth::user()->role_id }}"></update-account>
</v-container>

@endsection