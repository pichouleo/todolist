@extends('layouts.app')

@section('content')
<div class="relative overflow-x-auto text-center">
    <h1 class="font-semibold text-center" style="font-size:40px;">
        TODOLIST
    </h1>
    <p class="my-10 text-center text-gray-500">Bienvenue sur notre nouvelle liste de tâches interne !</p>
    <button type="button" style="padding:10px 15px;margin:10px;" class="rounded-lg text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lginline-flex items-center" onclick="window.location.href = '{{ route('tasks.create') }}'">Ajouter une tâche</button>    
    <ul style="width:50%; margin: 5px auto;">
        @foreach ($userTasks as $task)
            <li class="bg-white border-b rounded-lg">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="font-medium text-gray-900 whitespace-nowrap">
                        {{ $task->name }}
                    </div>
                    <div>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="font-medium text-blue-600 hover:underline">Modifier</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="ml-2 text-red-600 hover:underline">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>

@endsection

