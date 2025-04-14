<x-app-layout>
@section('content')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Scan Barcode</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('stocks.index') }}">Stocks</a></li>
      <li class="breadcrumb-item active">Scan Barcode</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <!-- Barcode Input Form -->
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Enter Barcode</h5>

          <!-- Floating Labels Form -->
          <form class="row g-3" action="#" method="POST">
            <div class="col-md-12">
              <div class="form-floating">
                <input type="text" class="form-control" id="barcodeInput" placeholder="Enter Barcode" required>
                <label for="barcodeInput">Barcode</label>
              </div>
            </div>
            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
          </form><!-- End Floating Labels Form -->

        </div>
      </div>
    </div>

    <!-- Product List Table -->
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Product List</h5>

          <!-- Table with scanned products -->
          <table class="table table-striped" id="productTable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Cost Per Unit</th>
                <th scope="col">Total Price</th>
              </tr>
            </thead>
            <tbody>
              <!-- Static Dummy Data for Product List -->
              <tr>
                <td>12345</td>
                <td>Product A</td>
                <td>10</td>
                <td>$5</td>
                <td>$50</td>
              </tr>
              <tr>
                <td>67890</td>
                <td>Product B</td>
                <td>5</td>
                <td>$10</td>
                <td>$50</td>
              </tr>
              <tr>
                <td>11121</td>
                <td>Product C</td>
                <td>20</td>
                <td>$2</td>
                <td>$40</td>
              </tr>
            </tbody>
          </table>
          <!-- End Table -->

          <div class="text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
        </div>
      </div>
    </div>
  </div>
</section>

</main>

@endsection
</x-app-layout>
