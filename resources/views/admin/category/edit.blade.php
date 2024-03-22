@extends('layouts.main')
@section('main-content')
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="col">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Edit Category</h6>
                <form action="{{ route('update', ['id' => $editCat->id]) }}" id="categoryEditForm" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="categoryName" name="categoryName"
                            placeholder="Enter Category Name" value="{{ $editCat->name }}">
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
                            <option value="1" {{ $editCat->status == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $editCat->status == 0 ? 'selected' : '' }}>Inactive
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
                                    <option value="{{ $category->id }}"
                                        {{ $editCat->category_parent_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <label for="CategoryParent">Parent Category</label>
                        <span class="text-danger">
                            @error('categoryParent')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-floating">
                        <button type="submit" class="btn btn-primary" id="btnUpdate">Update</button>
                    </div>
                </form>            
            </div>
        </div>
    </div>
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    {{-- <script>

        document.getElementById('categoryEditForm').addEventListener('submit',(event) => 
        {   
            alert('Category Updated Sucessfully!!');
        });

    </script> --}}

@endsection