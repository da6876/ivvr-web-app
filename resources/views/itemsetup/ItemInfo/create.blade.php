@section('title',"Item Create")
@extends('layout.app')
@section('style')
    <style>
        .select2-container .select2-selection--single {
            height: 40px;
            line-height: 40px;

        }
        .select2-container .select2-selection--single .select2-selection__rendered {
            padding: 8px;
        }
        .select2-container {
            width: 100% !important;
        }
        .select2-container .select2-selection--single {
            border: 1.5px solid #68b664 !important;
            border-radius: 4px !important;
        }
        .select2-container .select2-dropdown {
            border: 1px solid #68b664 !important;
            border-radius: 4px !important;
        }
    </style>
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body" id="itemDataAdd">
                        <h4 class="card-title">Item Create</h4>
                        <p class="card-description">
                            Basic form elements
                        </p>
                        <form class="forms-sample">@csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mjr_id">Select Major Category</label>
                                        <select class="form-control select2" name="mjr_id" id="mjr_id">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mjr_cat_id">Select Sub Major Category</label>
                                        <select class="form-control select2" name="mjr_cat_id" id="mjr_cat_id">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mnr_id">Select Manor Category</label>
                                        <select class="form-control select2" name="mnr_id" id="mnr_id">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="measur_unit_id">Select Measurement Unit</label>
                                        <select class="form-control select2" name="measur_unit_id" id="measur_unit_id">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Item Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Item Name">
                            </div>
                            <div class="form-group">
                                <label for="desc">Item Desc</label>
                                <input type="text" class="form-control" name="desc" id="desc" placeholder="Enter Item Desc">
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="status">Status</label>
                                    <input type="text" class="form-control" name="status" id="status" placeholder="status">
                                </div>
                            </div>
                            <div class="form-group" id="itemSpack">
                                <p class="card-description">Item Speak</p>
                                <table id="usersTables" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="col-md-1"></th>
                                        <th class="col-md-3">Attributes</th>
                                        <th class="col-md-4">Attribute Value</th>
                                        <th class="col-md-4">New Attribute Value</th>
                                    </tr>
                                    </thead>
                                    <tbody id="rowsContainer">
                                    <!-- New rows will be inserted here dynamically -->
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="4">
                                            <button class="btn btn-outline-success btn-sm add-row"><i class='bx bx-plus'></i></button>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <button type="button" onclick="addData()" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- =================================================Add Customers=========================================================== -->
