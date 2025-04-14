<x-app-layout>
@section('content')
<title>Report - Diezza Inventory Management</title>
<meta content="" name="description">
<meta content="" name="keywords">

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Report</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Report</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title"></h5>
                        <form action="{{ route('reports.show') }}" method="GET">
                            @csrf

                            <div class="col-md-12">
                                <label for="type" class="form-label">Report Type</label>
                                <select id="type" name="type" class="form-select" required>
                                    <option value="restock">Restock</option>
                                    <option value="sales">Sales</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" id="start_date" name="start_date" class="form-control" required>
                            </div>

                            <div class="col-md-12">
                                <label for="end_date" class="form-label">End Date</label>
                                <input type="date" id="end_date" name="end_date" class="form-control" required>
                            </div>

                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-primary">Generate</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
</x-app-layout>
