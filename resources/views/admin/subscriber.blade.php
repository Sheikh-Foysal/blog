@extends('layouts.backend.app')

@section('title', 'Subscriber')

@push('css')
    <link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endpush

@section('content')

<div class="container-fluid">

    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        ALL SUBSCRIBERS 
                        <span class="badge bg-blue">{{ $subscribers->count() }}</span>
                    </h2>
                    
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($subscribers as $key=>$subscriber)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $subscriber->email }}</td>
                                    <td>{{ $subscriber->created_at }}</td>
                                    <td>{{ $subscriber->updated_at }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-danger waves-effect" type="button" onclick="SubscriberTag({{ $subscriber->id }})">
                                            <i class="material-icons">delete</i>
                                        </button>

                                        <form id="subscriber-form-{{$subscriber->id}}" action="{{ route('admin.subscriber.destroy', $subscriber->id) }}" method="post" style="display:none;">
                                        @csrf 
                                        @method('DELETE')
                                        </form>
                                        
{{-- 
                                            <a href=""  onclick=
                                            
                                            "
                                              if(confirm('Are you want to delete this?'))
                                              {
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$tag->id}}').submit();
                                              }else{
                                                event.preventDefault();
                                              }
                                            "
                                            
                                            class="btn btn-danger waves-effect" id="deleteTag({{ $tag->id }})"><i class="material-icons">delete</i></a> --}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Exportable Table -->
</div>
@endsection

@push('js')

<script src="{{ asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/pages/tables/jquery-datatable.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.1/dist/sweetalert2.all.min.js"></script>

<script type="text/javascript">
    function SubscriberTag(id){
        const swalWithBootstrapButtons = swal.mixin({
  confirmButtonClass: 'btn btn-success',
  cancelButtonClass: 'btn btn-danger',
  buttonsStyling: false,
})

swalWithBootstrapButtons({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
    event.preventDefault();
    document.getElementById('subscriber-form-'+id).submit();
  } else if (
    // Read more about handling dismissals
    result.dismiss === swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    )
  }
})
    }
</script>
@endpush