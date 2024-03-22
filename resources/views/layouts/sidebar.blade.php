{{-- content close --}}
</div>

<?php

$roles = auth()->user()->roles()->pluck('name')->implode(', ');

// var_dump(auth()->user());

?>

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
    rel="stylesheet">

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href=" {{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
<link href=" {{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

<!-- Customized Bootstrap Stylesheet -->
<link href=" {{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet">

<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="{{ route('dashboard') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-warning"><i class="fa fa-user-edit me-2"></i>SkillUp</h3>
        </a>
        <a href="{{ route('editProfile') }}">
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    @if (auth()->check() && auth()->user()->image)
                        <img class="rounded-circle"
                            src="{{ asset('storage/uploads/' . auth()->user()->image) }}" alt="{{ auth()->user()->name }}"
                            width="50" height="50">
                    @else
                        <img class="rounded-circle"
                            src="{{ asset('storage/uploads/default_admin.jpeg') }}" alt="Default_Image" width="50"
                            height="50">
                    @endif
    
    
                    <div
                        class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                    </div>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                    <span>{{ $roles }}</span>
                </div>
            </div>
        </a>
        <div class="navbar-nav w-100">
            <a href="{{ route('dashboard') }}" class="nav-item nav-link active"><i
                    class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            {{-- <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-laptop me-2"></i>Elements</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="button.html" class="dropdown-item">Buttons</a>
                    <a href="typography.html" class="dropdown-item">Typography</a>
                    <a href="element.html" class="dropdown-item">Other Elements</a>
                </div>
            </div> --}}
            <a href="{{ route('user') }}" class="nav-item nav-link"><i class="fa fa-users me-2"></i>Users</a>
            <a href="{{ route('category') }}" class="nav-item nav-link"><i class="fa fa-list me-2"></i>Category</a>
            <a href="{{ route('gigs') }}" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Gigs</a>
            <a href="{{ route('bills') }}" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Bills</a>
            <a href="{{ route('orders') }}" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Orders</a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('lib/chart/chart.min.js') }}"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>
<script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
<script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
