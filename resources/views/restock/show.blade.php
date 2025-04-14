<x-app-layout>
    @section('content')
        <title>Restock Details - Diezza Inventory Management</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <main id="main" class="main">
            <div class="pagetitle">
                <h1>Restock Details</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('restocks.index') }}">Restocks</a></li>
                        <li class="breadcrumb-item active">Restock Details</li>
                    </ol>
                </nav>
            </div>

            <section class="section">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <!-- Order Details -->
                                <div class="card-body d-flex flex-column justify-content-between">
                                <!-- Order Details -->
                                <div>
                                    <h5 class="card-title">Overview</h5>
                                    <p><strong>Order ID:</strong> ORD-1001</p>
                                    <p><strong>Supplier:</strong> Pran Sdn Bhd</p>
                                    <p><strong>Estimated Arrival:</strong> 2024-01-20</p>
                                </div>
                                <!-- Buttons at the bottom -->
                                <div class="mt-auto">
                                    <a href="{{ route('restocks.return') }}" class="btn btn-secondary btn-sm">Return</a>
                                    <a href="#" class="btn btn-primary btn-sm ms-2" disabled>Verify</a>
                                </div>
                            </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body pt-3">
                                <!-- Bordered Tabs -->
                                <ul class="nav nav-tabs nav-tabs-bordered mt-4">
                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#overview-tab">Details</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#vendor-tab">Vendor Details</button>
                                    </li>
                                </ul>

                                <div class="tab-content pt-2">
                                    <!-- Overview Tab -->
                                    <div class="tab-pane fade show active" id="overview-tab">
                                        <h5 class="mt-4">Ordered Stocks</h5>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Quantity</th>
                                                    <th>Price per Unit</th>
                                                    <th>Total Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php 
                                                    $stocks = [
                                                        ['name' => 'Widget A', 'quantity' => 50, 'price_per_unit' => 4.00],
                                                        ['name' => 'Widget B', 'quantity' => 30, 'price_per_unit' => 5.00]
                                                    ];
                                                    $totalPrice = 0;
                                                @endphp
                                                @foreach($stocks as $stock)
                                                <tr>
                                                    <td>{{ $stock['name'] }}</td>
                                                    <td>{{ $stock['quantity'] }}</td>
                                                    <td>${{ number_format($stock['price_per_unit'], 2) }}</td>
                                                    <td>${{ number_format($stock['quantity'] * $stock['price_per_unit'], 2) }}</td>
                                                </tr>
                                                @php 
                                                    $totalPrice += $stock['quantity'] * $stock['price_per_unit']; 
                                                @endphp
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="3" class="text-end">Total Price:</th>
                                                    <th>${{ number_format($totalPrice, 2) }}</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                    <!-- Vendor Details Tab -->
                                    <div class="tab-pane fade" id="vendor-tab">
                                        <h5 class="mt-4">Vendor Details</h5>
                                        <p><strong>Name:</strong> Pran Sdn Bhd</p>
                                        <p><strong>Phone:</strong> 123-456-7890</p>
                                        <p><strong>Location:</strong> 123 Vendor St, Cityville</p>
                                        <p><strong>Email:</strong> pran@example.com</p>
                                    </div>
                                </div><!-- End Tab Content -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    @endsection
</x-app-layout>
