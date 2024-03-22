@extends('layouts.main')
@section('main-content')
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Orders</h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Gig Title</th>
                                        <th scope="col">Buyer</th>
                                        <th scope="col">Seller</th>
                                        <th scope="col">Bill Number</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allOrders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->gigs->gigtitle }}</td>
                                            <td>{{ $order->buyer->name }}</td>
                                            <td>{{ $order->seller->name }}</td>
                                            <td>{{ $order->bill_id }}</td>
                                            <td>
                                                @if ($order->status == 1)
                                                    <span class="badge bg-success">Complete</span>
                                                @else
                                                    <span class="badge bg-danger">In-Progress</span>
                                                @endif
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
    </div>
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
@endsection
