@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="font-semibold text-center" style="font-size:40px;">
        Créer une nouvelle tâche
    </h1>
    <form action="{{ route('tasks.store') }}" method="POST" class="flex items-center justify-between mx-auto bg-white border-b rounded-lg"  style="width:50%; padding:10px;margin-top:20px;">
        @csrf
        <div class=" form-group">
            <label for="name" class="font-medium text-gray-900 whitespace-nowrap">Nom de la tache : </label>
            <input type="text" name="name" class="form-control border-gray-300 border rounded-md">
        </div>
        <div>
            <x-primary-button style="background-color:#09600F;">
            Créer
            </x-primary-button>
        </div>
    </form>
</div>
@endsection

