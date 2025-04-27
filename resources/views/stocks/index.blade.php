<x-app-layout>

@section('content')
<title>Stocks Management - Diezza Inventory Management</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Stocks</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Stocks</li>
        </ol>
      </nav>
    </div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <!-- Success Message -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Stock Table -->
            <div class="card">
                <div class="card-body">
                    <div class="parent mt-3">
                        <!-- Create Stock Button -->
                        <a href="{{ route('stocks.create') }}" class="btn btn-success btn-custom">
                            <i class="bi bi-plus"></i>
                        </a>

                        <!-- Scan Barcode Button -->
                        <a href="{{ route('stocks.scan') }}" class="btn btn-primary btn-custom">
                            <i class="bi bi-upc-scan"></i> Scan Barcode</a>
                    </div>
                    
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>In Stock</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($stocks as $stock)
                            <tr onclick="window.location='{{ route('stocks.byId', ['id' => $stock->id]) }}';">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $stock->name }}</td>
                                    <td>{{ $stock->total_quantity }}</td>
                                    <td>
                                        @php
                                            $category = \App\Models\Category::find($stock->category_id);
                                        @endphp
                                        {{ $category->name ?? 'N/A' }}
                                    </td>
                                    <td>
                                    <a href="{{ route('stocks.byId', ['id' => $stock->id]) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('stocks.edit', $stock->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                        <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure? Once deleted, all of its resources and data will be permanently deleted.')"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No stocks available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>

</main>
@endsection
</x-app-layout>