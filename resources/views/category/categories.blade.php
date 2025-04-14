<x-app-layout>
@section('content')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Categories</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
      <li class="breadcrumb-item active">Categories</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
<div class="row">
    <!-- Add Category Form -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"></h5>
                

                <!-- Floating Labels Form -->
                <form class="row g-3" action="{{ route('categories') }}" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingName" name="name" placeholder="Category Name" required>
                            <label for="floatingName">Category Name</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form><!-- End Floating Labels Form -->
            </div>
        </div>
    </div>

    <!-- Category List Table -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Category List</h5>

                <!-- Table with categories -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Created</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->created_at }}</td>
                                <td>
                                     <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline-block;">
                                      @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure? Once deleted, all of its resources and data will be permanently deleted.')">
                    <i class="bi bi-trash"></i>
                    </button>
                </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">No categories available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <!-- End Table with categories -->

            </div>
        </div>
    </div>
</div>

</section>

</main>
@endsection
</x-app-layout>
