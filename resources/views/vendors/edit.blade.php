
<x-app-layout>
@section('content')
<title>Edit Vendors - Diezza Inventory Management</title>
<meta content="" name="description">
<meta content="" name="keywords">

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Vendors</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('vendors.index') }}">Manage Vendors</a></li>
                <li class="breadcrumb-item active">Edit Vendors</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Vendor Details</h5>

                        <!-- Edit Form -->
                        <form action="{{ route('vendors.update', $vendor) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Stock Name -->
                            <div class="col-md-12">
                                <label for="vendor_name" class="form-label">Vendor Name</label>
                                <input type="text" class="form-control" id="vendor_name" name="vendor_name"
                                    value="{{ old('vendor_name', $vendor->vendor_name) }}" required autofocus>
                                @error('vendor_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Quantity -->
                            <div class="col-md-6">
                                <label for="company_id" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="company_id" name="company_id"
                                    value="{{ old('company_id', $vendor->company_id) }}" required>
                                @error('company_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Barcode -->
                            <div class="col-md-6">
                                <label for="location" class="form-label">location</label>
                                <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $vendor->location) }}" required>
                                @error('location')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            
                            <!-- Submit Button -->
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Update Vendor</button>
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
