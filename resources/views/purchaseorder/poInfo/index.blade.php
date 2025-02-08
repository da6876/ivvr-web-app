@section('title',"PO Info")
@extends('layout.app')
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body border-bottom">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class=""><span class="text-muted fw-light">Purchase Order /</span> PO Info</h6>
                            <a class="btn btn-success btn-sm " href="{{url('purchaseOrder/create')}}"><i
                                    class="typcn typcn-plus"></i> Add New
                            </a>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive pt-3">
                            <div>
                                <form id="filterForm" style="margin-left: 30px">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" id="name" name="name" class="form-control form-control-sm" placeholder="Enter Mjr Code For Search" aria-label="Username">
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
                                    <th>Purchase Order No</th>
                                    <th>Purchase Order Date</th>
                                    <th>LC Number</th>
                                    <th>Authorization Status</th>
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

    <div class="modal fade" id="exLargeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel4">PO Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                            <tr class="text-nowrap">
                                <th>#</th>
                                <th>Item Name</th>
                                <th>Attribute Details</th>
                                <th>Rate</th>
                                <th>Quantity</th>
                                <th>Conversion Rate</th>
                                <th>Total Amount</th>
                            </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            <!-- Dynamic rows will be appended here by JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

    <script>
        var csrf_token = $('meta[name="csrf-token"]').attr('content');

        $(document).ready(function () {
            var table = $('#usersTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('purchaseOrder.data') }}',
                    type: 'POST',
                    data: function (d) {
                        d._token = $('input[name="_token"]').val(); // Include CSRF token
                        d.name = $('input[name="name"]').val();
                    }
                },
                columns: [
                    { data: 'purchase_order_no' },
                    { data: 'purchase_order_date' },
                    { data: 'lc_number' },
                    {
                        data: 'authorization',
                        render: function (data, type, row) {
                            if(row.authorization=='Pending'){
                                return `<span class="badge bg-label-info">${row.authorization}</span>
                                <i class="btn btn-warning btn-sm bx bx-trending-up forword-btn" data-id="${row.id}"> Forword To Authorization</i>`;
                            }else{
                                return `<span class="badge bg-label-warning">${row.authorization}</span>`;
                            }

                        },
                    },
                    {
                        data: null,
                        render: function (data, type, row) {
                            if(row.authorization=='Pending'){
                                return `
                                    <button class="btn btn-outline-info btn-sm view-btn" data-id="${row.id}"><i class='bx bx-list-ul'></i> View Details</button>
                                    <i class="btn btn-outline-info btn-sm edit-btn bx bxs-edit" data-id="${row.id}"></i>
                                    <i class="btn btn-outline-danger btn-sm delete-btn bx bx-message-square-minus delete-btn" data-id="${row.id}"></i>`;
                            }else{
                                return `<button class="btn btn-outline-info btn-sm view-btn" data-id="${row.id}"><i class='bx bx-list-ul'></i> View Details</button>`;
                            }

                        },
                        orderable: false,
                        searchable: false
                    }
                ],
                columnDefs: [
                    {
                        targets: 4,
                        render: function (data, type, row) {
                            return data ? new Date(data).toLocaleString('en-GB', { timeZone: 'Asia/Dhaka' }) : 'N/A';
                        }
                    }
                ],
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                pageLength: 10,
                dom: 'rtip'
            });

            $('#usersTable tbody').on('click', '.edit-btn', function () {
                var id = $(this).data('id');
                showData(id);
            });

            $('#usersTable tbody').on('click', '.view-btn', function () {
                var id = $(this).data('id');
                showDetailsData(id);
            });

            $('#usersTable tbody').on('click', '.forword-btn', function () {
                var id = $(this).data('id');
                swal({
                    title: "Are you sure?",
                    text: "Do You Want To Forward  for Authorization !",
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
                            text: "Yes, Forward it!",
                            value: true,
                            visible: true,
                            className: "btn btn-danger",
                            closeModal: true
                        }
                    }
                }).then((result) => {
                    if (result) {
                        $.ajax({
                            url: "{{ url('ForwordToAuthorization') }}",
                            type: "GET",
                            data: {
                                'id': id,
                                '_token': csrf_token
                            },
                            success: function(response) {
                                if (response.statusCode == 200) {
                                    swal({
                                        title: "Success!",
                                        text: "Your PO has been Forward.",
                                        icon: "success",
                                        button: "OK"
                                    }).then(() => {
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

            $('#usersTable tbody').on('click', '.delete-btn', function() {
                var id = $(this).data('id');
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
                            url: "{{ url('purchaseOrder') }}" + '/' + id,
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
                table.draw();
            });

        });

        function showDetailsData(id) {
            // Show the modal
            $("#exLargeModal").modal("show");

            $.ajax({
                url: "{{ url('showDetails') }}",
                type: "GET",
                data: {'id': id, '_token': csrf_token},
                success: function(response) {
                    // Clear existing rows in the table
                    $('#exLargeModal .table tbody').empty();

                    response.forEach(function(item, index) {
                        // Split the attribute_details by commas and format each key-value pair
                        var formattedAttributeDetails = item.attribute_details.split(',').map(function(detail) {
                            var parts = detail.split(':');
                            if (parts.length === 2) {
                                return `<span class="badge bg-label-info">${parts[0].trim()}</span>: <span class="badge bg-info">${parts[1].trim()}</span>`;
                            }
                            return detail; // In case there's no `:` to split
                        }).join('<br>'); // Join the formatted parts with a <br> tag instead of a comma
                        var totalAmount = (parseFloat(item.rate) * parseFloat(item.qunty) * parseFloat(item.con_rate));
                        var row = `<tr>
                                        <th scope="row">${index + 1}</th>
                                        <td>${item.item_name}</td>
                                        <td>${formattedAttributeDetails}</td>
                                        <td>${item.rate}</td>
                                        <td>${item.qunty}</td>
                                        <td>${item.con_rate}</td>
                                        <td>${totalAmount.toFixed(2)}</td>
                                    </tr>`;
                        $('#exLargeModal .table tbody').append(row);
                    });
                },
                error: function(xhr) {
                    swal({
                        title: "Error",
                        text: "Request failed: " + xhr.responseText,
                        icon: "error",
                        button: "OK"
                    });
                }
            });

            return false;
        }

        function showData(id) {
            var url = "{{ route('purchaseOrder.edit', ':id') }}";
            url = url.replace(':id', id);
            window.location.href = url;
        }
    </script>
@endsection
