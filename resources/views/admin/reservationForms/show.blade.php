@extends('layouts.admin')

@section('styles')
<style>
    .admin-banner {
    background-color: #89daff;
    height: 50px;
}
    fieldset{
        position: relative;
    }
    legend{
        position: absolute;
        top:-10px;
        background: white;
        width: fit-content;
    }
</style>
@endsection
@section('content')

<div class="card">
    <div class="card-header">
        <div class="admin-banner text-center pt-2" >
            <h3>Hotel Reservation Form</h3>
        </div>
    </div>

    <div class="card-body">
        <!-- Reservation Details  -->
        <fieldset class="form-group border p-3 mt-3">
            <legend><h5 class="mx-auto my-auto">Reservation Details</h5></legend>
            <div class="row mt-2">
                <div class="form-group col-md-6">
                    <label for="username"> {{ trans('cruds.reservationForm.fields.first_name') }}</label>
                    <p>{{$reservationForm->first_name ?? ""}}</p>
                </div>
                <div class="form-group col-md-6">
                    <label for="last_name"> {{ trans('cruds.reservationForm.fields.last_name') }}</label>
                    <p>{{$reservationForm->last_name ?? ""}}</p>
                </div>
                <div class="form-group col-md-6">
                    <label for="address">{{ trans('cruds.reservationForm.fields.address') }}</label>
                    <p>{{$reservationForm->address ?? ""}}</p>
                </div>
                <div class="form-group col-md-6">
                    <label for="zip_code"> {{ trans('cruds.reservationForm.fields.zip_code') }}</label>
                    <p>{{$reservationForm->zip_code ?? ""}}</p>
                </div>
                <div class="form-group col-md-6">
                    <label for="city">{{ trans('cruds.reservationForm.fields.city') }}</label>
                    <p>{{$reservationForm->city ?? ""}}</p>
                </div>
                <div class="form-group col-md-6">
                    <label for="state">{{ trans('cruds.reservationForm.fields.state') }}</label>
                    <p>{{$reservationForm->state ?? ""}}</p>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">{{ trans('cruds.reservationForm.fields.email') }}</label>
                    <p>{{$reservationForm->email ?? ""}}</p>
                </div>
                <div class="form-group col-md-6">
                    <label for="phone">{{ trans('cruds.reservationForm.fields.phone') }}</label>
                    <p>{{$reservationForm->phone ?? ""}}</p>
                </div>
            </div>
        </fieldset>

         <!-- Date Details  -->
         <fieldset class="form-group border p-3 mt-3">
            <legend><h5 class="mx-auto my-auto">Date</h5></legend>
            <div class="row mt-2">
                <div class="form-group col-md-6">
                    <label for="check_in_date"> {{ trans('cruds.reservationForm.fields.check_in_date') }}</label>
                    <p>{{$reservationForm->check_in_date ? date('d-m-Y',strtotime($reservationForm->check_in_date)):""}}</p>
                </div>
                <div class="form-group col-md-6">
                    <label for="check_out_date"> {{ trans('cruds.reservationForm.fields.check_out_date') }}</label>
                    <p>{{$reservationForm->check_out_date ? date('d-m-Y',strtotime($reservationForm->check_out_date)):""}}</p>
                </div>
                <div class="form-group col-md-6">
                    <label for="check_in_time">{{ trans('cruds.reservationForm.fields.check_in_time') }}</label>
                    <p>{{ App\Models\ReservationForm::CHECK_IN_TIME_SELECT[$reservationForm->check_in_time] ?? '' }}</p>
                </div>
                <div class="form-group col-md-6">
                    <label for="check_out_time"> {{ trans('cruds.reservationForm.fields.check_out_time') }}</label>
                    <p>{{ App\Models\ReservationForm::CHECK_OUT_TIME_SELECT[$reservationForm->check_out_time] ?? '' }}</p>
                </div>
                <div class="form-group col-md-6">
                    <label for="num_of_adults">{{ trans('cruds.reservationForm.fields.num_of_adults') }}</label>
                    <p>{{$reservationForm->num_of_adults ?? ""}}</p>
                </div>
                <div class="form-group col-md-6">
                    <label for="num_of_children">{{ trans('cruds.reservationForm.fields.num_of_children') }}</label>
                    <p>{{$reservationForm->num_of_children ?? ""}}</p>
                </div>
                <div class="form-group col-md-12">
                    <label for="num_of_rooms">{{ trans('cruds.reservationForm.fields.num_of_rooms') }}</label>
                    <p>{{$reservationForm->num_of_rooms ?? ""}}</p>
                </div>
                <div class="form-group col-md-12">
                    <div class="row">
                        @foreach ($reservationForm->rooms as $room)
                        <div class="form-group col-md-6">
                            <label for="{{$room->room_name}}">{{ $room->room_name }}</label>
                            <p>
                                <span class="badge rounded-pill bg-primary">{{$room->room_type ?? ""}}</span>
                                @if ($room->room_no)
                                <span class="badge rounded-pill bg-info">Room - {{$room->room_no ?? ""}}</span>
                                @endif
                            </p>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="special_instructions">{{ trans('cruds.reservationForm.fields.special_instructions') }}</label>
                    <p>{{$reservationForm->special_instructions ?? ""}}</p>
                </div>
            </div>
        </fieldset>

        <div class="my-3">
            <a href="{{route('admin.reservation-forms.index')}}" class="btn btn-secondary text-white">Cancel</a>
        </div>

    </div>
</div>



@endsection
