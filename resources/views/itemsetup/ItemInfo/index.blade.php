@section('title',"Item Info")
@extends('layout.app')
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body border-bottom">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-2 mb-md-0 text-uppercase fw-medium">Item Setup > Item Master</h6>
                            <a class="btn btn-success btn-sm " href="{{url('itemInfo/create')}}"><i
                                    class="typcn typcn-plus"></i> Add New
                            </a>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive pt-3">
                            <div>
                                <form id="filterForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" id="name" name="name"
                                                       class="form-control form-control-sm"
                                                       placeholder="Enter Mjr Code For Search" aria-label="Username">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" id="email" name="email"
                                                       class="form-control form-control-sm"
                                                       placeholder="Enter Mjr Desc For Search" aria-label="Username">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <table id="usersTable" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Item Code</th>
                                    <th>Name</th>
                                    <th>Desc</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- Data will be populated by DataTables -->
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')

    <script>
        $(document).ready(function () {
            var table = $('#usersTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('itemInfo.data') }}',
                    type: 'POST',
                    data: function (d) {
                        d._token = $('input[name="_token"]').val(); // Include CSRF token
                        d.name = $('input[name="name"]').val();
                        d.email = $('input[name="email"]').val();
                    }
                },
                columns: [
                    { data: 'item_code' },
                    { data: 'name' },
                    { data: 'desc' },
                    { data: 'status' },
                    {
                        data: null,
                        render: function (data, type, row) {
                            return `
                <i class="btn btn-outline-info btn-sm edit-btn bx bxs-edit edit-btn" data-id="${row.id}"></i>
                <i class="btn btn-outline-danger btn-sm delete-btn bx bx-message-square-minus delete-btn" data-id="${row.id}"></i>
            `;
                        },
                        orderable: false,
                        searchable: false
                    }
                ],
                columnDefs: [
                    {
                        targets: 4,
                        render: function (data, type, row) {
                            return data ? new Date(data).toLocaleString('en-GB', {timeZone: 'Asia/Dhaka'}) : 'N/A';
                        }
                    }
                ],
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                pageLength: 10
            });

            $('#usersTable tbody').on('click', '.edit-btn', function () {
                var id = $(this).data('id');
                showData(id);
            });


            // Handle Delete button click
            $('#usersTable tbody').on('click', '.delete-btn', function() {
                var id = $(this).data('id');

                // Show confirmation dialog with swal version 1
                swal({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    buttons: {
                        cancel: {
                            text: "No, cancel!",
                            value: null,
                            visible: true,
                            className: "btn btn-secondary",
                            closeModal: true
                        },
                        confirm: {
                            text: "Yes, delete it!",
                            value: true,
                            visible: true,
                            className: "btn btn-danger",
                            closeModal: true
                        }
                    }
                }).then((result) => {
                    if (result) {
                        var csrf_token = $('meta[name="csrf-token"]').attr('content');

                        // Send the delete request to the server
                        $.ajax({
                            url: "{{ url('itemInfo') }}" + '/' + id,
                            type: "POST",
                            data: {
                                '_method': 'DELETE',
                                '_token': csrf_token
                            },
                            success: function(response) {
                                if (response.statusCode == 200) {
                                    swal({
                                        title: "Deleted!",
                                        text: "Your item has been deleted.",
                                        icon: "success",
                                        button: "OK"
                                    }).then(() => {
                                        // Reload the DataTable after deletion
                                        $('#usersTable').DataTable().ajax.reload();
                                    });
                                } else {
                                    swal({
                                        title: "Error",
                                        text: response.message || "An error occurred while deleting the item.",
                                        icon: "error",
                                        button: "OK"
                                    });
                                }
                            },
                            error: function(xhr) {
                                swal({
                                    title: "Error",
                                    text: "Delete failed: " + xhr.responseText,
                                    icon: "error",
                                    button: "OK"
                                });
                            }
                        });
                    }
                });
            });

            $('#name, #email').on('change keyup', function () {
                table.draw(); // Reload DataTable with new filters
            });

        });
        function showData(id) {
            var url = "{{ route('itemInfo.edit', ':id') }}";
            url = url.replace(':id', id);
            window.location.href = url;
        }
    </script>
@endsection
