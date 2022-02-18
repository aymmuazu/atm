@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Homepage') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>
                        In developed countries the need to stop people by the road side assistance for a particular place or location is totally not called for. instead everywhere and everything is incorporated in a Google map and can easily be accessed using phones and computers with internet access, the need therefore to develop such software’s in this country is the major reason for this research work.
                    </p>
                    <div class="mb-4">
                        <img src="/img/map.png" alt="" style="width: 100%">
                    </div>
                    <div class="text-center">
                        @auth
                            <a href="{{route('dashboard')}}" class="btn btn-primary">Dashboard 💨</a>
                        @endauth
                        @guest
                            <a href="{{route('register')}}" class="btn btn-primary">Let's Get Started 👊</a>
                        @endguest
                    </div>
                    <div class="pt-5">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-center">A Research Project</h3>
                                <h5 class="text-center">By</h5>
                                <p class="card-text">
                                    <div class="row text-center">
                                        <div class="col">Abdullahi Ismail Hamza</div>
                                        <div class="col">18/127710</div>
                                    </div>
                                    <div class="row text-center">
                                        <div class="col">Ayok James</div>
                                        <div class="col">18/129009</div>
                                    </div>
                                    <div class="row text-center">
                                        <div class="col">Umar Ibrahim</div>
                                        <div class="col">18/127795</div>
                                    </div>
                                    <div class="row text-center">
                                        <div class="col">Monday Henry</div>
                                        <div class="col">18/128458</div>
                                    </div>
                                </p>
                            </div>
                          </div>
                     <div class="card">
                        <div class="card-body">
                             &copy; 20{{date('y')}} {{ config('app.name') }} Reserved.
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
