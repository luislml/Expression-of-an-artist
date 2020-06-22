@extends('layouts.app')

@section('content')

{{-- <div class="parallax-window a-border" data-parallax="scroll" data-image-src="{{ asset('images/slider.jpg') }}">
</div> --}}

{{-- Main banner --}}

{{-- data-interval="false" --}}
<div id="slider_banner" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#slider_banner" data-slide-to="0" class="active"></li>
        <li data-target="#slider_banner" data-slide-to="1"></li>
        <li data-target="#slider_banner" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">

        <div class="carousel-item active">
            <div class="c-banner d-flex align-items-center justify-content-center" style="background-image: url({{ asset('images/slider.jpg') }})">
                <div class="c-animate">
                    <div class="animate__animated animate__bounceInLeft animate__delay-1s">
                        <div class="float-triangle"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h4 class="animate__animated animate__rollIn animate__delay-1s">
                                Amantes del <span>arte</span>
                            </h4>
                            <h1 class="animate__animated animate__backInLeft">ART GALLERY</h1>
                        </div>
                        <div class="col-md-6">
                            <div class="animate-top">
                                <img class="animate__animated animate__zoomInDown animate__delay-1s img-fluid" src="{{ asset('images/slider.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c-animate2">
                    <div class="float-rectangle animate__animated animate__rotateInUpLeft animate__delay-2s"></div>
                </div>
            </div>
        </div>

        <div class="carousel-item">
            <div class="c-banner d-flex align-items-center justify-content-center" style="background-image: url({{ asset('images/blog-img1.jpg') }})">
                <div class="c-animate">
                    <div class="animate__animated animate__bounceInLeft animate__delay-1s">
                        <div class="float-triangle" style="background: #e7aa21;"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h4 class="animate__animated animate__rollIn animate__delay-1s">
                                Amantes del <span>arte</span>
                            </h4>
                            <h1 class="animate__animated animate__backInLeft">ART GALLERY</h1>
                        </div>
                        <div class="col-md-6">
                            <div class="animate-top">
                                <img class="animate__animated animate__zoomInDown animate__delay-1s img-fluid" src="{{ asset('images/blog-img1.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c-animate2">
                    <div class="float-rectangle animate__animated animate__rotateInUpLeft animate__delay-2s"></div>
                </div>
            </div>
        </div>

        <div class="carousel-item">
            <div class="c-banner d-flex align-items-center justify-content-center" style="background-image: url({{ asset('images/blog-img2.jpg') }})">
                <div class="c-animate">
                    <div class="animate__animated animate__bounceInLeft animate__delay-1s">
                        <div class="float-triangle" style="background: rgb(4, 124, 203);"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h4 class="animate__animated animate__rollIn animate__delay-1s">
                                Amantes del <span>arte</span>
                            </h4>
                            <h1 class="animate__animated animate__backInLeft">ART GALLERY</h1>
                        </div>
                        <div class="col-md-6">
                            <div class="animate-top">
                                <img class="animate__animated animate__zoomInDown animate__delay-1s img-fluid" src="{{ asset('images/blog-img2.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c-animate2">
                    <div class="float-rectangle animate__animated animate__rotateInUpLeft animate__delay-2s"></div>
                </div>
            </div>
        </div>

    </div>
    <a class="carousel-control-prev" href="#slider_banner" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#slider_banner" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<div class="bg-dark py-5">
    {{-- <img class="c-img animate-top-xs img-fluid" src="{{ asset('images/pngwing.png') }}" alt=""> --}}

    <div class="container">
        <div class="main-title text-center">
            <h2>PORTFOLIO</h2>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do </p>
        </div>
        
        <div class="text-center">
            <a href="javascript:;" class="btn btn-primary on">
                All
            </a>
            <a href="javascript:;" class="btn btn-primary">
                Nature
            </a>
            <a href="javascript:;" class="btn btn-primary">
                Street
            </a>
            <a href="javascript:;" class="btn btn-primary">
                Street
            </a>
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <h2 class="text-info">Galeria</h2>
    </div>
</div>

<div class="bg-dark py-5">
    <div class="container">
        <div class="main-title text-center">
            <h2>Blog</h2>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do </p>
        </div>
    </div>
</div>

