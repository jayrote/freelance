@extends('layouts.main')
@section('main-content')
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <!-- Table Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Users</h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        {{-- <th scope="col">Avtar</th>  --}}
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">DateOfBirth</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allUser as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            {{-- <td>

                                                @if ($user->hasRole('Admin'))
                                                    <img class="avatar avatar-xl me-2 rounded-circle"
                                                        src="{{ asset('storage/uploads/default_admin.jpeg') }}"
                                                        alt="Admin_Image" width="50" height="50">
                                                @else
                                                    <img class="avatar avatar-xl me-2 rounded-circle"
                                                        src="{{ asset('storage/uploads/' . $user->image) }}"
                                                        alt="{{ $user->name }}" width="50" height="50">
                                                @endif


                                            </td> --}}
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone_number }}</td>
                                            <td>{{ $user->gender }}</td>
                                            <td>{{ $user->dob }}</td>
                                            <td>{{ $user->type }}</td>
                                            <td>
                                                @if ($user->status == 1)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>{{ $user->skills }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Table End -->
    </div>
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
@endsection
