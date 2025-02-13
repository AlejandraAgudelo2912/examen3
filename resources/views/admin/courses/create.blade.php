<x-admin-layout>
    @section('title', 'Crear Curso')

    @section('content')
        <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="paddle_product_id" class="block text-gray-700 font-bold mb-2">Paddle Product ID</label>
                <input type="text" name="paddle_product_id" id="paddle_product_id" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">Título</label>
                <input type="text" name="title" id="title" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Descripción</label>
                <textarea name="description" id="description" class="w-full p-2 border rounded" required></textarea>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-bold mb-2">Imagen</label>
                <input type="file" name="image" id="image" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="tagline" class="block text-gray-700 font-bold mb-2">Tagline</label>
                <input type="text" name="tagline" id="tagline" class="w-full p-2 border rounded" required>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear Curso</button>
        </form>
    @endsection
</x-admin-layout>
