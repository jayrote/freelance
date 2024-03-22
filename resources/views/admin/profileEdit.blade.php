@extends('layouts.main')
@section('main-content')
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Edit Profile</h6>
                    <form action="{{ route('updateProfile') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" value="{{ auth()->user()->name }}"
                                name="name" placeholder="Enter name" value="">
                            <label for="name">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter email" value="{{ auth()->user()->email }}">
                            <label for="email">Email</label>
                        </div>
                        <div class="form mb-3">
                            @if (auth()->user()->image)
                                <input type="file" class="form-control form-control-md bg-dark" id="image"
                                    name="image" style="margin-bottom: 10px">
                                <img src="{{ asset('storage/uploads/' . auth()->user()->image) }}" alt="User Image"
                                    class="img-thumbnail rounded-squre" height="80px" width="100px">
                            @else
                                <input type="file" class="form-control form-control-md bg-dark" id="image"
                                    name="image">
                            @endif
                        </div>
                        <center>
                            <div class="form-floating">
                                <button type="submit" id="editProfileBtn" class="btn btn-warning">Update</button>
                            </div>
                        </center>
                    </form>
                </div>
            </div>


            <div class="col-md-6 mb-4">
                <div class="container-fluid px-4">
                    <div class="col">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Change Password</h6>
                            <form action="{{ route('changePassword') }}" method="post" id="changePasswordForm">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Enter old password" required>
                                    <label for="password">Old Password</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="new_password" name="new_password"
                                        placeholder="Enter new password" required>
                                    <label for="password">New Password</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="confirm_password"
                                        name="confirm_password" placeholder="Confirm new password" required>
                                    <label for="password">Confirm Password</label>
                                </div>
                                <center>
                                    <div class="form-floating">
                                        <button type="submit" class="btn btn-warning" id="changePassword">Change
                                            Password</button>
                                    </div>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    <script>
        document.getElementById("changePassword").addEventListener("click", () => {

            var oldPassword = document.getElementById('password').value;
            var newPassword = document.getElementById('new_password').value;
            var confirmPassword = document.getElementById('confirm_password').value;

            if (newPassword !== '' && newPassword == confirmPassword && confirmPassword !== '') {
                alert('password change successfully');
                return;
            } else {
                alert('password does not change!!');
            }

        });

        document.getElementById('editProfileBtn').addEventListener("click", () => {

            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var img = document.getElementById('image').value;

            if (name == '' && email == '' && img == '') {
                alert('Profile not Updated!!');
                return;
            }
            alert('Profile Updated Successfully');
        });
    </script>
@endsection
