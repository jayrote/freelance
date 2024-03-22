@extends('layouts.main')
@section('main-content')
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="col">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Create Category</h6>
                <form action="{{ route('category_store') }}" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="categoryName" name="categoryName"
                            placeholder="Enter Category Name">
                        <label for="CategoryName">Category Name</label>

                        <span class="text-danger">
                            @error('categoryName')
                                {{ $message }}
                            @enderror
                        </span>

                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" name="categoryStatus" id="categoryStatus" name="categoryStatus"
                            required>
                            <option selected disabled>Select Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        <label for="floatingSelect">Status</label>

                        <span class="text-danger">
                            @error('categoryStatus')
                                {{ $message }}
                            @enderror
                        </span>

                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" name="categoryParent" id="categoryParent"
                            aria-label="Floating label select example">
                            <option selected disabled>Select parent category</option>
                            @foreach ($allCategories as $category)
                                @if ($category->category_parent_id === null)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach

                            <span class="text-danger">
                                @error('categoryParent')
                                    {{ $message }}
                                @enderror
                            </span>

                        </select>
                        <label for="CategoryParent">Parent Category</label>
                    </div>
                    <div class="form-floating">
                        <button type="submit" class="btn btn-primary" id="create">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
@endsection
