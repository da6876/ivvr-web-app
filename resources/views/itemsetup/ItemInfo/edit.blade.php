@section('title',"Item Edit")
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
        .loader-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999; /* Make sure it's on top */
        }
    </style>
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body" id="itemDataAdd">
                        <div class="loader-overlay" >
                            <div class="container text-center loader">
                                <div class="spinner-grow text-muted"></div>
                                <div class="spinner-grow text-primary"></div>
                                <div class="spinner-grow text-success"></div>
                                <div class="spinner-grow text-info"></div>
                                <div class="spinner-grow text-warning"></div>
                                <div class="spinner-grow text-danger"></div>
                                <div class="spinner-grow text-secondary"></div>
                                <div class="spinner-grow text-dark"></div>
                                <div class="spinner-grow text-light"></div>
                                <h4>Processing Please Wait</h4>
                            </div>
                        </div>
                        <h4 class="card-title">Item Edit</h4>
                        <p class="card-description">
                            Basic form elements
                        </p>
                        <form class="forms-sample">@csrf
                            <div class="row">
                                <input type="hidden" name="id" id="id"/>
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
                                        <label for="mnr_id">Select Minor Category</label>
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
                            <div class="form-group" id="itemSpack">
                                <p class="card-description">Item Attributes</p>
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
        showAndHideLoading();
        var csrf_tokens = "{{ csrf_token() }}";
        var urlss = "{{ url('showItemsDropDown') }}";

        // Function to load and show Major dropdown
        function showMajor(id=null){
            var markup = "<option value=''>Select Major Category</option>";
            $("#mjr_id").html(markup).show();
            $.ajax({
                url: urlss,
                type: 'GET',
                data: {'ViewType': 'mjr', "_token": csrf_tokens},
                datatype: 'JSON',
                success: function (data) {
                    var category = $.parseJSON(data);
                    if (category != '') {
                        var markup = "<option value=''>Select Major Category</option>";
                        for (var x = 0; x < category.length; x++) {
                            markup += "<option value=" + category[x].mjr_code + ">" +category[x].mjr_code + ' - ' + category[x].mjr_desc + "</option>";
                        }
                        $("#mjr_id").html(markup).show();
                        $('#mjr_id').val(id).trigger('change');
                    } else {
                        var markup = "<option value=''>Select Major</option>";
                        $("#mjr_id").html(markup).show();
                    }
                }
            });
        }

        // Function to load and show Measurement Unit dropdown
        function showMeasurement(id=null){
            var markup = "<option value=''>Select Measurement Unit</option>";
            $("#measur_unit_id").html(markup).show();
            $.ajax({
                url: urlss,
                type: 'GET',
                data: {'ViewType': 'measur_unit', "_token": csrf_tokens},
                datatype: 'JSON',
                success: function (data) {
                    var category = $.parseJSON(data);
                    if (category != '') {
                        var markup = "<option value=''>Select Measurement Unit</option>";
                        for (var x = 0; x < category.length; x++) {
                            markup += "<option value=" + category[x].msr_unit_code + ">" +category[x].msr_unit_code + ' - ' + category[x].msr_unit_desc + "</option>";
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

        // Function to load and show Sub Major dropdown based on Major category
        function showSubMajor(id=null,mjr_id){
            $.ajax({
                url: urlss,
                type: 'GET',
                data: {'ViewType': 'mjr_cat','mjr_id': mjr_id, "_token": csrf_tokens},
                datatype: 'JSON',
                success: function (data) {
                    var category = $.parseJSON(data);
                    if (category != '') {
                        var markup = "<option value=''>Select Sub Major Category</option>";
                        for (var x = 0; x < category.length; x++) {
                            markup += "<option value=" + category[x].mjr_sub_code + ">" +category[x].mjr_sub_code + ' - ' + category[x].mjr_sub_desc + "</option>";
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

        // Function to load and show Minor dropdown based on Sub Major category
        function showMinor(id=null,mjr_id,mjr_cat_id){
            $.ajax({
                url: urlss,
                type: 'GET',
                data: {'ViewType': 'mnr','mjr_id': mjr_id,'mjr_cat_id': mjr_cat_id, "_token": csrf_tokens},
                datatype: 'JSON',
                success: function (data) {
                    var category = $.parseJSON(data);
                    if (category != '') {
                        var markup = "<option value=''>Select Minor Category</option>";
                        for (var x = 0; x < category.length; x++) {
                            markup += "<option value=" + category[x].mnr_code + ">" +category[x].mnr_code + ' - ' + category[x].mnr_desc + "</option>";
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

        // Function to load attributes into the select box
        function loadAttributes(selectElement, selectedAttributeId=null) {
            $.ajax({
                url: urlss,
                type: 'GET',
                data: {'ViewType': 'attribute', "_token": csrf_tokens},
                datatype: 'JSON',
                success: function (data) {
                    var category = $.parseJSON(data);
                    if (category != '') {
                        var markup = "<option value=''>Select Attribute</option>";
                        for (var x = 0; x < category.length; x++) {
                            markup += "<option value=" + category[x].id + ">" + category[x].name + "</option>";
                        }
                        $(selectElement).html(markup).show();

                        // If selectedAttributeId is provided, set the selected option
                        if (selectedAttributeId) {
                            $(selectElement).val(selectedAttributeId).trigger('change');
                        }
                    } else {
                        var markup = "<option value=''>Select Attribute</option>";
                        $(selectElement).html(markup).show();
                    }
                }
            });
        }

        // Function to load attribute values based on the selected attribute
        function loadAttributeValues(attribute_id, selectElement, selectedValues=null) {
            $.ajax({
                url: urlss,
                type: 'GET',
                data: {'ViewType': 'attribute_value', 'attribute_id': attribute_id, "_token": csrf_tokens},
                datatype: 'JSON',
                success: function (data) {
                    var category = $.parseJSON(data);
                    if (category != '') {
                        var markup = "";
                        for (var x = 0; x < category.length; x++) {
                            markup += "<option value=" + category[x].id + ">" + category[x].name + "</option>";
                        }
                        $(selectElement).html(markup).show();

                        // If selectedValues is provided, select the appropriate options
                        if (selectedValues) {
                            var valuesArray = selectedValues.split(','); // Assuming values are comma-separated
                            $(selectElement).val(valuesArray).trigger('change');
                        }
                    } else {
                        var markup = "<option value=''>No Attribute Found</option>";
                        $(selectElement).html(markup).show();
                    }
                }
            });
        }

        // When the page loads, load the data to update the item
        var ItemId = "{{$itemID}}";
        $.ajax({
            url: "{{ url('itemInfo') }}" + '/' + ItemId,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('#id').val(data.itemMaster.id);
                $('#name').val(data.itemMaster.name);
                $('#desc').val(data.itemMaster.desc);
                $('#status').val(data.itemMaster.status);
                showMajor(data.itemMaster.mjr_id);
                showMeasurement(data.itemMaster.measur_unit_id);
                showSubMajor(data.itemMaster.mjr_cat_id, data.itemMaster.mjr_id);
                showMinor(data.itemMaster.mnr_id, data.itemMaster.mjr_id, data.itemMaster.mjr_cat_id);

                // Iterate through itemAttributes and create rows accordingly
                data.itemAttibute.forEach(function(attributeData) {
                    var newRow = `
                    <tr class="dynamic-row">
                        <td><button class="btn btn-sm btn-outline-danger remove-row"><i class='bx bx-trash'></i></button></td>
                        <td>
                            <div class="form-group">
                                <select class="form-control select2 attribute_ids" name="attribute_ids[]"></select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <select class="form-control select2 attribute_value_ids" multiple="multiple" name="attribute_value_ids[]"></select>
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
                    </tr>
                `;
                    $('#rowsContainer').append(newRow);

                    // Load attributes and values for this row
                    loadAttributes($('#rowsContainer .dynamic-row:last .attribute_ids'), attributeData.attribute_id);
                    loadAttributeValues(attributeData.attribute_id, $('#rowsContainer .dynamic-row:last .attribute_value_ids'), attributeData.attribute_value_ids);
                    $('#rowsContainer .dynamic-row:last .select2').select2();
                    $('#rowsContainer .dynamic-row:last #button-addon2').on('click', function() {
                        addAttributeValue($(this).closest('tr'));
                    });
                });
            },
            error: function () {
                swal({
                    title: "Oops",
                    text: "Error Occurred while loading item data.",
                    icon: "error",
                    timer: 1500
                });
                hideLoading();
            }
        });

        $(document).on('click', '.add-row', function(e) {
            e.preventDefault();
            var newRow = `
            <tr class="dynamic-row">
                <td><button class="btn btn-sm btn-outline-danger remove-row"><i class='bx bx-trash'></i></button></td>
                <td>
                    <div class="form-group">
                        <select class="form-control select2 attribute_ids" name="attribute_ids[]"></select>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <select class="form-control select2 attribute_value_ids" multiple="multiple" name="attribute_value_ids[]"></select>
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
            </tr>
        `;
            $('#rowsContainer').append(newRow);
            loadAttributes($('#rowsContainer .dynamic-row:last .attribute_ids'));
            $('#rowsContainer .dynamic-row:last .select2').select2();

            $('#rowsContainer .dynamic-row:last #button-addon2').on('click', function() {
                addAttributeValue($(this).closest('tr'));
            });
        });

        $(document).on('click', '.remove-row', function(e) {
            e.preventDefault();
            if ($('#rowsContainer .dynamic-row').length > 1) {
                $(this).closest('tr').remove();
            } else {
                alert("At least one row must remain.");
            }
        });

        function addAttributeValue(row) {
            var newAttributeValue = row.find('#newAttributeValue').val();
            var attribute_ids = row.find('.attribute_ids').val();

            if (newAttributeValue.trim() == "") {
                swal({
                    text: 'Please enter a valid attribute value.',
                    icon: 'warning',
                });
                return;
            }

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
                        row.find('#newAttributeValue').val('');
                        var attribute_id = row.find('.attribute_ids').val();
                        loadAttributeValues(attribute_id, row.find('.attribute_value_ids'));
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
        }

        function showAndHideLoading() {
            showLoading();
            setTimeout(function() {
                hideLoading();
            }, 5000);
        }
    </script>


    <script >
        function addData() {
            var formData = new FormData($("#itemDataAdd form")[0]);
            var attributes = [];
            $('#rowsContainer .dynamic-row').each(function() {
                var attribute_id = $(this).find('.attribute_ids').val();
                var attribute_value_ids = $(this).find('.attribute_value_ids').val();
                if (attribute_id && attribute_value_ids) {
                    attributes.push({
                        "attribute_ids": attribute_id,
                        "attribute_value_ids": attribute_value_ids
                    });
                }
            });
            formData.append("attribute", JSON.stringify(attributes));
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
                        $("#itemDataAdd form")[0].reset();
                        $('#rowsContainer').empty();
                        $('#usersTable').DataTable().ajax.reload();
                    } else if (data.statusCode == 204) {
                        showErrors(data.errors);
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
            return false;
        }
    </script>
@endsection
