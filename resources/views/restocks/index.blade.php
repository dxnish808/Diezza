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
                                <th>Ordered date</th>
                                <th>Estimate Arrive</th>
                                <th>Action</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($groups as $group)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <a href="{{ route('restocks.show', $group->order_group_id) }}">
                                    {{ $group->order_group_id }}
                                </a>
                            </td>
                            <td>{{ $group->created_at->format('Y-m-d') }}</td>
                            <td>{{ $group->arrival_date->format('Y-m-d') }}</td>
                            <td>
                            <form action="{{ route('restocks.destroyGroup', $group->order_group_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this group?');">
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
