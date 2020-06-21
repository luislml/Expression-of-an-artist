@extends('layouts.app-dash')

@section('content')
  <div class="bg-dark py-5">
    <div class="container">
        <div class="main-title text-center">
            <h2>ARTISTA</h2>
            <p> soy artista </p>
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
