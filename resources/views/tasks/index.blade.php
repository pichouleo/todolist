@extends('layouts.app')

@section('content')
<div class="relative overflow-x-auto text-center bg-ffe194">
    <div style="width:300px;margin: 0 auto;">
        <x-application-logo/>   
    </div>
    <p class="text-center text-gray-500" style="margin:-20px 0 10px 0;">Bienvenue sur notre nouvelle liste de tâches interne !</p>
    <x-primary-button onclick="window.location.href = '{{ route('tasks.create') }}'" style="margin:10px 0; background-color:#09600F;">
    Ajouter une tâche
    </x-primary-button>
    <ul style="width:50%; margin: 5px auto;">
        @foreach ($userTasks as $task)
            <li class="bg-white border-b rounded-lg">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="whitespace-nowrap">
                        {{ $task->name }}
                    </div>
                    <div class="flex flex-row items-center">
                    <a href="{{ route('tasks.edit', $task->id) }}" style="margin-right:5px;">Modifier</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline-block">
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

