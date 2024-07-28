@extends('client.baseclient')

@section('title','add devis')

@section('content')
<div class="container-fluid">
   <form class="vstack gap-2 white_shd mb-4" action="{{route('client.devis.create')}}" method="post" >
    @csrf
    <!-- price card-->
    <div class="row">
        <div class="col-md-12">
           <div class="white_shd full margin_bottom_30">
              <div class="full price_table padding_infor_info">
                 <div class="row">
                    <h1 class="text-center">Type de Maison</h1>
                    @foreach($maisons as $maison)
                    <!-- column price -->
                    @include('shared.pricing',['type'=>$maison->type_maison,'description'=>$maison->description,'surface'=>$maison->surface,'value'=>$maison->type_maison,'duree'=>$maison->duree_travaux])
                    <!-- end column price -->
                    @endforeach
                </div>
              </div>
           </div>
        </div>
     </div>
     <!-- end price card-->
     <!-- radio button type de finition-->
     <div class="row">
        <h1 class="text-center" >type de finition</h1>
        @foreach($finitions as $finition)
        <div class="col-3">
            <input type="radio" value="{{$finition->type_finition}}" class="btn-check" name="type_finition" id="option{{$finition->id}}" autocomplete="off">
            <label class="btn" for="option{{$finition->id}}">{{$finition->type_finition}}</label>
        </div>
        @endforeach

     </div>
     <!-- end radio button type de finition-->
     <div class="row  justify-content-center">
        <div class="mb-3 col-4">
            <label for="date_debut" class="form-label">Date debut travaux</label>
            <input type="date" class="form-control"  name="date_debut" value="" required>
        </div>
        <div class="mb-3 col-4">
            <label for="lieu" class="form-label">Lieu travaux</label>
            <input type="text" class="form-control"  name="lieu" value="" required>
        </div>
     </div>
     <div class="row  justify-content-center">
        <div class="col-3">
            <button class="btn btn-outline-primary btn-lg w-100">Validez</button>
        </div>
     </div>

    </form>


</div>


@endsection
