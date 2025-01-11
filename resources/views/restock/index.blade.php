<x-app-layout>
@section('content')
<title>Stocks Management - Diezza Inventory Management</title>
<meta content="" name="description">
<meta content="" name="keywords">
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Manage Restocks</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Purchase Orders</li>
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

            <!-- Restock Table -->
            <div class="card">
                <div class="card-body">
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('restocks.create') }}" class="btn btn-primary">
                            Add Restock
                        </a>
                    </div>
                    <table class="table datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Order ID</th>
                            <th>Supplier</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dummy Data -->
                        @php
                        $dummyRestocks = [
                            ['id' => 1, 'order_id' => 'ORD-1001', 'supplier' => 'Pran Sdn Bhd', 'date' => '2024-01-01'],
                            ['id' => 2, 'order_id' => 'ORD-1002', 'supplier' => 'UTHM', 'date' => '2024-01-02'],
                            
                        ];
                        @endphp

                        @foreach($dummyRestocks as $restock)
                        <tr>
                            <td>{{ $restock['id'] }}</td>
                            <td>{{ $restock['order_id'] }}</td>
                            <td>{{ $restock['supplier'] }}</td>
                            <td>{{ $restock['date'] }}</td>
                            <td>
                                <!-- Delete Button -->
                                <form action="#" method="POST" onsubmit="return confirm('Are you sure you want to delete this restock?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
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
