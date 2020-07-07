@extends('layouts.app')

@section('content')

<v-carousel
    cycle
    hide-delimiter-background
    show-arrows-on-hover
>
    <v-carousel-item>
        <div class="c-banner d-flex justify-center align-center" style="height: 100%; background-image: url({{ asset('images/slider.jpg') }})">
            <div class="c-animate">
                <div class="animate__animated animate__bounceInLeft animate__delay-1s">
                    <div class="float-triangle"></div>
                </div>
            </div>
            <div class="container">
                <v-row justify="center">
                    <v-col
                        cols="6"
                    >
                        <h4 class="animate__animated animate__rollIn animate__delay-1s">
                            Amantes del <span>arte</span>
                        </h4>
                        <h1 class="animate__animated animate__backInLeft">ART GALLERY</h1>
                    </v-col>

                    <v-col
                        cols="6"
                    >
                        <div class="animate-top">
                            <v-img src="{{ asset('images/slider.jpg') }}" class="animate__animated animate__zoomInDown animate__delay-1s"></v-img>
                        </div>
                    </v-col>
                </v-row>
                
            </div>
        </div>
    </v-carousel-item>

    <v-carousel-item>
        <div class="c-banner d-flex justify-center align-center" style="height: 100%; background-image: url({{ asset('images/blog-img1.jpg') }})">
            <div class="c-animate">
                <div class="animate__animated animate__bounceInLeft animate__delay-1s">
                    <div class="float-triangle" style="background: #e7aa21;"></div>
                </div>
            </div>
            <div class="container">
                <v-row justify="center">
                    <v-col
                        cols="6"
                    >
                        <h4 class="animate__animated animate__rollIn animate__delay-1s">
                            Amantes del <span>arte</span>
                        </h4>
                        <h1 class="animate__animated animate__backInLeft">ART GALLERY</h1>
                    </v-col>

                    <v-col
                        cols="6"
                    >
                        <div class="animate-top">
                            <v-img src="{{ asset('images/blog-img1.jpg') }}" class="animate__animated animate__zoomInDown animate__delay-1s"></v-img>
                        </div>
                    </v-col>
                </v-row>
                
            </div>
        </div>
    </v-carousel-item>

    <v-carousel-item>
        <div class="c-banner d-flex justify-center align-center" style="height: 100%; background-image: url({{ asset('images/blog-img2.jpg') }})">
            <div class="c-animate">
                <div class="animate__animated animate__bounceInLeft animate__delay-1s">
                    <div class="float-triangle" style="background: rgb(4, 124, 203);"></div>
                </div>
            </div>
            <div class="container">
                <v-row justify="center">
                    <v-col
                        cols="6"
                    >
                        <h4 class="animate__animated animate__rollIn animate__delay-1s">
                            Amantes del <span>arte</span>
                        </h4>
                        <h1 class="animate__animated animate__backInLeft">ART GALLERY</h1>
                    </v-col>

                    <v-col
                        cols="6"
                    >
                        <div class="animate-top">
                            <v-img src="{{ asset('images/blog-img2.jpg') }}" class="animate__animated animate__zoomInDown animate__delay-1s"></v-img>
                        </div>
                    </v-col>
                </v-row>
                
            </div>
        </div>
    </v-carousel-item>
</v-carousel>

<v-container>
    <v-row dense>
        <v-col
        :cols="12"
        >
            <v-card>
                <v-img
                    src="https://cdn.vuetifyjs.com/images/cards/house.jpg"
                    class="white--text align-end"
                    gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
                    height="200px"
                    >
                    <v-card-title>Pre-fab homes</v-card-title>
                </v-img>

                <v-card-actions>
                    <v-spacer></v-spacer>

                    <v-btn icon>
                        <v-icon>mdi-heart</v-icon>
                    </v-btn>

                    <v-btn icon>
                        <v-icon>mdi-bookmark</v-icon>
                    </v-btn>

                    <v-btn icon>
                        <v-icon>mdi-share-variant</v-icon>
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-col>
        <v-col
        :cols="6"
        >
            <v-card>
                <v-img
                    src="https://cdn.vuetifyjs.com/images/cards/house.jpg"
                    class="white--text align-end"
                    gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
                    height="200px"
                    >
                    <v-card-title>Pre-fab homes</v-card-title>
                </v-img>

                <v-card-actions>
                    <v-spacer></v-spacer>

                    <v-btn icon>
                        <v-icon>mdi-heart</v-icon>
                    </v-btn>

                    <v-btn icon>
                        <v-icon>mdi-bookmark</v-icon>
                    </v-btn>

                    <v-btn icon>
                        <v-icon>mdi-share-variant</v-icon>
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-col>
        <v-col
        :cols="6"
        >
            <v-card>
                <v-img
                    src="https://cdn.vuetifyjs.com/images/cards/house.jpg"
                    class="white--text align-end"
                    gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
                    height="200px"
                    >
                    <v-card-title>Pre-fab homes</v-card-title>
                </v-img>

                <v-card-actions>
                    <v-spacer></v-spacer>

                    <v-btn icon>
                        <v-icon>mdi-heart</v-icon>
                    </v-btn>

                    <v-btn icon>
                        <v-icon>mdi-bookmark</v-icon>
                    </v-btn>

                    <v-btn icon>
                        <v-icon>mdi-share-variant</v-icon>
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-col>
    </v-row>
</v-container>

@endsection

@section('scripts')
<script type="text/javascript">
    // code
</script>
@endsection
