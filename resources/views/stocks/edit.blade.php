<x-app-layout>
@section('content')
<title>Edit Stocks - Diezza Inventory Management</title>
<meta content="" name="description">
<meta content="" name="keywords">

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Update Stocks</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('stocks.index') }}">Stocks</a></li>
                <li class="breadcrumb-item active">Update Stocks</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>

                        <!-- Edit Form -->
                        <form class="row g-3" method="POST" action="{{ route('stocks.update', $stock->id) }}">
                            @csrf
                            @method('PUT')

                            <!-- Stock Name -->
                            <div class="col-md-12">
                                <label for="name" class="form-label">Stock Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $stock->name) }}" required autofocus>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Quantity -->
                            <div class="col-md-6">
                                <label for="in_" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="quantity" name="quantity"
                                    value="{{ old('quantity', $stock->quantity) }}" required>
                                @error('quantity')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Category -->
                            <div class="col-md-6">
                                <label for="category_id" class="form-label">Category</label>
                                <select class="form-select" id="category_id" name="category_id" required>
                                    <option value="" disabled>Select a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" 
                                            {{ old('category_id', $stock->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Barcode -->
                            <div class="col-md-6">
                                <label for="barcode" class="form-label">Barcode</label>
                                <input type="text" class="form-control" id="barcode" name="barcode" value="{{ old('barcode', $stock->barcode) }}" required>
                                @error('barcode')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Brand -->
                            <div class="col-md-6">
                                <label for="brand" class="form-label">Brand</label>
                                <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand', $stock->brand) }}" required>
                                @error('brand')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Capacity -->
                            <div class="col-md-6">
                                <label for="capacity" class="form-label">Capacity</label>
                                <input type="text" class="form-control" id="capacity" name="capacity" value="{{ old('capacity', $stock->capacity) }}" required>
                                @error('capacity')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Sell Price -->
                            <div class="col-md-6">
                                <label for="sell_price" class="form-label">Sell Price</label>
                                <input type="number" step="0.01" class="form-control" id="sell_price" name="sell_price" value="{{ old('sell_price', $stock->sell_price) }}" required>
                                @error('sell_price')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Cost -->
                            <div class="col-md-6">
                                <label for="cost" class="form-label">Cost</label>
                                <input type="number" step="0.01" class="form-control" id="cost" name="cost" value="{{ old('cost', $stock->cost) }}" required>
                                @error('cost')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Update Stock</button>
                            </div>
                        </form><!-- End Edit Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection
</x-app-layout>