@endsection
@section('script')

    <script>
        var csrf_tokens = document.querySelector('meta[name="csrf-token"]').content;
        showMajor();
        function showMajor(id=null){

            var markup = "<option value=''>Select Minor</option>";
            $("#mnr_id").html(markup).show();
            var urlss = "{{ url('showItemsDropDown') }}";
            $.ajax({
                url: urlss,
                type: 'GET',
                data: {'ViewType': 'mjr', "_token": csrf_tokens},
                datatype: 'JSON',
                success: function (data) {
                    console.log("Major Data Get Successfully");
                    var category = $.parseJSON(data);
                    if (category != '') {
                        var markup = "<option value=''>Select Major Category</option>";
                        for (var x = 0; x < category.length; x++) {
                            markup += "<option value=" + category[x].mjr_code + ">" +category[x].mjr_code +' - '+ category[x].mjr_desc + "</option>";
                        }
                        $("#mjr_id").html(markup).show();
                        $('#mjr_id').val(id).trigger('change');
                    } else {
                        var markup = "<option value=''>Select Major</option>";
                        $("#mjr_id").html(markup).show();
                    }
                }
            });
            $.ajax({
                url: urlss,
                type: 'GET',
                data: {'ViewType': 'measur_unit', "_token": csrf_tokens},
                datatype: 'JSON',
                success: function (data) {
                    console.log("Measurement Unit Data Get Successfully");
                    var category = $.parseJSON(data);
                    if (category != '') {
                        var markup = "<option value=''>Select Measurement Unit</option>";
                        for (var x = 0; x < category.length; x++) {
                            markup += "<option value=" + category[x].msr_unit_code + ">" +category[x].msr_unit_code +' - '+ category[x].msr_unit_desc + "</option>";
                        }
                        $("#measur_unit_id").html(markup).show();
                        $('#measur_unit_id').val(id).trigger('change');
                    } else {
                        var markup = "<option value=''>Select Measurement</option>";
                        $("#measur_unit_id").html(markup).show();
                    }
                }
            });
        }
        $("#mjr_id").change(function () {
            var mjr_id = this.value;
            showSubMajor('',mjr_id);
            var markup = "<option value=''>Select Sub Major</option>";
            $("#mjr_cat_id").html(markup).show();
        });
        $("#mjr_cat_id").change(function () {
            var mjr_cat_id = this.value;
            var mjr_id = $('#mjr_id').val();
            showMinor('',mjr_id,mjr_cat_id);
            var markup = "<option value=''>Select Minor</option>";
            $("#mnr_id").html(markup).show();
        });
        function showSubMajor(id=null,mjr_id){
            var urlss = "{{ url('showItemsDropDown') }}";
            $.ajax({
                url: urlss,
                type: 'GET',
                data: {'ViewType': 'mjr_cat','mjr_id': mjr_id, "_token": csrf_tokens},
                datatype: 'JSON',
                success: function (data) {
                    console.log("Sub Major Data Get Successfully");
                    var category = $.parseJSON(data);
                    if (category != '') {
                        var markup = "<option value=''>Select Sub Major Category</option>";
                        for (var x = 0; x < category.length; x++) {
                            markup += "<option value=" + category[x].mjr_sub_code + ">" +category[x].mjr_sub_code +' - '+ category[x].mjr_sub_desc + "</option>";
                        }
                        $("#mjr_cat_id").html(markup).show();
                        $('#mjr_cat_id').val(id).trigger('change');
                    } else {
                        var markup = "<option value=''>Select Sub Major</option>";
                        $("#mjr_cat_id").html(markup).show();
                    }
                }
            });
        }
        function showMinor(id=null,mjr_id,mjr_cat_id){
            var urlss = "{{ url('showItemsDropDown') }}";
            $.ajax({
                url: urlss,
                type: 'GET',
                data: {'ViewType': 'mnr','mjr_id': mjr_id,'mjr_cat_id': mjr_cat_id, "_token": csrf_tokens},
                datatype: 'JSON',
                success: function (data) {
                    console.log("Minor Data Get Successfully");
                    var category = $.parseJSON(data);
                    if (category != '') {
                        var markup = "<option value=''>Select Minor Category</option>";
                        for (var x = 0; x < category.length; x++) {
                            markup += "<option value=" + category[x].mnr_code + ">" +category[x].mnr_code +' - '+ category[x].mnr_desc + "</option>";
                        }
                        $("#mnr_id").html(markup).show();
                        $('#mnr_id').val(id).trigger('change');
                    } else {
                        var markup = "<option value=''>Select Minor</option>";
                        $("#mnr_id").html(markup).show();
                    }
                }
            });
        }

    </script>
    <script>
        // Define the URL for loading the attributes and attribute values
        var urlss = "{{ url('showItemsDropDown') }}";
        var csrf_tokens = "{{ csrf_token() }}";

        // Function to load attributes into the select box
        function loadAttributes(selectElement) {
            $.ajax({
                url: urlss,
                type: 'GET',
                data: {'ViewType': 'attribute', "_token": csrf_tokens},
                datatype: 'JSON',
                success: function (data) {
                    console.log("Attribute Data Get Successfully");
                    var category = $.parseJSON(data);
                    if (category != '') {
                        var markup = "<option value=''>Select Attribute</option>";
                        for (var x = 0; x < category.length; x++) {
                            markup += "<option value=" + category[x].id + ">" + category[x].name + "</option>";
                        }
                        $(selectElement).html(markup).show();
                    } else {
                        var markup = "<option value=''>Select Attribute</option>";
                        $(selectElement).html(markup).show();
                    }
                }
            });
        }

        // Function to load attribute values based on the selected attribute
        function loadAttributeValues(attribute_id, selectElement) {
            $.ajax({
                url: urlss,
                type: 'GET',
                data: {'ViewType': 'attribute_value', 'attribute_id': attribute_id, "_token": csrf_tokens},
                datatype: 'JSON',
                success: function (data) {
                    console.log("Attribute Value Data Get Successfully");
                    var category = $.parseJSON(data);
                    if (category != '') {
                        var markup = "";
                        for (var x = 0; x < category.length; x++) {
                            markup += "<option value=" + category[x].id + ">" + category[x].name + "</option>";
                        }
                        $(selectElement).html(markup).show();
                    } else {
                        var markup = "<option value=''>No Attribute Found</option>";
                        $(selectElement).html(markup).show();
                    }
                }
            });
        }

        // When the document is ready
        $(document).ready(function() {
            // Add new row functionality
            $(document).on('click', '.add-row', function(e) {
                e.preventDefault(); // Prevent page reload

                var newRow = `
            <tr class="dynamic-row">
                <td><button class="btn btn-sm btn-outline-danger remove-row "><i class='bx bx-trash' ></i></button></td>
                <td>
                    <div class="form-group">
                        <select class="form-control select2 attribute_ids" name="attribute_ids[]">
                            <!-- This will be populated by loadAttributes() -->
                        </select>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <select class="form-control select2 attribute_value_ids" multiple="multiple" name="attribute_value_ids[]">
                            <!-- This will be populated by loadAttributeValues() -->
                        </select>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" id="newAttributeValue" name="newAttributeValue" placeholder="Attribute Value">
                            <button class="btn btn-outline-primary" type="button" id="button-addon2">Add</button>
                        </div>
                    </div>
                </td>
            </tr>`;

                // Append the new row to the table
                $('#rowsContainer').append(newRow);

                // Load attributes for the new row
                loadAttributes($('#rowsContainer .dynamic-row:last .attribute_ids'));

                // Reinitialize select2 for the new row (if you're using it for dropdown styling)
                $('#rowsContainer .dynamic-row:last .select2').select2();

                // Add functionality for the "Add" button in the new row
                $('#rowsContainer .dynamic-row:last #button-addon2').on('click', function() {
                    addAttributeValue($(this).closest('tr'));
                });
            });

            // Remove row functionality
            $(document).on('click', '.remove-row', function(e) {
                e.preventDefault(); // Prevent page reload
                if ($('#rowsContainer .dynamic-row').length > 1) {
                    $(this).closest('tr').remove();
                } else {
                    alert("At least one row must remain.");
                }
            });

            // On change of attribute select box, load respective attribute values
            $(document).on('change', '.attribute_ids', function () {
                var attribute_id = this.value;
                var row = $(this).closest('tr');
                loadAttributeValues(attribute_id, row.find('.attribute_value_ids'));
            });

            // Initial load of attributes in the first row
            loadAttributes(".attribute_ids");
        });

        // Function to add a new attribute value
        function addAttributeValue(row) {
            // Get the new attribute value from the input field in the current row
            var newAttributeValue = row.find('#newAttributeValue').val();
            var attribute_ids = row.find('.attribute_ids').val();

            if (newAttributeValue.trim() == "") {
                swal({
                    text: 'Please enter a valid attribute value.',
                    icon: 'warning',
                });
                return;
            }

            // URL for adding attribute value
            var url = "{{ url('itemAttributeValueAdd') }}";

            $.ajax({
                url: url,
                type: "POST",
                data: {
                    'attribute_ids': attribute_ids,
                    'newAttributeValue': newAttributeValue,
                    "_token": csrf_tokens
                },
                success: function (data) {
                    if (data.statusCode == 200) {
                        swal({
                            text: data.statusMsg,
                            icon: "success",
                            title: "Success!",
                        });
                        row.find('#newAttributeValue').val(''); // Clear the input field

                        // After successfully adding the attribute value, reload the attribute values for the selected attribute
                        var attribute_id = row.find('.attribute_ids').val();
                        loadAttributeValues(attribute_id, row.find('.attribute_value_ids'));
                    } else if (data.statusCode == 204) {
                        showErrors(data.errors);  // Show errors if any
                    } else {
                        swal({
                            text: data.statusMsg,
                            icon: "error",
                            timer: '3000'
                        });
                    }
                },
                error: function () {
                    swal({
                        text: "Internal Server Error",
                        icon: "error",
                        timer: '3000'
                    });
                }
            });
            return false;
        }
    </script>

    <script>
        function addData() {
            // Get form data
            var formData = new FormData($("#itemDataAdd form")[0]);

            // Get the dynamic rows (attributes)
            var attributes = [];
            $('#rowsContainer .dynamic-row').each(function() {
                var attribute_id = $(this).find('.attribute_ids').val(); // Get the selected attribute_id
                var attribute_value_ids = $(this).find('.attribute_value_ids').val(); // Get the selected attribute_value_ids as array

                if (attribute_id && attribute_value_ids) {
                    attributes.push({
                        "attribute_ids": attribute_id,
                        "attribute_value_ids": attribute_value_ids // Ensure this is an array
                    });
                }
            });

            // Append the attribute array to the form data
            formData.append("attribute", JSON.stringify(attributes));

            // Send the data via AJAX
            var url = "{{ url('itemInfo') }}";
            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.statusCode == 200) {
                        swal({
                            text: data.statusMsg,
                            title: "Success!",
                            icon: "success"
                        });
                        $("#itemDataAdd form")[0].reset(); // Reset the form
                        $('#rowsContainer').empty(); // Clear the rows container
                        $('#usersTable').DataTable().ajax.reload(); // Reload the DataTable
                    } else if (data.statusCode == 204) {
                        showErrors(data.errors); // Handle validation errors
                    } else {
                        Swal.fire({
                            icon: "error",
                            text: data.statusMsg,
                        });
                        swal({
                            text: data.statusMsg,
                            icon: "error",
                        });
                    }
                },
                error: function (data) {
                    swal({
                        text: "Internal Server Error",
                        icon: "question"
                    });
                }
            });
            return false; // Prevent default form submission
        }
    </script>
@endsection
