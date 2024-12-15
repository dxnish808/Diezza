<x-app-layout>

@section('content')
<title>Stocks Management - Diezza Inventory Management</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Manage Stocks</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Manage Stocks</li>
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
                    <h5 class="card-title">Stock List</h5>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Picture</th>
                                <th>Name</th>
                                <th>In Stock</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($stocks as $stock)
                                <<tr onclick="window.location='{{ route('stocks.show', $stock) }}';">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($stock->picture)
                                            <img src="{{ asset('storage/' . $stock->picture) }}" alt="{{ $stock->name }}" style="width: 50px; height: 50px;">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>{{ $stock->name }}</td>
                                    <td>{{ $stock->in_stock }}</td>
                                    <td>{{ $stock->category->name }}</td>
                                    <td>
                                        <a href="{{ route('stocks.edit', $stock->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure? Once deleted, all of its resources and data will be permanently deleted.')">Delete</button>
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