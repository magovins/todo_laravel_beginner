<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Todo List</title>
	<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"/>
	@livewireScripts
	<title>Todos</title>
</head>
<body>
	<div class="text-center pt-10 flex justify-center">
		<div class="w-1/3 border border-gray-400 rounded py-4">
			@yield('content')
		</div>
	</div>
	
	@livewireScripts
</body>
</html>