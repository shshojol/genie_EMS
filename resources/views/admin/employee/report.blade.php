<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

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
              <a class="nav-link" href="{{ url('employee/report') }}">Employee Report</a>
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
    <div class="container mt-5">
        <h3>Employee report</h3>


       @foreach($date as $value)

            <div class="dropdown dropright">

                Date: <a href="#" class="retrive_data"  class="dropdown-toggle" data-toggle="dropdown">{{$value}}</a><br>

                <div class="dropdown-menu" id="retrive">
                    <div class="abc">

                    </div>
                </div>
              </div>
       @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.retrive_data').click(function(){
                var date = $(this).text();
                $.ajax({
                    url: '/getdata',
                    type: 'post',
                    data: 'date='+date+'&_token={{csrf_token()}}',
                    success: function(data){
                        $('.abc').html(data);
                    }
                });
            });

        });
    </script>

    {{--  <script type="text/javascript">
        $("select[name='id_country']").change(function(){
            var id_country = $(this).val();
            var token = $("input[name='_token']").val();
            $.ajax({
                url: "<?php echo route('select-ajax') ?>",
                method: 'POST',
                data: {id_country:id_country, _token:token},
                success: function(data) {
                  $("select[name='id_state'").html('');
                  $("select[name='id_state'").html(data.options);
                }
            });
        });
      </script>  --}}
</body>
</html>
