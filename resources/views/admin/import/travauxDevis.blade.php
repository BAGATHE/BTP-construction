@extends('admin.baseadmin')

@section('title','import')

@section('content')
<div class="row justify-content-center">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-warning">
        {{ session('error') }}
    </div>
    @endif
    <div class="col-md-8">
        <h1 class="text-center mb-4">IMPORTATION DONNEES</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6 offset-md-3">
                    <input type="file" name="maison_travaux" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 offset-md-3">
                    <input type="file" name="devis" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center">
                    <button type="submit" class="btn btn-primary">Importer</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')

@endsection
