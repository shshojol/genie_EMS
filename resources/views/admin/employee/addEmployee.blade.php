<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="{{ url('dashboard') }}">dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('employee/add') }}">add employee</a>
            </li>

          </ul>

          <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-responsive-nav-link>
        </form>
        </div>
    </nav>
<div class="container">
    <h2>Add Employee form</h2>
    @if(Session::has('status'))
    <div class="alert alert-success">
        {{ Session::get('status') }}
    </div>
    @endif
    <form action="{{ url('employee/add') }}" method="post">
        @csrf
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control"  placeholder="Enter name" name="name" value="{{ old('name') }}">
        @error('name')
            <sapn class="text-danger">{{ $message }}<span>
        @enderror
      </div>
      <div class="form-group">
        <label for="name">email:</label>
        <input type="text" class="form-control"  placeholder="Enter email" name="email">
        @error('email')
            <sapn class="text-danger">{{ $message }}<span>
        @enderror
      </div>

      <div class="form-group">
        <label for="name">password:</label>
        <input type="text" class="form-control"  placeholder="Enter password" name="password">
        @error('password')
            <sapn class="text-danger">{{ $message }}<span>
        @enderror
      </div>


      {{--  <button type="submit" name="submit">Submit</button>  --}}
      <input type="submit" value="submit" name="submit" class="btn btn-primary">

    </form>
  </div>
</body>
</html>
