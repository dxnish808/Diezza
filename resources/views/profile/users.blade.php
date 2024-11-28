<x-app-layout>
@section('content')
<title>Users Management - Diezza Inventory Management</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <main id="main" class="main">

  <div class="pagetitle">
      <h1>User</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">User Management</li>
          <li class="breadcrumb-item active">User</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h1 class="card-title">User Table</h1>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                      <b>N</b>ame
                    </th>
                    <th>Email</th>
                    <th>Position</th>
                    <th data-type="date" data-format="YYYY/DD/MM">Start Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach ($users as $user )
                  <tr>
                     
                     <td>{{$user->name}}</td>
                     <td>{{$user->email}}</td>
                     <td>Null</td>
                     <td>{{$user->created_at->format('Y-m-d')}}</td>
                     <td>
                        <a href="{{ route('profile.admin.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('users.destroy', 
                       ['id' => $user->id]) }}" method="POST" style="display:inline;">
                       @csrf
                       @method('DELETE')
                       <button type="submit" class="btn btn-danger" onclick="return confirm('Are you    sure? Once the account is deleted, all of its resources and data will be permanently deleted.')">Delete</button>
          </form>

          </td>
        </tr>
        
        @endforeach
      </tbody>

              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>


  </main>
  @endsection
</x-app-layout>

    
