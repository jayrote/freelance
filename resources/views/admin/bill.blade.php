@extends('layouts.main')
@section('main-content')
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Bills</h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Buyer</th>
                                        <th scope="col">Seller</th>
                                        <th scope="col">Seller Amount</th>
                                        <th scope="col">Platform Fees</th>
                                        <th scope="col">Total Amount</th>
                                        <th scope="col">Method</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allBills as $bill)
                                        <tr>
                                            <td>{{ $bill->id }}</td>
                                            <td>{{ $bill->seller->name }}</td>
                                            <td>{{ $bill->buyer->name }}</td>
                                            <td>{{ $bill->s_amount }}</td>
                                            <td>{{ $bill->platform_fees }}</td>
                                            <td>{{ $bill->total_amount }}</td>
                                            <td>{{ $bill->method }}</td>
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