@extends('layouts.app')

@section('content')
<div class="relative overflow-x-auto text-center bg-ffe194">
    <form action="{{ route('tasks.store') }}" method="POST" class="flex items-center justify-between px-6 py-4 w-1/2 mx-auto">
        @csrf
        <div class=" form-group">
            <input type="text" name="name" class="form-control bg-transparent border-none placeholder-gray-500 focus:ring-0" placeholder="Nouvelle tâche...">
            @error('name')
            <p class="text-red-500">N'oublie pas de remplir ce champ !</p>
            @enderror
        </div>
        <div>
        <select name="status"  class="text-gray-600 bg-transparent text-sm rounded-lg py-1 px-3 pr-8 leading-tight focus:outline-none focus:ring-0 mr-8">
            <option value="En cours">En cours</option>
            <option value="Terminé">Terminé</option>
            <option value="Urgent">Urgent</option>
        </select>
        <x-primary-button>Ajouter</x-primary-button>
        </div>
    </form>
    <h1 class="font-black text-3xl font-carter-one text-center mb-5">Ma liste de tâches</h1>
    <ul class="w-1/2 mx-auto">
        @foreach ($userTasks as $task)
            <li class="bg-white border-b rounded-lg mb-2 shadow-sm">
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
            <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="flex items-center justify-between mx-auto bg-white border-b rounded-lg max-w-1/2 px-6 py-4">
                @csrf
                @method('PUT')

                <div class=" form-group">
                    <input type="text" name="name" id="name" value="{{ $task->name }}"  class="form-control border-gray-300 border rounded-md">
                </div>
                <select name="status"  class="bg-white border-gray-300 border rounded-md py-2 px-3 pr-8 leading-tight focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                    <option value="En cours" {{ $task->status === 'En cours' ? 'selected' : '' }}>En cours</option>
                    <option value="Terminé" {{ $task->status === 'Terminé' ? 'selected' : '' }}>Terminé</option>
                    <option value="Urgent" {{ $task->status === 'Urgent' ? 'selected' : '' }}>Urgent</option>
                </select>

                <x-primary-button>Modifier</x-primary-button>
            </form>
        @endforeach
    </ul>
</div>

@endsection

