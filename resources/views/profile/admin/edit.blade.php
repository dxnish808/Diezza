
<x-app-layout>
@section('content')
<title>User Management(edit) - Diezza Inventory Management</title>
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
    </div><!-- End Page Title -->

    <section class="section profile">
    <form action="{{ route('profile.admin.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
      <div class="row">
        <div class="col-xl-8">
          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->

                <div class="tab-pane fade show active profile-overview" id="profile-overview">


                  <h5 class="card-title">Profile Details</h5>

                  <div>
            <x-input-label for="name">Name:</x-input-label>
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email">Email:</x-input-label>
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>

                </div>
              </div><!-- End Bordered Tabs -->
            </div>
          </div>
        </div>
      </div>
      </form>
    </section>
  </main><!-- End #main -->
  @endsection
</x-app-layout>

