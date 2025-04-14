<x-app-layout>
    @section('content')
        <title>Return Restock - Diezza Inventory Management</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <main id="main" class="main">
            <div class="pagetitle">
                <h1>Return Restock</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('restocks.index') }}">Restocks</a></li>
                        <li class="breadcrumb-item active">Return</li>
                    </ol>
                </nav>
            </div>

            <section class="section">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Return Restock Details</h5>
                                <form action="{{ route('restocks.processReturn') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="stock_quantity" class="form-label">Quantity to Return</label>
                                        <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" min="1" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="reason" class="form-label">Reason for Return</label>
                                        <textarea class="form-control" id="reason" name="reason" rows="4" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit Return</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    @endsection
</x-app-layout>
