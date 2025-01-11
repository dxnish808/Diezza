<x-app-layout>
@section('content')
<title>Add Vendor - Diezza Inventory Management</title>
<meta content="" name="description">
<meta content="" name="keywords">

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Add Vendor</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Add Vendor</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add New Vendor</h5>

                        <!-- Form to Add Stock -->
                        <form class="row g-3" action="{{ route('vendors.store') }}" method="POST">
                            @csrf

                            <!-- Vendor Name -->
                            <div class="col-md-12">
                                <label for="inputName" class="form-label">Vendor Name</label>
                                <input type="text" id="vendor_name" name="vendor_name" class="form-control" required>
                            </div>

                            <!-- Company Id -->
                            <div class="col-md-6">
                                <label for="company_id" class="form-label">Company Id</label>
                                <input type="text" id="company_id" name="company_id" class="form-control" required>
                            </div>

                            <!-- Phone No -->
                            <div class="col-md-6">
                                <label for="phone_no" class="form-label">Phone No</label>
                                <input type="text" id="phone_no" name="phone_no" class="form-control" required>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" id="email" name="email" class="form-control" required>
                            </div>

                            <!-- Location -->
                            <div class="col-md-12">
                                <label for="location" class="form-label">location</label>
                                <input type="text" id="location" name="location" class="form-control" required>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Add Vendor</button>
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