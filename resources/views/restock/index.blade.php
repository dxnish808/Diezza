<x-app-layout>
@section('content')
<title>Stocks Management - Diezza Inventory Management</title>
<meta content="" name="description">
<meta content="" name="keywords">
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Restocks</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Restocks</li>
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
                    <h5 class="card-title"></h5>
                    <div class="parent">
                        <a href="{{ route('restocks.create') }}" class="btn btn-success btn-custom">
                            <i class="bi bi-plus"></i>
                        </a>
                    </div>

                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Order ID</th>
                                <th>Supplier</th>
                                <th>Estimate Arrive</th>
                                <th>Action</th> <!-- Moved Action column -->
                                <th>Verify</th> <!-- Moved Verify column -->
                            </tr>
                        </thead>
                        <tbody>
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
                                    <!-- Delete Button (Action column) -->
                                    <form action="#" method="POST" onsubmit="return confirm('Are you sure you want to delete this restock?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>

                                <!-- Verify Button (Verify column) -->
                                <td>
                                    <a href="{{ route('restocks.show', $restock['id']) }}" class="btn btn-primary btn-sm"><i class="bi bi-clipboard-check"></i></a>
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
