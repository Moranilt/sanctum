<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{mix('css/app.css')}}">

	<!-- Bootstrap -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <script src="https://kit.fontawesome.com/0f0fe750cb.js" crossorigin="anonymous"></script>
	<!-- Custom stlylesheet -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>
<body>

    <x-navigation>

    </x-navigation>
    <div id="app1">
        {{ $slot }}
        <transition name="custom-classes-transition" enter-active-class="animate__animated animate__slideInDown" leave-active-class="animate__animated animate__slideOutUp">
            <pop-out-msg v-show="showMsg" :message="message"></pop-out-msg>
        </transition>
    </div>

    <x-footer>

    </x-footer>

<!-- jQuery Plugins -->
<script src="{{mix('js/app.js')}}" defer></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

</body>
</html>
