<x-app-layout>
@section('content')
<title>Add Stocks - Diezza Inventory Management</title>

<main id="main" class="main">
<div class="pagetitle">
  <h1>Add Order</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('restocks.index') }}">Restocks</a></li>
      <li class="breadcrumb-item active">Add Order</li>
    </ol>
  </nav>
</div>

<section class="section">
<div class="row">
    <!-- Add Order Form -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Stock to Order</h5>

                <form class="row g-3" action="{{ route('restocks.addItem') }}" method="POST">
                    @csrf
                    <!-- Stock Name -->
                    <div class="col-md-12">
                        <label for="name" class="form-label">Stock Name</label>
                        <select id="name" name="name" class="form-select" required>
                            <option value="" disabled selected>-- Select Stock --</option>
                            @foreach($items as $item)
                                <option value="{{ $item }}" {{ old('name') == $item ? 'selected' : '' }}>
                                    {{ $item }}
                                </option>
                            @endforeach
                        </select>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Quantity -->
                    <div class="col-md-12">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" id="quantity" name="quantity" class="form-control" value="{{ old('quantity') }}" required>
                        @error('quantity')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- Order List Table -->
<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Order List</h5>

            @if(count($orderList) > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderList as $index => $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>
                                <form action="{{ route('restocks.removeItem', $index) }}" method="POST" onsubmit="return confirm('Remove this item?');" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Separate form for submitting the order -->
                <form action="{{ route('restocks.submitOrder') }}" method="POST">
                    @csrf
                    <!-- Arrival Date -->
                    <div class="mb-3 mt-3">
                        <label for="arrival_date">Arrival Date</label>
                        <input type="date" name="arrival_date" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit Order</button>
                </form>
            @else
                <p>No items in order list yet.</p>
            @endif
        </div>
    </div>
</div>

</div>
</section>
</main>
@endsection
</x-app-layout>