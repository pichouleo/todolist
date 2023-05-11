@extends('layouts.app')

@section('content')
<div class="container">
<h1 class="text-2xl font-semibold text-center">
        Créer une nouvelle tâche
    </h1>
        
        <form action="{{ route('tasks.store') }}" method="POST" class="flex items-center justify-between mx-auto bg-white"  style="width:50%; padding:10px;">
            @csrf
            <div class=" form-group">
                <label for="name" class="font-medium text-gray-900 whitespace-nowrap">Titre</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Créer</button>
            </div>
        </form>
    </div>
@endsection

