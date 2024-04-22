@extends('layouts.admin')
@section('content')
@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
<div class="card">
    <div class="custom-header d-flex justify-content-between px-4 pt-3">
        {{ trans('cruds.reservationForm.title_singular') }} {{ trans('global.list') }}

    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                <thead>
                    <tr>
                        <th>
                            {{ trans('cruds.reservationForm.fields.id') }}
                        </th>
                        <th class="text-nowrap">
                            {{ trans('cruds.reservationForm.fields.first_name') }}
                        </th>
                        <th class="text-nowrap">
                            {{ trans('cruds.reservationForm.fields.last_name') }}
                        </th>
                        <th class="text-nowrap">
                            {{ trans('cruds.reservationForm.fields.address') }}
                        </th>
                        <th class="text-nowrap">
                            {{ trans('cruds.reservationForm.fields.zip_code') }}
                        </th>
                        <th class="text-nowrap">
                            {{ trans('cruds.reservationForm.fields.city') }}
                        </th>
                        <th>
                            {{ trans('cruds.reservationForm.fields.state') }}
                        </th>
                        <th>
                            {{ trans('cruds.reservationForm.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.reservationForm.fields.phone') }}
                        </th>
                        <th class="text-nowrap">
                            {{ trans('cruds.reservationForm.fields.check_in_date') }}
                        </th>
                        <th class="text-nowrap">
                            {{ trans('cruds.reservationForm.fields.check_out_date') }}
                        </th>

                        <th>
                            {{trans('global.action')}}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservationForms as $key => $reservationForm)
                        <tr data-entry-id="{{ $reservationForm->id }}">
                            <td>
                                {{ $reservationForm->id ?? '' }}
                            </td>
                            <td>
                                {{ $reservationForm->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $reservationForm->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $reservationForm->address ?? '' }}
                            </td>
                            <td>
                                {{ $reservationForm->zip_code ?? '' }}
                            </td>
                            <td>
                                {{ $reservationForm->city ?? '' }}
                            </td>
                            <td>
                                {{ $reservationForm->state ?? '' }}
                            </td>
                            <td>
                                {{ $reservationForm->email ?? '' }}
                            </td>
                            <td>
                                {{ $reservationForm->phone ?? '' }}
                            </td>
                            <td>
                                {{$reservationForm->check_in_date ? date('d-m-Y',strtotime($reservationForm->check_in_date)):""}}
                            </td>
                            <td>
                                {{$reservationForm->check_out_date ? date('d-m-Y',strtotime($reservationForm->check_out_date)):""}}
                            </td>


                            <td class="text-nowrap">

                                    @can('form_show')
                                        <a class="p-0 glow"
                                            style="width: 26px;height: 36px;display: inline-block;line-height: 36px;color:grey;"
                                            href="{{ route('admin.reservation-forms.show', $reservationForm->id) }}">
                                            <i class='bx bx-show'></i>
                                        </a>
                                    @endcan

                                    @can('form_edit')
                                        <a class="p-0 glow"
                                            style="width: 26px;height: 36px;display: inline-block;line-height: 36px;color:grey;"
                                            href="{{ route('admin.reservation-forms.edit', $reservationForm->id) }}">
                                            <i class='bx bx-edit'></i>
                                        </a>
                                    @endcan

                                    @can('form_delete')
                                        <form id="formDelete-{{ $reservationForm->id }}"
                                            action="{{ route('admin.reservation-forms.destroy', $reservationForm->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="button"
                                                style="width: 26px;height: 36px;display: inline-block;line-height: 36px;border:none;color:grey;background:none;"
                                                class=" p-0 glow show_confirm">
                                               <i class="bx bx-trash"></i>
                                            </button>
                                        </form>
                                    @endcan
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)


  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [],
    pageLength: 100,
  });
  let table = $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

  //Delete Comfirmation
  $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
          })
        });
})

</script>
@endsection
