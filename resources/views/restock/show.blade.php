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
                        <li class="breadcrumb-item"><a href="{{ route('stocks.index') }}">Manage Restock</a></li>
                        <li class="breadcrumb-item active">Restock Details</li>
                    </ol>
                </nav>
            </div>

            <section class="section">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                
                                <!-- Product Details -->
                                <h5 class="card-title">Restock Details</h5>

                                @php
                                // Dummy Data
                                $restock = [
                                    'stocks' => [
                                        ['name' => 'Widget A', 'quantity' => 50, 'cost' => 200.00],
                                        ['name' => 'Widget B', 'quantity' => 30, 'cost' => 150.00],
                                    ],
                                    'vendor' => [
                                        'name' => 'Pran',
                                        'location' => '123 Vendor St, Cityville',
                                        'phone' => '123-456-7890',
                                        'email' => 'pran@example.com',
                                    ],
                                ];

                                $vendorUTHM = [
                                    'name' => 'UTHM',
                                    'location' => '456 University Ave, Townsville',
                                    'phone' => '987-654-3210',
                                    'email' => 'uthm@example.edu',
                                ];
                                @endphp

                                <table class="table table-bordered mb-5">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Cost</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($restock['stocks'] as $stock)
                                        <tr>
                                            <td>{{ $stock['name'] }}</td>
                                            <td>{{ $stock['quantity'] }}</td>
                                            <td>${{ number_format($stock['cost'], 2) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <!-- Vendor Details -->
                                <h3 class="text-lg font-bold mb-4">Vendor Details</h3>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Location</th>
                                            <th>Phone No</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $restock['vendor']['name'] }}</td>
                                            <td>{{ $restock['vendor']['location'] }}</td>
                                            <td>{{ $restock['vendor']['phone'] }}</td>
                                            <td>{{ $restock['vendor']['email'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $vendorUTHM['name'] }}</td>
                                            <td>{{ $vendorUTHM['location'] }}</td>
                                            <td>{{ $vendorUTHM['phone'] }}</td>
                                            <td>{{ $vendorUTHM['email'] }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    @endsection
</x-app-layout>
