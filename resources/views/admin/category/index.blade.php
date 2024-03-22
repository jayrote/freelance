@extends('layouts.main')
@section('main-content')
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <!-- Table Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <div class="one" style="display: flex;justify-content:space-between;align-items:center;">
                            <h6
                                style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                                Category Table</h6>
                            <a href="{{ route('category_create') }}"><button type="button" class="btn btn-light m-2">Add
                                    Category</button></a>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Parent Category</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" style="padding-left: 4rem;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allCategories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->category_parent_id ?  $category->parant->name : '' }}</td>
                                            <td>
                                                @if ($category->status == 1)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td style="gap: -10px;display: flex;">
                                                <a href="{{ route('singleCategory', ['id' => $category->id]) }}"><button type="button" class="btn btn-square btn-outline-info m-2"><i class="fa fa-eye"></i></button></a>
                                                <a href="{{ route('edit', ['id' => $category->id]) }}"><button type="button" class="btn btn-square btn-outline-warning m-2"><i class="fa fa-pen"></i></button></a>
                                                <a href="{{ route('remove', ['id' => $category->id]) }}"><button type="button" class="btn btn-square btn-outline-danger m-2"><i class="fa fa-trash"></i></button></a>
                                            </td>
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
