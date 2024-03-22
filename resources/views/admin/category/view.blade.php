@extends('layouts.main')
@section('main-content')
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="col">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">{{ $singleCat->name }}'s Details</h6>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Name : </th>
                            <td> {{ $singleCat->name }}</td>
                        </tr>
                        <tr>
                            <th>Status : </th>
                            <td>
                                @if ($singleCat->status == 1)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Parent Name :</th>
                            <td>
                                @if ($singleCat->parant)
                                    {{$singleCat->parant->name}}
                                @else
                                    Null
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><a href="{{ route('category') }}" type="button" class="btn btn-success">Back</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
@endsection