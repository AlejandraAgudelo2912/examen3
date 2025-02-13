<x-admin-layout>
    @section('title', 'Dashboard')

    @section('content')
        <div class="grid grid-cols-3 gap-4">
            <div class="bg-white p-6 rounded shadow">
                <h2 class="text-lg font-bold">Total de Cursos</h2>
                <p class="text-2xl font-semibold">{{ $totalCourses }}</p>
            </div>
            <div class="bg-white p-6 rounded shadow">
                <h2 class="text-lg font-bold">Total de Videos</h2>
                <p class="text-2xl font-semibold">{{ $totalVideos }}</p>
            </div>
            <div class="bg-white p-6 rounded shadow">
                <h2 class="text-lg font-bold">Usuarios Registrados</h2>
                <p class="text-2xl font-semibold">{{ $totalUsers }}</p>
            </div>
        </div>
    @endsection
</x-admin-layout>
