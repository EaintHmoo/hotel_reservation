@extends('layouts.frontend')

@section('styles')
<style>
    .admin-banner {
    background-color: #89daff;
    height: 50px;
}
    .btn-primary{
        background: #89daff;
        border: #89daff 1px;
    }
</style>
@endsection
@section('content')

<div class="w-100">
    <img src="{{asset('banner.jpg')}}" alt="view" style="width:100%;">
    <div class="centered">
        <h1 class="text-white text-uppercase">ROOMS LIST</h1>
        <p class="text-white text-center">View details for every room we have</p>
    </div>
</div>

<div class="container room mb-5">
    <div class="card mt-5 ">
        <div class="card-body mx-0 p-0">
         <div class="row">
            <div class="col-md-6 py-5 px-5">
                <h3 class="text-uppercase">Starndard Room</h3>
                <div class="d-flex justify-content-start gap-2 my-3">
                    <span class="me-2" >
                        <i class='bx bx-tv'></i>
                    </span>
                    <span class="me-2">
                        <i class='bx bx-wifi'></i>
                    </span>
                    <span class="me-2">
                        <i class='bx bx-coffee'></i>
                    </span>
                </div>
                <p>
                  Over, dominion own it above gathering their, don't won't waters bring male bearing form may rule doesn't him fish appear spirit let earth may life you'll to great Tree moveth midst a there so Blessed saw fly don't multiply, dry.le doesn't him fish appear spirit let earth may life you'll to great.
                </p>
            </div>
            <div class="col-md-6">
                <img src="{{asset('single_room.jpg')}}" class="w-100 h-100 object-cover rounded-end"/>
            </div>
         </div>
        </div>
    </div>
    <div class="card mt-5 ">
        <div class="card-body mx-0 p-0">
         <div class="row">
            <div class="col-md-6 py-5 px-5">
                <h3 class="text-uppercase">Deluxe King Suite</h3>
                <div class="d-flex justify-content-start gap-2 my-3">
                    <span class="me-2" >
                        <i class='bx bx-tv'></i>
                    </span>
                    <span class="me-2">
                        <i class='bx bx-wifi'></i>
                    </span>
                    <span class="me-2">
                        <i class='bx bx-coffee'></i>
                    </span>
                </div>
                <p>
                  Over, dominion own it above gathering their, don't won't waters bring male bearing form may rule doesn't him fish appear spirit let earth may life you'll to great Tree moveth midst a there so Blessed saw fly don't multiply, dry.le doesn't him fish appear spirit let earth may life you'll to great.
                </p>
            </div>
            <div class="col-md-6">
                <img src="{{asset('deluxe.jpg')}}" class="w-100 h-100 object-cover rounded-end"/>
            </div>
         </div>
        </div>
    </div>
    <div class="card mt-5 ">
        <div class="card-body mx-0 p-0">
         <div class="row">
            <div class="col-md-6 py-5 px-5">
                <h3 class="text-uppercase">Suite With View</h3>
                <div class="d-flex justify-content-start gap-2 my-3">
                    <span class="me-2" >
                        <i class='bx bx-tv'></i>
                    </span>
                    <span class="me-2">
                        <i class='bx bx-wifi'></i>
                    </span>
                    <span class="me-2">
                        <i class='bx bx-coffee'></i>
                    </span>
                </div>
                <p>
                  Over, dominion own it above gathering their, don't won't waters bring male bearing form may rule doesn't him fish appear spirit let earth may life you'll to great Tree moveth midst a there so Blessed saw fly don't multiply, dry.le doesn't him fish appear spirit let earth may life you'll to great.
                </p>
            </div>
            <div class="col-md-6">
                <img src="{{asset('suite.jpg')}}" class="w-100 h-100 object-cover rounded-end"/>
            </div>
         </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>

</script>
@endsection
