<x-admin-layout>
    @section('title', 'Editar Video')

    @section('content')
        <form action="{{ route('admin.videos.update', $video) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">Título</label>
                <input type="text" name="title" id="title" class="w-full p-2 border rounded" value="{{ $video->title }}" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Descripción</label>
                <textarea name="description" id="description" class="w-full p-2 border rounded" required>{{ $video->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-bold mb-2">Imagen</label>
                <input type="file" name="image" id="image" class="w-full p-2 border rounded" required>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar Cambios</button>
        </form>
    @endsection
</x-admin-layout>
