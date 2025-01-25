@section('title',"Item Attribute Value")
@extends('layout.app')
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body border-bottom">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-2 mb-md-0 text-uppercase fw-medium">Item Setup > Item Attribute Value</h6>
                            <button class="btn btn-success btn-sm " type="button" onclick="showModal()"><i
                                    class="typcn typcn-plus"></i> Add New
                            </button>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive pt-3">
                            <div>
                                <form id="filterForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3 ml-1">
                                            <div class="form-group">
                                                <select class="form-select" name="SelectAttribute" id="SelectAttribute">
                                                    <option  value="">Select Attribute</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" id="name" name="name"
                                                       class="form-control form-control-sm"
                                                       placeholder="Enter Attribute For Search" aria-label="Username">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" id="email" name="email"
                                                       class="form-control form-control-sm"
                                                       placeholder="Enter Attribute Value For Search" aria-label="Username">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <table id="usersTable" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Attribute</th>
                                    <th>Attribute Value</th>
                                    <th>Status</th>
                                    <th>Create Date</th>
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

    <!-- =================================================Add Customers=========================================================== -->
    <div class="modal fade bd-example-modal-lg" id="addModal" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addRoleForm" class="row g-3" onsubmit="return false">
                        @csrf
                        <input type="hidden" name="id" id="id"/>
                        <div class="row g-1">
                            <div class="col mb-1">
                                <label class="form-label" for="name">Attribute Value Name</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Enter Code" tabindex="-1"/>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col mb-1">
                                <label class="form-label">Select Attribute</label>
                                <select class="form-select" name="attribute_id" id="attribute_id">
                                    <option  value="">Select Attribute</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col mb-1">
                                <label class="form-label">Select Status</label>
                                <select class="form-select" name="status" id="status">
                                    <option  value="">Select Status</option>
                                    <option value="A" selected>Active</option>
                                    <option value="I">InActive</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="addData()" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')

    <script>
        getMajor('Search');
        function showModal() {
            $("#addModal form")[0].reset();
            $(".modal-title").text("Add Item Attribute Value");
            $("#addModal").modal("show");
            $('#id').val('');
            getMajor('');
        }

        $(document).ready(function () {
            var table = $('#usersTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('itemAttributeValue.data') }}',
                    type: 'POST',
                    data: function (d) {
                        d._token = $('input[name="_token"]').val(); // Include CSRF token
                        d.SelectAttribute = $('#SelectAttribute').val();
                        d.name = $('input[name="name"]').val();
                        d.email = $('input[name="email"]').val();
                    }
                },
                columns: [
                    {data: 'id'},
                    {data: 'attribute'},
                    {data: 'name'},
                    {data: 'status'},
                    {data: 'create_date'},
                    {
                        data: null,
                        render: function (data, type, row) {
                            return `
                            <i class="btn btn-outline-info btn-sm edit-btn bx bxs-edit" data-id="${row.id}"></i>
                            <i class="btn btn-outline-danger btn-sm delete-btn bx bx-message-square-minus" data-id="${row.id}"></i>
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

            // Handle Update button click
            $('#usersTable tbody').on('click', '.update-btn', function () {
                var data = table.row($(this).parents('tr')).data();
                console.log('Update button clicked for:', data);
            });

            // Handle Delete button click
            $('#usersTable tbody').on('click', '.delete-btn', function() {
                var id = $(this).data('id');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        var csrf_token = $('meta[name="csrf-token"]').attr('content');

                        $.ajax({
                            url: "{{ url('itemAttributeValue') }}" + '/' + id,
                            type: "POST",
                            data: {'_method': 'DELETE', '_token': csrf_token},
                            success: function(response) {
                                if (response.statusCode == 200) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your file has been deleted.",
                                        icon: "success"
                                    });
                                } else {
                                    Swal.fire("Error occured !!");
                                }
                                $('#usersTable').DataTable().ajax.reload();
                            },
                            error: function(xhr) {
                                alert('Delete failed: ' + xhr.responseText);
                            }
                        });

                    }
                });

            });

            $('#name, #email').on('change keyup', function () {
                table.draw(); // Reload DataTable with new filters
            });
            $('#SelectAttribute').on('change', function () {
                table.draw(); // Reload DataTable with new filters
            });

        });

        function addData() {
            url = "{{ url('itemAttributeValue') }}";
            $.ajax({
                url: url,
                type: "POST",
                data: new FormData($("#addModal form")[0]),
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.statusCode == 200) {
                        Swal.fire({
                            title: "Success!",
                            text: data.statusMsg,
                            icon: "success"
                        });
                        $("#addModal form")[0].reset();
                        $("#addModal").modal("hide");
                        $('#usersTable').DataTable().ajax.reload();
                    }else if (data.statusCode == 204) {
                        showErrors(data.errors);
                    }else{
                        Swal.fire({
                            icon: "error",
                            text: data.statusMsg,
                        });

                    }
                }, error: function (data) {
                    Swal.fire({
                        text: "Internal Server Error",
                        icon: "question"
                    });
                }
            });
            return false;
        };

        function showData(id) {
            $("#addModal form")[0].reset();
            $("#addModal").modal("show");
            $("#pass").hide();

            $.ajax({
                url: "{{ url('itemAttributeValue') }}" + '/' + id,
                type: "GET",
                dataType: "JSON",
                success: function (data) {
                    $('#addModal form')[0].reset();
                    $('.modal-title').text('Update User');
                    $('#addModal').modal('show');
                    $('#id').val(data.id);
                    $('#name').val(data.name);
                    getMajor('',data.attribute_id);
                    $('#status').val(data.status);
                }, error: function () {
                    swal({
                        title: "Oops",
                        text: "Error Occured",
                        icon: "error",
                        timer: '1500'
                    });
                }
            });
            return false;
        };

        function getMajor(type,id=null) {
            var csrf_tokens = document.querySelector('meta[name="csrf-token"]').content;
            var surl = "{{ url('getAttribute') }}";
            $.ajax({
                url: surl,
                type: 'GET',
                data: {'ViewType': '', "_token": csrf_tokens},
                datatype: 'JSON',
                success: function (category) {
                    console.log("Data Get Successfully");
                    if (category != '') {
                        var markup = "<option value=''>Select Attribute</option>";
                        for (var x = 0; x < category.length; x++) {
                            markup += "<option value=" + category[x].id + ">" + category[x].id + '- ' + category[x].name + "</option>";
                        }
                        if (type=='Search'){
                            $("#SelectAttribute").html(markup).show();
                        }else{
                            $("#attribute_id").html(markup).show();
                        }
                        $('#SelectAttribute').val(id);
                    } else {
                        if (type=='Search'){
                            var markup = "<option value=''>Select Major</option>";
                            $("#SelectAttribute").html(markup).show();
                        }else{
                            var markup = "<option value=''>Select Major</option>";
                            $("#attribute_id").html(markup).show();
                        }
                    }


                }

            });
        };
    </script>
@endsection
