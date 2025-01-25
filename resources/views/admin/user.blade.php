@extends('layout.app')
@section('title',"- User")
@section('main')

    <h4 class="py-3 mb-2">User List</h4>
    <nav class="navbar navbar-example navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="javascript:void(0)"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-3">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-ex-3">
                <div class="navbar-nav me-auto">
                    <a class="nav-item nav-link active" href="javascript:void(0)">User Setup</a>
                </div>
                <form onsubmit="return false">
                    <button class="btn btn-outline-success" onclick="showModal()" type="button">Add New</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="card">
        <h5 class="card-header">User Table</h5>
        <div class="table-responsive text-nowrap">
            <table class="table" id="dataInfo-dataTable">
                <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Create At</th>
                    <th>Update At</th>
                    <th>Roles</th>
                    <th>Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>


    <div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-add-new-role">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <h3 class="role-title">Add New User</h3>
                    </div>
                    <!-- Add role form -->
                    <form id="addRoleForm" onsubmit="return false">@csrf
                        <div class="row g-1">
                            <div class="col mb-1">
                                <label class="form-label" for="name">Name</label>
                                <input type="hidden" id="id" name="id">
                                <input type="text" id="name" name="name" class="form-control"
                                       placeholder="Enter name" tabindex="1"/>
                            </div>
                            <div class="col mb-1">
                                <label class="form-label" for="name">Password</label>
                                <input type="text" id="password" name="password" class="form-control"
                                       placeholder="Enter Password" tabindex="2"/>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col mb-1">
                                <label class="form-label" for="email">Email</label>
                                <input type="text" id="email" name="email" class="form-control"
                                       placeholder="Enter Email" tabindex="4"/>
                            </div>
                            <div class="col mb-1">
                                <label class="form-label" for="division_id">Select Project</label>
                                <select class="form-control" id="roles" name="roles">
                                </select>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1" onclick="addData()">Submit</button>
                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                    aria-label="Close">Cancel
                            </button>
                        </div>
                    </form>
                    <!--/ Add role form -->
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')

@endsection
