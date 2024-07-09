@extends('layouts.app')
@section('content')
    <style>
        .c-app {
            background: #0a1930 !important;
        }
    </style>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="" style="text-align: center">
                <img style="width:200px" class="img" src="{{asset('img/logo-white.png')}}">
            </div>
            <div class="card mx-4">
                <div class="card-body p-4">

                    <p class="text-muted">{{ trans('global.reset_password') }}</p>

                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email') }}">

                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-flat btn-block">
                                    {{ trans('global.send_password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
