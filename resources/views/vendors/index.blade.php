<x-app-layout>

@section('content')
<title>Vendors Management - Diezza Inventory Management</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Manage Vendors</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Manage Vendors</li>
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
                    <h5 class="card-title">Vendors List</h5>
                    <table class="table datatable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Vendor Name</th>
                            <th>Company ID</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($vendors as $vendor)
                                <tr onclick="window.location='{{ route('vendors.show', $vendor) }}';">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $vendor->vendor_name }}</td>
                                <td>{{ $vendor->company_id }}</td>
                                <td>
                                <a href="{{ route('vendors.edit', $vendor) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('vendors.destroy', $vendor) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
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