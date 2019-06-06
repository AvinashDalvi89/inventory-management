<!-- layout.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
  <title>Inventory management tool for mobiles and cars</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
  <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
  <style type="text/css">
  body{
  	font-family: 'Roboto Condensed', sans-serif;
  	background: #ffc1070d;
  }
  	.container{
  		background: #8bc34a66;
  		padding: 17px;
  	}
  	.heading{
  		font-weight: bold;
  	}
  	.table-heading,.card-header{
  		    background: #4CAF50;
    font-weight: bold;
  	}
  </style>
</head>
<body>
  <div class="container">
    @yield('content')
  </div>
  <div class="row">
  	<div class="col-12" style="text-align: center;"> © 2019 Avinash Dalvi</div>
  </div>

  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>