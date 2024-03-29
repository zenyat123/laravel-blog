<!DOCTYPE html>

<html>

<head>

	<meta charset = "utf-8">
	<meta name = "viewport" content = "width=device-width, initial-scale=1">
	
	<title>@yield("title", "Administrador")</title>

	<link href = "{{ asset('css/app.css') }}" rel = "stylesheet">

</head>

<body>

	@include("admin/others/navbar")

	<div class = "container">

		@yield("content")

		@include("admin/others/response")

	</div>

	<script src = "{{ asset('js/dashboard.js') }}"></script>
	
</body>

</html>