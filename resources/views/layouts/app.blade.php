<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <title>@yield('title', 'Learning Course')</title>
</head>
<body class="flex flex-col min-h-screen">
  @include('components.navbar')
  
<main class="flex-grow p-6 mx-auto">
    @yield('content')
  </main>
  
  @include('components.footer')
</body>
</html>
