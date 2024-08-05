@extends('admin.baseadmin')

@section('title','edit finition')

@section('content')
<div class="container mt-4">
    <h2>Modifier le type de travaux</h2>
    <form action="{{ route('admin.finition.update', $finition->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="type_finition" class="form-label">type finition</label>
            <input type="text" class="form-control" id="type_finition" name="type_finition" value="{{ $finition->type_finition }}" required readonly>
        </div>
        <div class="mb-3">
            <label for="prix" class="form-label">Prix Finition</label>
            <input type="number" class="form-control" id="prix" name="prix" value="{{ $finition->prix }}" required readonly>
        </div>
        <div class="mb-3">
            <label for="taux_finition" class="form-label">Taux finition en %</label>
            <input type="number" class="form-control" id="taux_finition" name="taux_finition" value="{{ $finition->taux_finition }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
