<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">

<div class="flex">

    <aside class="w-64 bg-gray-800 text-white min-h-screen">
        <div class="p-4 text-lg font-bold">Admin Panel</div>
        <nav>
            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 hover:bg-gray-700">Dashboard</a>
            <a href="{{route('admin.courses.index')}}" class="block px-4 py-2 hover:bg-gray-700">Crear Curso</a>
            <a href="{{route('admin.videos.index')}}" class="block px-4 py-2 hover:bg-gray-700">Crear Video</a>
            <a href="{{route('admin.users.index')}}" class="block px-4 py-2 hover:bg-gray-700">Gestionar Usuarios</a>
        </nav>
    </aside>

    <main class="flex-1 p-6">
        <h1 class="text-2xl font-bold mb-4">@yield('title')</h1>
        @yield('content')
    </main>
</div>

</body>
</html>
