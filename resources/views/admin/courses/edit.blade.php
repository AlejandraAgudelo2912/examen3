<x-admin-layout>
    @section('title', 'Editar Curso')

    @section('content')
        <form action="{{ route('admin.courses.update', $course) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="paddle_product_id" class="block text-gray-700 font-bold mb-2">Paddle Product ID</label>
                <input type="text" name="paddle_product_id" id="paddle_product_id" class="w-full p-2 border rounded" value="{{ $course->paddle_product_id }}" required>
            </div>
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">Título</label>
                <input type="text" name="title" id="title" class="w-full p-2 border rounded" value="{{ $course->title }}" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Descripción</label>
                <textarea name="description" id="description" class="w-full p-2 border rounded" required>{{ $course->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="tagline" class="block text-gray-700 font-bold mb-2">Tagline</label>
                <input type="text" name="tagline" id="tagline" class="w-full p-2 border rounded" value="{{ $course->tagline }}" required>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700 font-bold mb-2">Precio</label>
                <input type="text" name="price" id="price" class="w-full p-2 border rounded" value="{{ $course->price }}" required>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar Cambios</button>
        </form>
    @endsection
</x-admin-layout>
