@extends('common.main')
@section('content')
    <div class="container mx-auto mt-4 pt-4">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2  col-md-6 offset-md-3 col-lg-4 offset-lg-4">
                <div class="login-box">

                    <div class="card">
                        <div class="card-body login-card-body">
                            <p class="login-box-msg">
                                {{ trans('global.reset_password') }}
                            </p>

                            <form method="POST" action="{{ route('password.request') }}">
                                @csrf

                                <input name="token" value="{{ $token }}" type="hidden">

                                <div>
                                    <div class="input-group mt-3 mb-2">
                                        <span class="input-group-text" id="basic-addon1">@</span>
                                        <input id="email" type="email"
                                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            name="email" value="{{ $email ?? old('email') }}" required
                                            autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}">

                                        @if ($errors->has('email'))
                                            <span class="text-danger">
                                                {{ $errors->first('email') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="input-group mt-3 mb-2">
                                        <span class="input-group-text" id="basic-addon2"><i
                                                class="fa-solid fa-key"></i></span>
                                        <input id="password" type="password"
                                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            name="password" required placeholder="{{ trans('global.login_password') }}">

                                        @if ($errors->has('password'))
                                            <span class="text-danger">
                                                {{ $errors->first('password') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="input-group mt-3 mb-2">
                                        <span class="input-group-text" id="basic-addon2"><i
                                                class="fa-solid fa-key"></i></span>
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required
                                            placeholder="{{ trans('global.login_password_confirmation') }}">
                                    </div>
                                    {{-- <div class="form-group py-2">
                                <input id="email" type="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                    value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                                    placeholder="{{ trans('global.login_email') }}">

                                @if ($errors->has('email'))
                                    <span class="text-danger">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </div> --}}
                                    {{-- <div class="form-group py-2">
                                <input id="password" type="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                    required placeholder="{{ trans('global.login_password') }}">

                                @if ($errors->has('password'))
                                    <span class="text-danger">
                                        {{ $errors->first('password') }}
                                    </span>
                                @endif
                            </div> --}}
                                    {{-- <div class="form-group py-2">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required
                                    placeholder="{{ trans('global.login_password_confirmation') }}">
                            </div> --}}
                                </div>
                                <div class="row">
                                    <div class="col-12 py-2">

                                        <button type="submit" class="btn btn-sm btn-primary btn-flat btn-block w-100">
                                            {{ trans('global.reset_password') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
