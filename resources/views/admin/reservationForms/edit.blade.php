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
            <h3>Hotel Reservation Form Edit</h3>
        </div>
    </div>

    <div class="card-body">

        <form action="{{route('admin.reservation-forms.update',$reservationForm->id)}}" method="POST">
            @csrf
            @method('PUT')
        <!-- Reservation Details  -->
        <fieldset class="form-group border p-3 mt-3">
            <legend><h5 class="mx-auto my-auto">Reservation Details</h5></legend>
            <div class="row mt-2">
                <div class="form-group col-md-6 mt-2">
                    <label for="username"> {{ trans('cruds.reservationForm.fields.first_name') }}<span class="text-danger">*</span></label>
                    <input id="first_name" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" value="{{ old('first_name', $reservationForm->first_name ?? "") }}" required />
                    @if($errors->has('first_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('first_name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.reservationForm.fields.first_name_helper') }}</span>
                </div>
                <div class="form-group col-md-6 mt-2">
                    <label for="last_name"> {{ trans('cruds.reservationForm.fields.last_name') }}<span class="text-danger">*</span></label>
                    <input id="last_name" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" value="{{ old('last_name', $reservationForm->last_name?? "") }}" required />
                    @if($errors->has('last_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('last_name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.reservationForm.fields.last_name_helper') }}</span>
                </div>
                <div class="form-group col-md-6 mt-2">
                    <label for="address">{{ trans('cruds.reservationForm.fields.address') }}<span class="text-danger">*</span></label>
                    <textarea id="address" rows="1" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" required>
{{ old('address', $reservationForm->address ?? "") }}
                    </textarea>
                    @if($errors->has('address'))
                        <div class="invalid-feedback">
                            {{ $errors->first('address') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.reservationForm.fields.address_helper') }}</span>
                </div>
                <div class="form-group col-md-6 mt-2">
                    <label for="zip_code"> {{ trans('cruds.reservationForm.fields.zip_code') }}<span class="text-danger">*</span></label>
                    <input id="zip_code" class="form-control {{ $errors->has('zip_code') ? 'is-invalid' : '' }}" type="number" name="zip_code" value="{{ old('zip_code', $reservationForm->zip_code?? "") }}" required />
                    @if($errors->has('zip_code'))
                        <div class="invalid-feedback">
                            {{ $errors->first('zip_code') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.reservationForm.fields.zip_code_helper') }}</span>
                </div>
                <div class="form-group col-md-6 mt-2">
                    <label for="city">{{ trans('cruds.reservationForm.fields.city') }}<span class="text-danger">*</span></label>
                    <input id="city" class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" value="{{ old('city', $reservationForm->city?? "") }}" required />
                    @if($errors->has('city'))
                        <div class="invalid-feedback">
                            {{ $errors->first('city') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.reservationForm.fields.city_helper') }}</span>
                </div>
                <div class="form-group col-md-6 mt-2">
                    <label for="state">{{ trans('cruds.reservationForm.fields.state') }}<span class="text-danger">*</span></label>
                    <input id="state" class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}" type="text" name="state" value="{{ old('state', $reservationForm->state?? "") }}" required />
                    @if($errors->has('state'))
                        <div class="invalid-feedback">
                            {{ $errors->first('state') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.reservationForm.fields.state_helper') }}</span>
                </div>
                <div class="form-group col-md-6 mt-2">
                    <label for="email">{{ trans('cruds.reservationForm.fields.email') }}<span class="text-danger">*</span></label>
                    <input id="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" value="{{ old('email', $reservationForm->email?? "") }}" required />
                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.reservationForm.fields.email_helper') }}</span>
                </div>
                <div class="form-group col-md-6 mt-2">
                    <label for="phone">{{ trans('cruds.reservationForm.fields.phone') }}<span class="text-danger">*</span></label>
                    <input id="phone" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" value="{{ old('phone', $reservationForm->phone?? "") }}" required />
                    @if($errors->has('phone'))
                        <div class="invalid-feedback">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.reservationForm.fields.phone_helper') }}</span>
                </div>
            </div>
        </fieldset>

         <!-- Date Details  -->
         <fieldset class="form-group border p-3 mt-3">
            <legend><h5 class="mx-auto my-auto">Date</h5></legend>
            <div class="row mt-2">
                <div class="form-group col-md-6 mt-2">
                    <label for="check_in_date"> {{ trans('cruds.reservationForm.fields.check_in_date') }}<span class="text-danger">*</span></label>
                    <input id="check_in_date" class="form-control {{ $errors->has('check_in_date') ? 'is-invalid' : '' }}" type="date" name="check_in_date" value="{{ old('check_in_date', $reservationForm->check_in_date?date('Y-m-d',strtotime($reservationForm->check_in_date)):"") }}" required />
                    @if($errors->has('check_in_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('check_in_date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.reservationForm.fields.check_in_date_helper') }}</span>
                </div>
                <div class="form-group col-md-6 mt-2">
                    <label for="check_out_date"> {{ trans('cruds.reservationForm.fields.check_out_date') }}<span class="text-danger">*</span></label>
                    <input id="check_out_date" class="form-control {{ $errors->has('check_out_date') ? 'is-invalid' : '' }}" type="date" name="check_out_date" value="{{ old('check_out_date', $reservationForm->check_in_date?date('Y-m-d',strtotime($reservationForm->check_in_date)):"") }}" required />
                    @if($errors->has('check_out_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('check_out_date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.reservationForm.fields.check_out_date_helper') }}</span>
                </div>
                <div class="form-group col-md-6 mt-2">
                    <label for="check_in_time">{{ trans('cruds.reservationForm.fields.check_in_time') }}</label>
                    <select name="check_in_time" class="form-control {{ $errors->has('check_in_time') ? 'is-invalid' : '' }}" name="check_in_time">
                        <option value disabled {{ old('check_in_time', null) === null ? 'selected' : '' }}>Select time</option>
                        @foreach(App\Models\ReservationForm::CHECK_IN_TIME_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('check_in_time', $reservationForm->check_in_time) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('check_in_time'))
                        <div class="invalid-feedback">
                            {{ $errors->first('check_in_time') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.reservationForm.fields.check_in_time_helper') }}</span>
                </div>
                <div class="form-group col-md-6 mt-2">
                    <label for="check_out_time"> {{ trans('cruds.reservationForm.fields.check_out_time') }}</label>
                    <select name="check_out_time" class="form-control {{ $errors->has('check_out_time') ? 'is-invalid' : '' }}" name="check_out_time">
                        <option value disabled {{ old('check_out_time', null) === null ? 'selected' : '' }}>Select time</option>
                        @foreach(App\Models\ReservationForm::CHECK_OUT_TIME_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('check_out_time', $reservationForm->check_out_time) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('check_out_time'))
                        <div class="invalid-feedback">
                            {{ $errors->first('check_out_time') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.reservationForm.fields.check_out_time_helper') }}</span>
                </div>
                <div class="form-group col-md-6 mt-2">
                    <label for="num_of_adults">{{ trans('cruds.reservationForm.fields.num_of_adults') }}</label>
                    <input id="num_of_adults" class="form-control {{ $errors->has('num_of_adults') ? 'is-invalid' : '' }}" type="number" name="num_of_adults" value="{{ old('num_of_adults', $reservationForm->num_of_adults?? "") }}" />
                    @if($errors->has('num_of_adults'))
                        <div class="invalid-feedback">
                            {{ $errors->first('num_of_adults') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.reservationForm.fields.num_of_adults_helper') }}</span>
                </div>
                <div class="form-group col-md-6 mt-2">
                    <label for="num_of_children">{{ trans('cruds.reservationForm.fields.num_of_children') }}</label>
                    <input id="num_of_children" class="form-control {{ $errors->has('num_of_children') ? 'is-invalid' : '' }}" type="number" name="num_of_children" value="{{ old('num_of_children', $reservationForm->num_of_children?? "") }}" />
                    @if($errors->has('num_of_children'))
                        <div class="invalid-feedback">
                            {{ $errors->first('num_of_children') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.reservationForm.fields.num_of_children_helper') }}</span>
                </div>
                <div class="form-group col-md-12 mt-2 mt-2">
                    <label for="num_of_rooms">{{ trans('cruds.reservationForm.fields.num_of_rooms') }}</label>
                    <input id="num_of_rooms" class="form-control {{ $errors->has('num_of_rooms') ? 'is-invalid' : '' }}" type="number" name="num_of_rooms" value="{{ old('num_of_rooms', $reservationForm->num_of_rooms?? "") }}"/>
                    @if($errors->has('num_of_rooms'))
                        <div class="invalid-feedback">
                            {{ $errors->first('num_of_rooms') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.reservationForm.fields.num_of_rooms_helper') }}</span>
                </div>
                <div class="form-group col-md-12 mt-2">
                    <div class="row" id="room_type_container">
                        @foreach ($reservationForm->rooms as $room)
                        <div class="px-3 mt-3 col-md-6">
                            <fieldset class="form-group border p-3">
                                <label for="{{$room->room_name}}">{{ $room->room_name }}</label>
                            <select class="form-control" name="rooms[room_type][]" required>
                                <option value disabled>Number of children</option>
                                @foreach(App\Models\ReservationForm::ROOM_TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{$key === $room->room_type ? 'selected':''}}>{{ $label }}</option>
                                @endforeach
                            </select>
                            <input class="form-control mt-2" placeholder="Enter Room No" type="text" name="rooms[room_no][]" value="{{ $room->room_no ?? "" }}" required/>
                            </fieldset>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group col-md-12 mt-2">
                    <label for="special_instructions">{{ trans('cruds.reservationForm.fields.special_instructions') }}</label>
                    <textarea id="special_instructions" class="form-control {{ $errors->has('special_instructions') ? 'is-invalid' : '' }}" type="text" name="special_instructions">
{{ old('special_instructions', $reservationForm->special_instructions ?? "") }}
                    </textarea>
                    @if($errors->has('special_instructions'))
                        <div class="invalid-feedback">
                            {{ $errors->first('special_instructions') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.reservationForm.fields.special_instructions_helper') }}</span>
                </div>
            </div>
        </fieldset>

        <div class="form-group mt-2">
            <button class="btn btn-success" type="submit">
                {{ trans('global.save') }}
            </button>
            <a  href="{{route('admin.reservation-forms.index')}}" class="btn btn-secondary text-white ms-2">Cancel</a>
        </div>
    </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
     $('#num_of_rooms').on('input',function(event){
        let num_of_rooms = $(this).val();
        console.log(num_of_rooms);
        let html = ``;
        if(num_of_rooms>0){
            for(let i=1;i<=num_of_rooms;i++){
                html += `
                <div class="px-3 mt-3 col-md-6">
                    <fieldset class="form-group border p-3">
                        <label for="room_type_${i}">Room ${i} type</label>
                    <select class="form-control" id="room_type_${i}" name="rooms[room_type][]" required>
                        <option value disabled>Number of children</option>
                        @foreach(App\Models\ReservationForm::ROOM_TYPE_SELECT as $key => $label)
                            <option value="{{ $key }}">{{ $label }}</option>
                        @endforeach
                    </select>
                    <input class="form-control mt-2" placeholder="Enter Room No" type="text" name="rooms[room_no][]" value="" required/>
                    </fieldset>
                </div>
                `;
            }
        }

        $('#room_type_container').html(html);
    })

    $(()=>{
    var flatpickrStartDate = document.querySelector('#check_in_date');
    var flatpickrEndDate = document.querySelector('#check_out_date');

        if (flatpickrStartDate) {
        flatpickrStartDate.flatpickr({
        monthSelectorType: 'static',
        dateFormat: "Y-m-d",
        });
        }

        if (flatpickrEndDate) {
            flatpickrEndDate.flatpickr({
        monthSelectorType: 'static',
        dateFormat: "Y-m-d",
        });
        }
})

</script>
@endsection
