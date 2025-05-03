<x-app-layout>
    @section('content')
        <title>Stock Details - Diezza Inventory Management</title>

        <main id="main" class="main">
            <div class="pagetitle">
                <h1>Stock Details</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('stocks.index') }}">Manage Stocks</a></li>
                        <li class="breadcrumb-item active">Stock Details</li>
                    </ol>
                </nav>
            </div>

            <section class="section">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Product Info</h5>

                                <p><strong>Name:</strong> {{ $stock->name }}</p>
                                <p><strong>Category:</strong> {{ $stock->category->name ?? 'N/A' }}</p>
                                <p><strong>Barcode:</strong> {{ $stock->barcode }}</p>
                                <p><strong>Brand:</strong> {{ $stock->brand }}</p>
                                <p><strong>Capacity:</strong> {{ $stock->capacity }}</p>
                                <p><strong>Sell Price:</strong> RM {{ number_format($stock->sell_price, 2) }}</p>
                                <p><strong>Cost:</strong> RM {{ number_format($stock->cost, 2) }}</p>
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
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#vendor">Product Vendor</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#orders">Order History</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#movements">Movement History</button>
                                    </li>
                                </ul>

                                <div class="tab-content pt-2">
                                    <div class="tab-pane fade show active" id="overview">
                                        <!-- Overview Details Here -->
                                    </div>

                                    <div class="tab-pane fade pt-3" id="vendor">
                                        <!-- Product Vendor Section -->
                                    </div>

                                    <div class="tab-pane fade pt-3" id="orders">
                                        <!-- Order History Section -->
                                    </div>

                                    <div class="tab-pane fade pt-3" id="movements">
                                        <!-- Movement History Section -->
                                    </div>
                                </div>
                                <!-- End Tabs -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    @endsection
</x-app-layout>