<div class="bg-dark">
    <div class="row no-gutters">
        <div class="col-md-6">
            <div id="slider1" class="c-carousel carousel slide" data-interval="false" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('images/blog-img1.jpg') }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('images/blog-img2.jpg') }}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('images/blog-img3.jpg') }}" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#slider1" role="button" data-slide="prev">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                </a>
                <a class="carousel-control-next" href="#slider1" role="button" data-slide="next">
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="col-md-6 d-flex align-items-center">
            <div class="p-4 text-center c-details">
                <h3>Acrylic</h3>
                <p><b>Acrylic painting</b>, technique in which pigments are mixed with hot, liquid wax. After all of the colours have been applied to the painting surface, a heating element is passed over them until the individual brush or spatula marks fuse into a uniform film.</p>
                <a href="javascript:;" class="btn btn-primary small">
                    View gallery
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>

        <div class="col-md-6 d-flex align-items-center">
            <div class="p-4 text-center c-details">
                <h3>Acrylic</h3>
                <p><b>Acrylic painting</b>, technique in which pigments are mixed with hot, liquid wax. After all of the colours have been applied to the painting surface, a heating element is passed over them until the individual brush or spatula marks fuse into a uniform film.</p>
                <a href="javascript:;" class="btn btn-primary small">
                    View gallery
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="col-md-6">
            <div id="slider2" class="c-carousel carousel slide" data-interval="false" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('images/blog-img1.jpg') }}" alt="First slide">
                    </div>
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('images/blog-img2.jpg') }}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('images/blog-img3.jpg') }}" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#slider2" role="button" data-slide="prev">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                </a>
                <a class="carousel-control-next" href="#slider2" role="button" data-slide="next">
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>

        <div class="col-md-6">
            <div id="slider3" class="c-carousel carousel slide" data-interval="false" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('images/blog-img1.jpg') }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('images/blog-img2.jpg') }}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('images/blog-img3.jpg') }}" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#slider3" role="button" data-slide="prev">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                </a>
                <a class="carousel-control-next" href="#slider3" role="button" data-slide="next">
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="col-md-6 d-flex align-items-center">
            <div class="p-4 text-center c-details">
                <h3>Acrylic</h3>
                <p><b>Acrylic painting</b>, technique in which pigments are mixed with hot, liquid wax. After all of the colours have been applied to the painting surface, a heating element is passed over them until the individual brush or spatula marks fuse into a uniform film.</p>
                <a href="javascript:;" class="btn btn-primary small">
                    View gallery
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>

        <div class="col-md-6 d-flex align-items-center">
            <div class="p-4 text-center c-details">
                <h3>Acrylic</h3>
                <p><b>Acrylic painting</b>, technique in which pigments are mixed with hot, liquid wax. After all of the colours have been applied to the painting surface, a heating element is passed over them until the individual brush or spatula marks fuse into a uniform film.</p>
                <a href="javascript:;" class="btn btn-primary small">
                    View gallery
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="col-md-6">
            <div id="slider4" class="c-carousel carousel slide" data-interval="false" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('images/blog-img1.jpg') }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('images/blog-img2.jpg') }}" alt="Second slide">
                    </div>
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('images/slider.jpg') }}" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#slider4" role="button" data-slide="prev">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                </a>
                <a class="carousel-control-next" href="#slider4" role="button" data-slide="next">
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="bg-dark py-5">
    <div class="container">
        <div class="main-title text-center">
            <h2>About me</h2>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do </p>
        </div>
    </div>
</div>
<div class="bg-dark pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img class="img-fluid" src="{{ asset('images/about.png') }}" alt="about">
            </div>
            <div class="col-md-6">
                <h3>A LITTLE INTRO</h3>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                
                <h3>MY EXHIBITIONS</h3>
                <p class="mb-5">Sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor quis nostrud exercitation ullamco</p>

                <h3>NEWSLETTER</h3>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
            </div>
        </div>
    </div>
</div>

<div class="bg-dark py-5">
    <div class="container">
        <div class="main-title text-center">
            <h2>CONTACT</h2>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do </p>
        </div>
    </div>
</div>
<div class="bg-dark pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>Get in Touch</h3>
                <form novalidate="novalidate">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input class="form-control" type="text" required="" name="txtname" title="Enter your Name" placeholder="Name *">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input class="form-control" type="email" required="" autocomplete="off" name="txtemail" title="Enter your valid id" placeholder="Email *">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input class="form-control" type="text" autocomplete="off" placeholder="Website">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <textarea class="form-control" required="" rows="3" cols="5" name="txtmessage" title="Enter your Message" placeholder="Message *"></textarea>
                    </div>
                    
                    <button type="submit" name="submit" class="btn btn-primary">
                        Send
                    </button>
                </form>
            </div>
            <div class="col-md-4">
                <h5>LONDON OFFICE</h5>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
    // code
</script>
@endsection
