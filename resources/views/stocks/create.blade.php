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
                <li class="breadcrumb-item"><a href="{{ route('stocks.index') }}">Stocks</a></li>
                <li class="breadcrumb-item active">Add Stocks</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>

                        <!-- Form to Add Stock -->
                        <form class="row g-3" action="{{ route('stocks.store') }}" method="POST">
                            @csrf

                            <!-- Stock Picture -->
                            <div class="col-md-12">
                                <label for="picture" class="form-label">Stock Picture</label>
                                <input type="file" class="form-control" id="picture" name="picture" accept="image/*">
                                @error('picture')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Stock Name -->
                            <div class="col-md-12">
                                <label for="inputName" class="form-label">Stock Name</label>
                                <input type="text" class="form-control" id="inputName" name="name" placeholder="Enter stock name"
                                    value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Quantity -->
                            <div class="col-md-6">
                                <label for="inputQuantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="inputQuantity" name="in_stock" placeholder="Enter quantity"
                                    value="{{ old('in_stock') }}" required>
                                @error('in_stock')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Category -->
                            <div class="col-md-6">
                                <label for="inputCategory" class="form-label">Category</label>
                                <select id="inputCategory" class="form-select" name="category_id" required>
                                    <option value="" selected disabled>Choose a category...</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                                <input type="text" class="form-control" id="barcode" name="barcode" placeholder="Enter barcode" value="{{ old('barcode') }}" required>
                                @error('barcode')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Brand -->
                            <div class="col-md-6">
                                <label for="brand" class="form-label">Brand</label>
                                <input type="text" class="form-control" id="brand" name="brand" placeholder="Enter brand" value="{{ old('brand') }}" required>
                                @error('brand')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Capacity -->
                            <div class="col-md-6">
                                <label for="capacity" class="form-label">Capacity</label>
                                <input type="text" class="form-control" id="capacity" name="capacity" placeholder="Enter capacity" value="{{ old('capacity') }}" required>
                                @error('capacity')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Sell Price -->
                            <div class="col-md-6">
                                <label for="sell_price" class="form-label">Sell Price</label>
                                <input type="number" step="0.01" class="form-control" id="sell_price" name="sell_price" placeholder="Enter sell price" value="{{ old('sell_price') }}" required>
                                @error('sell_price')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Cost -->
                            <div class="col-md-6">
                                <label for="cost" class="form-label">Cost</label>
                                <input type="number" step="0.01" class="form-control" id="cost" name="cost" placeholder="Enter cost" value="{{ old('cost') }}" required>
                                @error('cost')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Add Stock</button>
                            </div>
                        </form><!-- End Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
</x-app-layout>
