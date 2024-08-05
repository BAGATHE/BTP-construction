@extends('admin.baseadmin')

@section('title','edit travaux')

@section('content')
<div class="container mt-4">
    <h2>Modifier le type de travaux</h2>
    <form action="{{ route('admin.typetravaux.update', $travaux->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="code_travaux" class="form-label">Code Travaux</label>
            <input type="text" class="form-control" id="code_travaux" name="code_travaux" value="{{ $travaux->code_travaux }}" required>
        </div>
        <div class="mb-3">
            <label for="type_travaux" class="form-label">Type Travaux</label>
            <input type="text" class="form-control" id="type_travaux" name="type_travaux" value="{{ $travaux->type_travaux }}" required>
        </div>
        <div class="mb-3">
            <label for="unite" class="form-label">Unité</label>
            <input type="text" class="form-control" id="unite" name="unite" value="{{ $travaux->unite }}" required>
        </div>
        <div class="mb-3">
            <label for="quantite" class="form-label">Quantité</label>
            <input type="number" class="form-control" id="quantite" name="quantite" value="{{ $travaux->quantite }}" required>
        </div>
        <div class="mb-3">
            <label for="prix_unitaire" class="form-label">Prix Unitaire</label>
            <input type="number" class="form-control" id="prix_unitaire" name="prix_unitaire" value="{{ $travaux->prix_unitaire }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
