<x-admin-layout>
    @section('title', 'Crear Usuario')

    @section('content')
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Nombre</label>
                <input type="text" name="name" id="name" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                <input type="email" name="email" id="email" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-bold mb-2">Contraseña</label>
                <input type="password" name="password" id="password" class="w-full p-2 border rounded" required>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear Usuario</button>
        </form>
    @endsection
</x-admin-layout>
