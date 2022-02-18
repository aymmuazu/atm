@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Input your Parameters') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="media border mb-3 p-3">
                        <img src="/img/user.png" alt="{{auth()->user()->name}}" class="mr-3 mt-0 rounded-circle" style="width:70px;">
                        <div class="media-body">
                            <h4>{{auth()->user()->name}} <small>
                                <i style="font-size: 12px;">Joined {{auth()->user()->created_at->diffForHumans()}}</i>
                                </small>
                            </h4>
                            <p style="float: right">
                                <br>
                                <a class="btn btn-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                
                            </p>
                            <p>{{auth()->user()->email}}
                            </p>
                        </div>
                      </div>

                    <form>
                        <div class="form-group row">
                            <label for="long" class="col-md-4 col-form-label text-md-right">{{ __('Your Current Longitude') }}</label>

                            <div class="col-md-6">
                                <input id="long" type="text" class="form-control @error('long') is-invalid @enderror" name="long" value="{{ old('long') }}" required>

                                @error('long')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lati" class="col-md-4 col-form-label text-md-right">{{ __('Your Current Latitude') }}</label>

                            <div class="col-md-6">
                                <input id="lati" type="text" class="form-control @error('lati') is-invalid @enderror" name="lati" required>

                                @error('lati')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="button" onclick="myFunction()" class="btn btn-primary">
                                    {{ __('Checkout') }}
                                </button>
                             </div>
                        </div>
                        <p></p>
                        Dont' know my Longitude and Latitude? <a href="{{route('parameters')}}">Click here</a>                        
                    </form>

                    <script>

                        function myFunction() {
                          var long = document.getElementById('long').value;
                          var lati = document.getElementById('lati').value;

                          if(long == "")
                          {
                              alert('Longitude field is required');
                              return false;

                          }else if(lati == "")
                          {
                              alert('Latitude field are required');
                              return false;
                          }


                          localStorage.setItem("long", long);
                          localStorage.setItem("lati", lati);
                      
                          window.location.href = "/user/map";
                        }
                      </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
