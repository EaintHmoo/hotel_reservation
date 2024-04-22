@extends('common.main')
@section('content')
    <div class="container mx-auto  mt-4 pt-4">
        <!-- <div class="login-box">
                                                <div class="login-logo">
                                                    <div class="login-logo">
                                                        <a href="{{ route('admin.home') }}">
                                                            {{ trans('panel.site_title') }}
                                                        </a>
                                                    </div>
                                                </div> -->
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2  col-md-6 offset-md-3 col-lg-4 offset-lg-4">
                <div class="card">
                    <div class="card-body login-card-body">
                        <p class="login-box-msg">
                            {{ trans('global.reset_password') }}
                        </p>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div>
                                <div class="input-group mt-3 mb-2">
                                    <span class="input-group-text" id="basic-addon1">@</span>
                                    <input id="email" type="email"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                        required autocomplete="email" autofocus
                                        placeholder="{{ trans('global.login_email') }}" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="text-danger">
                                            {{ $errors->first('email') }}
                                        </span>
                                    @endif
                                </div>
                                {{-- <div class="form-group">
                            <input id="email" type="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required
                                autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}"
                                value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <span class="text-danger">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                        </div> --}}
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-12 text-right py-2">
                                    <button type="submit" class="btn btn-sm btn-primary btn-flat btn-block w-100">
                                        {{ trans('global.send_password') }}
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
