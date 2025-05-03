<x-app-layout>
    @section('content')
        <title>Restock Details - Diezza Inventory Management</title>

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
                                <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                        <h5 class="card-title">Overview</h5>
                                        @if(count($stocks) > 0)
                                            @php $firstStock = $stocks->first(); @endphp
                                            <p><strong>Order ID:</strong> {{ $firstStock->order_group_id }}</p>
                                            <p><strong>Order Date:</strong> {{ $firstStock->created_at->format('Y-m-d') }}</p>
                                            <p><strong>Estimated Arrival:</strong> {{ $firstStock->arrival_date->format('Y-m-d') }}</p>
                                            <p><strong>Status:</strong> 
                                                @if($firstStock->status == 1)
                                                    <span class="badge bg-warning">Pending</span>
                                                @else
                                                    <span class="badge bg-success"> Return</span>
                                                @endif
                                            </p>
                                        @else
                                            <p>No stock information available</p>
                                        @endif
                                    </div>
                                    <div class="mt-auto">
                                    @if(count($stocks) > 0
                                    && $firstStock->status == 1)
                                            <a href="{{ route('restocks.verify', $firstStock->order_group_id) }}" class="btn btn-primary btn-sm ms-2">Verify</a>
                                        @endif
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body pt-3">
                            <ul class="nav nav-tabs nav-tabs-bordered mt-4">
                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#overview">Overview</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#return">Return</button>
                                    </li>
                                </ul>

                                <div class="tab-content pt-2">
                                    <div class="tab-pane fade show active" id="overview">
                                    <h5 class="mt-4">Ordered Stocks</h5>
                                @php $totalPrice = 0; @endphp
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
                                        @foreach($stocks as $stock)
                                            <tr>
                                                <td>{{ $stock['name'] }}</td>
                                                <td>{{ $stock['quantity'] }}</td>
                                                <td>${{ number_format($stock->cost, 2) }}</td>
                                                <td>${{ number_format($stock->quantity * $stock->cost, 2) }}</td>
                                            </tr>
                                            @php 
                                            $totalPrice += $stock->quantity * $stock->cost; 
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

                                    <div class="tab-pane fade pt-3" id="return">
                                        <!-- Product Return Section -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    @endsection
</x-app-layout>
