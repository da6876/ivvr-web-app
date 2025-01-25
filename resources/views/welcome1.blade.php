@extends('layout.public')
@section('title', 'Login')
@section('style')
<style>
    .custom-card:hover {
        border-color: #ff5722; /* New border color on hover */
    }
</style>
@endsection
@section('content')
    <?php


// Output the filtered menu
    ?>

    <div class="container-xxl col-md-12 d-flex align-items-center justify-content-center" style="min-height: 100vh; height: 100%;">
        <div class="authentication-inner" style="height: 100%; width: 100%;">
            <div class="card text-bg-dark border-0" style="height: 100%; width: 100%;">
                <img class="card-img" height="150px" src="https://www.bpdb.gov.bd/sites/default/files/files/bpdb.portal.gov.bd/top_banner/20bf227e_fbcd_4a1b_a586_c3669ab3b6d5/2024-10-28-08-17-6fbcd72b3a8015bd1956c6a3d58ac530.jpeg" alt="Card image">
                <div class="card-img-overlay">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-auto">
                                    <img src="https://www.bpdb.gov.bd/themes/responsive_npf/img/logo/bpdb.png" alt="BPDB logo" style="max-height: 100px;">
                                </div>
                                <div class="col">
                                    <h1 class="card-title text-white">Information Verification Validation Recognition (IVVR) {{$menuId}}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4" style="width: 100%;">
                <div class="card-body text-center">
                    <div class="row g-6">

                        @foreach($childMenuItems as $menuItem)
                            <div class="col-lg-3 col-md-4 col-sm-6 text-center mt-3">
                                <div class="custom-card card border border-primary text-center" style="height: 14rem; cursor: pointer;">
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                        <h3>{{ $menuItem['title'] }}</h3>
                                        <h5 class="card-text">{{ $menuItem['title'] }}</h5>
                                        <button onclick="showDashboard('{{ $menuItem['id'] }}')"  class="btn btn-primary">View</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a href="{{url('welcome')}}" class="mt-4 text-center btn btn-info col-md-6">Go Back</a>

                </div>

            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        var csrf_tokens = document.querySelector('meta[name="csrf-token"]').content;

        function showDashboard(id) {
            var urlss = "{{ url('getDashboard') }}";
            $.ajax({
                url: urlss,
                type: 'GET',
                data: {'ViewType': 'dashboard', 'menuid': id, "_token": csrf_tokens},
                datatype: 'JSON',
                success: function (data) {
                    if (data.statusCode == 200) {
                        window.location.href = data.route;  // This will now be the absolute URL
                    } else {
                        Swal.fire({
                            icon: "error",
                            text: data.statusMsg,
                        });
                    }
                }
            });
        }
    </script>
@endsection
