@extends('layout.app')
@section('title',"- Error 403")
@section('main')

    <nav class="navbar navbar-example navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="javascript:void(0)"></a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbar-ex-3"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar-ex-3">
                <div class="navbar-nav me-auto">
                    <a class="nav-item nav-link active" href="javascript:void(0)">Error 403</a>
                </div>

            </div>
        </div>
    </nav>

    <div class="card">
        <div class="card-body text-center">
            <h2 class="mb-2 mx-2">You are not authorized!</h2>
            <div class="mt-5">
                <img src="{{ asset('assets/img/illustrations/girl-with-laptop-light.png')}}" alt="page-misc-not-authorized-light" width="450" class="img-fluid" data-app-light-img="illustrations/girl-with-laptop-light.png" data-app-dark-img="illustrations/girl-with-laptop-dark.png">
            </div>
            <p class="mb-4 mx-2">You do not have permission to view this page using the credentials that you have provided while login. <br> Please contact your site administrator.</p>
            <a href="index.html" class="btn btn-primary">Back to home</a>
            
        </div>
    </div>


@endsection

