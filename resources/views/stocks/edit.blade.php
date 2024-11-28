<x-app-layout>
@section('content')
<title>Edit Stocks - Diezza Inventory Management</title>
<meta content="" name="description">
<meta content="" name="keywords">

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Stocks</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('stocks.index') }}">Manage Stocks</a></li>
                <li class="breadcrumb-item active">Edit Stocks</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Stock Details</h5>

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
                                <label for="in_stock" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="in_stock" name="in_stock"
                                    value="{{ old('in_stock', $stock->in_stock) }}" required>
                                @error('in_stock')
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
