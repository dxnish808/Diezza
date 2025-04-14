
<x-app-layout>
    @section('content')
        <title>Stock Details - Diezza Inventory Management</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <main id="main" class="main">
            <div class="pagetitle">
                <h1>Vendor Details</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('vendors.index') }}">Manage Vendors</a></li>
                        <li class="breadcrumb-item active">Vendor Details</li>
                    </ol>
                </nav>
            </div>

            <section class="section">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                
                                <!-- Product Details -->
                                <h5 class="card-title"></h5>

                                <p><strong>Name:</strong> {{ $vendor->vendor_name }}</p>
                                <p><strong>Company ID:</strong> {{ $vendor->company_id }}</p>
                                <p><strong>Location:</strong> {{ $vendor->location }}</p>
                </div>
                </div>
                </div>
                <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body pt-3">
                                <!-- Bordered Tabs -->
                                <ul class="nav nav-tabs nav-tabs-bordered mt-4">
                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Order History</button>
                                    </li>
                                </ul>

                                <div class="tab-content pt-2">
                                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                        <!-- Overview Details Here -->
                                    </div>

                                    <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                        <!-- Product Vendor Form -->
                                    </div>

                                    <div class="tab-pane fade pt-3" id="profile-settings">
                                        <!-- Order History -->
                                    </div>

                                    <div class="tab-pane fade pt-3" id="profile-change-password">
                                        <!-- Movement History -->
                                    </div>
                                </div><!-- End Bordered Tabs -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    @endsection
</x-app-layout>
