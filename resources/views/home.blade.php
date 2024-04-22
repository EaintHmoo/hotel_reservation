@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card" style="min-height: 45vh;">
                    <div class="card-header">
                        Menus
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            @can('user_access')
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 my-1">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between" style="position: relative;">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="avatar">
                                                    <span class="avatar-initial bg-label-primary rounded-circle"><i
                                                            class="bx bxs-customize fs-4"></i></span>
                                                </div>
                                                <div class="card-info">
                                                    <h5 class="card-title mb-0 me-2">User</h5>
                                                    {{-- <small class="text-muted">Conversion</small> --}}
                                                </div>
                                            </div>
                                            <a href="{{ route('admin.users.index') }}" class="pt-2">
                                                <i class="bx bx-send"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endcan

                            @can('role_access')
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 my-1">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between" style="position: relative;">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="avatar">
                                                    <span class="avatar-initial bg-label-primary rounded-circle"><i
                                                            class="bx bxs-customize fs-4"></i></span>
                                                </div>
                                                <div class="card-info">
                                                    <h5 class="card-title mb-0 me-2">Role</h5>
                                                </div>
                                            </div>
                                            <a href="{{ route('admin.roles.index') }}" class="pt-2">
                                                <i class="bx bx-send"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endcan

                            @can('permission_access')
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 my-1">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between" style="position: relative;">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="avatar">
                                                    <span class="avatar-initial bg-label-primary rounded-circle"><i
                                                            class="bx bxs-customize fs-4"></i></span>
                                                </div>
                                                <div class="card-info">
                                                    <h5 class="card-title mb-0 me-2">Permission</h5>
                                                </div>
                                            </div>
                                            <a href="{{ route('admin.permissions.index') }}" class="pt-2">
                                                <i class="bx bx-send"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endcan

                            @can('form_access')
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 my-1">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between" style="position: relative;">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="avatar">
                                                    <span class="avatar-initial bg-label-primary rounded-circle"><i
                                                            class="bx bxs-customize fs-4"></i></span>
                                                </div>
                                                <div class="card-info">
                                                    <h5 class="card-title mb-0 me-2">Reservation Form</h5>
                                                </div>
                                            </div>
                                            <a href="{{ route('admin.reservation-forms.index') }}" class="pt-2">
                                                <i class="bx bx-send"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
@endsection
