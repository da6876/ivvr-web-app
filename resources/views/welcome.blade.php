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
    $jsonPath = public_path('menu.json');
    if (file_exists($jsonPath)) {
        $jsonContent = file_get_contents($jsonPath);
        $menu = json_decode($jsonContent, true);
    } else {
        echo 'Menu JSON file not found.';
        exit;
    }
    $parentMenuItems = array_filter($menu['menu'], function($item) {
        return $item['parent_id'] === "";
    });
    $parentMenuItems = array_values($parentMenuItems);
    ?>
    <div class="container-xxl col-md-12 d-flex align-items-center justify-content-center" style="min-height: 100vh; height: 100%;">
        <div class="authentication-inner" style="height: 100%; width: 100%;">
            <div class="card text-bg-dark border-0">
                <img class="card-img" height="150px" src="https://www.bpdb.gov.bd/sites/default/files/files/bpdb.portal.gov.bd/top_banner/20bf227e_fbcd_4a1b_a586_c3669ab3b6d5/2024-10-28-08-17-6fbcd72b3a8015bd1956c6a3d58ac530.jpeg" alt="Card image">
                <div class="card-img-overlay">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-auto">
                                    <img src="{{asset('assets/img/logo.png')}}" alt="BPDB logo" style="max-height: 100px;">
                                </div>
                                <div class="col">
                                    <h1 class="card-title text-white">Bangladesh Power Development Board (BPDB)</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body text-center">
                    <div class="row g-6">

                        @foreach($parentMenuItems as $menuItem)
                            <div class="col-lg-3 col-sm-6 text-center mt-3">
                                <div class="custom-card card border border-primary text-center" style="width: 14rem; height:14rem; cursor: pointer;">
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                        <h3 class="text-uppercase">{{ $menuItem['title'] }}</h3>
                                        <a href="{{ $menuItem['url'] }}/{{ $menuItem['id'] }}" class="btn btn-primary">View</a>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
