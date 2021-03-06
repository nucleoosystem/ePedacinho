<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $titulo or 'eSocial' }}</title>

<!-- Styles -->
<style type="text/css">
.w3-radio {
    width: 24px;
    height: 24px;
    position: relative;
    top: 6px;
}
</style>
<!-- Bootstrap Core CSS -->
<link href="{{url('Gentelella/vendors/bootstrap/dist/css/bootstrap.min.css')}}"
	rel="stylesheet">
<!-- Font Awesome -->
<link href="{{url('Gentelella/vendors/font-awesome/css/font-awesome.min.css')}}"
	rel="stylesheet">
<!-- Custom Theme Style -->
<link href="{{url('Gentelella/build/css/custom.min.css')}}"
	rel="stylesheet">
</head>
<body class="nav-md">
	<div class="container body">
		<div class="main_container">


			@if (Auth::user())

				@if( !Request::ajax() )
					<!-- top navigation -->
		
					@include('layouts.menu_topo')
		
					<!-- /top navigation -->
		
					<!-- left side Menu -->
		
					@include('layouts.menu_lateral')
		
					<!-- Left Sid
					
			<!-- page content -->
			<div class="right_col" role="main">
					
				@else
			<!-- page content -->
			<div class="" role="main">
			<!-- Caso seja Modal abre Espaçamento -->
			<div class="panel-body">
			<h4 class="modal-title" id="myModalLabel">{{$title or ''}}</h4>
			<br>
					
				@endif

				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">

						<!-- ERROR AND MESSAGES SECTION -->
						@foreach ((array) session('flash_notification') as $message)
						@php $message = (array)$message[0]; @endphp
						    @if ($message['overlay'])
						        @include('flash::modal', [
						            'modalClass' => 'flash-modal',
						            'title'      => $message['title'],
						            'body'       => $message['message']
						        ])
						    @else
						        <div class="alert alert-{{ $message['level'] }}
						                    {{ $message['important'] ? 'alert-important' : '' }}"
						                    role="alert">
						                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
						            @if ($message['important'])
						                
						            @endif
						
						            {!! $message['message'] !!}
						        </div>
						    @endif
						@endforeach
						@if( isset($errors ) && count($errors) > 0 )
						@foreach($errors->all() as $error)
						<div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert"
								aria-hidden="true">X</button>
							{{$error}}
						</div>
						@endforeach @endif
						<!-- END ERROR AND MESSAGES -->
						
								
						@yield('content')

					</div>
				</div>
			</div>
			<!-- /page content -->

			@else
  			
  			 @if (Route::has('login'))
                <div class="button    col-lg-4 col-lg-offset-4     col-md-4 col-md-offset-4     col-sm-4 col-sm-offset-4" 
                style="
				    background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #2b313c), color-stop(100%, #1b1d23));
				    background-image: -moz-linear-gradient(#2b313c, #1b1d23);
				    background-image: -webkit-linear-gradient(#2b313c, #1b1d23);
				    background-image: linear-gradient(#2b313c, #1b1d23);
				">
					<center>
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/') }}">Inicio</a>
                    @endif
                    </center>
                </div>
                <br><br>
            @endif
			<div class="col-md-8 col-md-offset-2">@yield('content')</div>

			@endif

		</div>
		<!-- Main Container -->
	</div>
	<!-- Container Body -->

	<br>
	@if( !Request::ajax() )
	<!-- footer content -->
	<center>
		<font color="#C0C0C0"> 
			<h7> Copyright <i class="fa fa-copyright"></i> 2016-2017 - Todos os direitos reservados. Versao: 1.00.00 </h7>
		</font>
	</center>
	<!-- /footer content -->
	@endif
	
	<!-- ----------------------------------------------------------------------------------------------------------------------- -->

	<!-- jQuery JS -->
	<script src="{{url('Gentelella/vendors/jquery/dist/jquery.js')}}"></script>
	<!-- Bootstrap Core JS -->
	<script
		src="{{url('Gentelella/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
	
	@stack('scripts')

	<!-- Custom Theme Scripts -->
	<script src="{{url('Gentelella/build/js/custom.min.js')}}"></script>

	<script>
	$('.alert-success').delay(3500).fadeOut(1500);
	</script>

</body>
</html>
