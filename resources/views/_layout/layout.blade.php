<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Kullabs | {{ isset($title) ? $title : '' }}</title>
    <!-- @yield('title')  -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="shortcut icon" href="{{URL::to('images/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{URL::to('images/favicon.ico')}}" type="image/x-icon">

    @include('_partials.assets')

    @yield('scripts','')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="sidebar-mini skin-blue fixed">
    @include('_partials.header')
	<!-- Content Wrapper. Contains page content -->
	  	<div class="content-wrapper">
            <div id='flashmessage'>
                @if(Session::get('message')) 
                    {{ Session::get('message') }}
                @endif
                @if(Session::get('error'))
                    {{ Session::get('error') }}
                @endif
            </div>
                @yield('content-header','')
                @yield('content')
    	</div>

</body>
</html>