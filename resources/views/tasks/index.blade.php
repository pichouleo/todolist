@extends('layouts.app')

@section('content')
<div class="relative overflow-x-auto text-center bg-ffe194">
    <h1 class="font-black text-6xl font-carter-one">MyToTool</h1>
    <p class="text-gray-500 my-3">Bienvenue sur notre nouvelle liste de tâches interne !</p>
    <x-primary-button onclick="window.location.href = '{{ route('tasks.create') }}'" class="mb-3">
    Ajouter une tâche
    </x-primary-button>
    <ul class="w-1/2 mx-auto">
        @foreach ($userTasks as $task)
            <li class="bg-white border-b rounded-lg mb-2">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="text-gray-700">
                        {{ $task->name }}
                    </div>
                    <div class="flex flex-row items-center">
                        <div class="flex items-center text-gray-500 text-sm mr-8">
                            @if($task->status === 'En cours')
                                <div class="w-3 h-3 bg-amber-200 rounded-full mx-2" ></div>
                            @elseif($task->status === 'Urgent')
                                <div class="w-3 h-3 bg-red-700 rounded-full mx-2"></div>
                            @elseif($task->status === 'Terminé')
                            <div class="w-3 h-3 bg-green-600 rounded-full mx-2"></div>
                            @endif
                            {{ $task->status }}
                        </div>
                        <a href="{{ route('tasks.edit', $task->id) }}"><i class="fas fa-pen"></i></a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline-block ml-3">
                            @csrf
                            @method('DELETE')
                            <x-danger-button>
                                Supprimer
                            </x-danger-button>
                        </form>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>

@endsection

