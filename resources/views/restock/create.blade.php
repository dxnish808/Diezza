<x-app-layout>
@section('content')
<title>Add Stocks - Diezza Inventory Management</title>
<meta content="" name="description">
<meta content="" name="keywords">

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Add Stocks</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Add Stocks</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add New Stock</h5>

                        <!-- Form to Add Stock -->
                        <form class="row g-3" action="{{ route('stocks.store') }}" method="POST">
                            @csrf

                    <!-- Item Name -->
                    <div class="col-md-12">
                        <label for="item_name" class="form-label">Stock Name</label>
                        <input type="text" id="item_name" name="item_name" class="form-control" value="{{ old('item_name') }}" required>
                        @error('item_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Quantity -->
                    <div class="col-md-12">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" id="quantity" name="quantity" class="form-control" value="{{ old('quantity') }}" required>
                        @error('quantity')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Supplier -->
                    <div class="col-md-12">
                        <label for="supplier" class="form-label">Supplier</label>
                        <input type="text" id="supplier" name="supplier" class="form-control" value="{{ old('supplier') }}" required>
                        @error('supplier')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Add Restock</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
