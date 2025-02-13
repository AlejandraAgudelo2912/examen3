@extends('layouts.admin')

@section('title', 'Gestión de Cursos')

@section('content')
    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary mb-3">Nuevo Curso</a>

    <table class="table">
        <thead>
        <tr>
            <th>Título</th>
            <th>Videos</th>
            <th>Fecha Publicación</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($courses as $course)
            <tr>
                <td>{{ $course->title }}</td>
                <td>{{ $course->videos()->count() }}</td>
                <td>{{ $course->released_at ?? 'No Publicado' }}</td>
                <td>
                    <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" class="d-inline">
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
