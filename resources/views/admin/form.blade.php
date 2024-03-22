@extends('layouts.main')
@section('main-content')
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Gigs</h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Category</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allGigs as $gig)
                                    <tr>
                                        <td>{{$gig->id}}</td>
                                        <td>{{$gig->gigtitle}}</td>
                                        <td>
                                            <img class="avatar avatar-xl me-2 rounded-circle"
                                            src="{{ asset('storage/uploads/' . $gig->gigimage) }}"
                                            alt="{{ $gig->gigtitle }}" width="50" height="50">
                                        </td>
                                        <td>{{$gig->gigdesc}}</td>
                                        <td>{{$gig->gigprice}}</td>
                                        <td>{{$gig->user->name}}</td>
                                        <td>
                                            @if ($gig->gigstatus == 1)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>{{$gig->category->name}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
@endsection