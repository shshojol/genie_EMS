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
            @if(auth()->user()->is_admin == 1)
            <li class="nav-item">
              <a class="nav-link" href="{{ url('dashboard') }}">dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('employee/report') }}">Employee Report</a>
            </li>
            @endif
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

<br>


@if(auth()->user()->is_admin == 1)
    <div class="container text-right mb-2">
        <a class="btn btn-primary" href="{{ url('employee/add') }}">Add Employee</a>
    </div>
    @foreach($user as $value)
    <div class="container bg-secondary">
        <p class="text-white">{{ $value->name }}</p>
    </div>
    @endforeach
@else

        @if(Session::has('status'))
        <div class="alert alert-success container">
            {{ Session::get('status') }}
        </div>
        @endif



     {{--  @if(!isset($report->status))
        <div class="text-center mt-5">
            <b>{{date('d M,Y')}}</b><br><br>
            <form action="{{ url('employee/checkin') }}" method="post">
                @csrf
                <input type="hidden" value="{{auth()->user()->id}}" name="user">
                <input type="hidden" value="{{date('Y-m-d')}}" name="date">
                <input type="hidden" value="checkin" name="status">
                <button class="btn btn-success" type="submit" name="submit">Check in</button>
            </form>
        </div>
     @else
        @if($report->status == 'checkin')
            <div class="text-center mt-5">
                <b>{{date('d M,Y')}}</b><br><br>
                <form action="{{ url('employee/checkout') }}" method="post">
                    @csrf
                    <input type="hidden" value="{{auth()->user()->id}}" name="user">
                    <input type="hidden" value="{{date('Y-m-d')}}" name="date">
                    <input type="hidden" value="checkout" name="status">
                    <button class="btn btn-primary" type="submit" name="submit">Check Out</button>
                </form>
            </div>
        @else
            <div class="text-center mt-5">
                <b>{{date('d M,Y')}}</b><br><br>
                <form action="{{ url('employee/checkin') }}" method="post">
                    @csrf
                    <input type="hidden" value="{{auth()->user()->id}}" name="user">
                    <input type="hidden" value="{{date('Y-m-d')}}" name="date">
                    <input type="hidden" value="checkin" name="status">
                    <button class="btn btn-success" type="submit" name="submit">Check in</button>
                </form>
            </div>
        @endif
     @endif  --}}

     @if($report == '0')
        <div class="text-center mt-5">
            <b>{{date('d M,Y')}}</b><br><br>
            <form action="{{ url('employee/checkin') }}" method="post">
                @csrf
                <input type="hidden" value="{{auth()->user()->id}}" name="user">
                <input type="hidden" value="{{date('Y-m-d')}}" name="date">
                <input type="hidden" value="checkin" name="status">
                <button class="btn btn-success" type="submit" name="submit">Check in</button>
            </form>
        </div>
     @elseif($report == '1')
        <div class="text-center mt-5">
            <b>{{date('d M,Y')}}</b><br><br>
            <form action="{{ url('employee/checkout') }}" method="post">
                @csrf
                <input type="hidden" value="{{auth()->user()->id}}" name="user">
                <input type="hidden" value="{{date('Y-m-d')}}" name="date">
                <input type="hidden" value="checkout" name="status">
                <button class="btn btn-primary" type="submit" name="submit">Check Out</button>
            </form>
        </div>
     @else
     <div class="text-center mt-5">
        <b>{{date('d M,Y')}}</b><br><br>
        <button class="btn btn-primary" type="submit" name="submit" disabled>Checked Out today</button>
     </div>
     @endif

@endif

</body>
</html>
