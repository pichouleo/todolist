@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1  class="font-black text-6xl font-carter-one text-center">
        Modifier la tâche
    </h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="flex items-center justify-between mx-auto bg-white border-b rounded-lg max-w-1/2 px-6 py-4 mt-5">
        @csrf
        @method('PUT')

        <div class=" form-group">
            <label for="name" class="text-gray-700">Nom de la tache : </label>
            <input type="text" name="name" id="name" value="{{ $task->name }}"  class="form-control border-gray-300 border rounded-md">
        </div>
        <select name="status">
            <option value="En cours" {{ $task->status === 'En cours' ? 'selected' : '' }}>En cours</option>
            <option value="Terminé" {{ $task->status === 'Terminé' ? 'selected' : '' }}>Terminé</option>
            <option value="Urgent" {{ $task->status === 'Urgent' ? 'selected' : '' }}>Urgent</option>
        </select>

        <x-primary-button>
            Modifier
        </x-primary-button>
    </form>
</div>
@endsection
