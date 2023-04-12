@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Farm</a></li>
    <li class="breadcrumb-item active" aria-current="page">Dashboard Farm</li>
  </ol>
</nav>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <a href="{{ route('farms.create') }}" class="btn btn-sm btn-success">
              <i class="fa fa-pencil-alt"></i>
              Create Farm Data
          </a>
  </div>
</div>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Farm Name</th>
                <th>Farm Type</th>
                <th>Farm Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                @forelse ($farms as $farm)
                <tr>
                  <td><?php echo $i; ?></td>
                  <td>{{ $farm->farm_name }}</td>
                  <td>{{ $farm->farm_type}}</td>
                  <td>{{ $farm->farm_description }}</td>
                  <td class="text-center">
                      <a href="{{ route('farms.edit', $farm->id) }}"
                          class="btn btn-sm btn-primary">
                          <i class="fa fa-pencil-alt"></i>
                          Edit
                      </a>

                      <button onClick="Delete(this.id)" class="btn btn-sm btn-danger"
                          id="{{ $farm->id }}">
                          <i class="fa fa-trash"></i>
                          Delete
                      </button>
                  </td>
                </tr>
                <?php $i++; ?>
                @empty
                <tr>
                    <td class="text-center text-mute" colspan="5">Section Data Not Available</td>
                </tr>                
                @endforelse
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
  <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
  <script>
    //ajax delete
    function Delete(id) {
        var id = id;
        var token = $("meta[name='csrf-token']").attr("content");

         const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger me-2'
            },
            buttonsStyling: false,
          })
          
          swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'me-2',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
          }).then((result) => {
            if (result.value) {
              //ajax delete
                jQuery.ajax({
                    url: "/farms/" + id,
                    data: {
                        "id": id,
                        "_token": token
                    },
                    type: 'DELETE',
                    success: function (response) {
                        if (response.status == "success") {
                          swalWithBootstrapButtons.fire({
                                title: 'Deleted!',
                                text: 'Your file has been deleted.',
                                icon: 'success',
                                timer: 1000,
                                showConfirmButton: false,
                                showCancelButton: false,
                                buttons: false,
                            }).then(function () {
                                location.reload();
                            });
                        } else {
                          swalWithBootstrapButtons.fire({
                                title: 'Failed!',
                                text: 'Failed to delete this data!',
                                icon: 'error',
                                timer: 1000,
                                showConfirmButton: false,
                                showCancelButton: false,
                                buttons: false,
                            }).then(function () {
                                location.reload();
                            });
                            
                        }
                    }
                });
              
            } else if (
              // Read more about handling dismissals
              result.dismiss === Swal.DismissReason.cancel
            ) {
              swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
              )
            }
          })


    }
</script>
@endpush