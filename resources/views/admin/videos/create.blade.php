<x-admin-layout>
    @section('title', 'Crear Video')

    @section('content')
        <form action="{{ route('admin.videos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">Título</label>
                <input type="text" name="title" id="title" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="course_id" class="block text-gray-700 font-bold mb-2">Curso</label>
                <select name="course_id" id="course_id" class="w-full p-2 border rounded" required>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="duration_in_min" class="block text-gray-700 font-bold mb-2">Duración (minutos)</label>
                <input type="number" name="duration_in_min" id="duration_in_min" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="video" class="block text-gray-700 font-bold mb-2">Video</label>
                <input type="file" name="video" id="video" class="w-full p-2 border rounded" required>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear Video</button>
        </form>
    @endsection
</x-admin-layout>
