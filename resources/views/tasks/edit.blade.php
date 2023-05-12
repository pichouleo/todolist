@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="font-semibold text-center" style="font-size:40px;">
        Modifier la tâche
    </h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="flex items-center justify-between mx-auto bg-white border-b rounded-lg"  style="width:50%; padding:10px;margin-top:20px;">
        @csrf
        @method('PUT')

        <div class=" form-group">
            <label for="name" class="font-medium text-gray-900 whitespace-nowrap">Nom de la tache : </label>
            <input type="text" name="name" id="name" value="{{ $task->name }}"  class="form-control border-gray-300 border rounded-md">
        </div>
        <x-primary-button>
            Modifier
        </x-primary-button>
    </form>
</div>
@endsection
