@extends('layouts.admin')

@section('title', 'Gestión de Vídeos')

@section('content')
    <a href="{{ route('admin.videos.create') }}" class="btn btn-primary mb-3">Nuevo Vídeo</a>

    <table class="table">
        <thead>
        <tr>
            <th>Título</th>
            <th>Curso</th>
            <th>Duración</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($videos as $video)
            <tr>
                <td>{{ $video->title }}</td>
                <td>{{ $video->course->title }}</td>
                <td>{{ $video->duration_in_min }} min</td>
                <td>
                    <a href="{{ route('admin.videos.edit', $video) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('admin.videos.destroy', $video) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro?')">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
