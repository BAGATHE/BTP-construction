@extends('client.baseclient')

@section('title','add devis')

@section('content')
<div class="container-fluid">
   <form class="vstack gap-2 white_shd mb-4" action="" method="post" >
    <!-- price card-->
    <div class="row">
        <div class="col-md-12">
           <div class="white_shd full margin_bottom_30">
              <div class="full price_table padding_infor_info">
                 <div class="row">
                    <h1 class="text-center">Type de Maison</h1>
                    <!-- column price -->
                    @include('shared.pricing',['type'=>'Tokyo','description'=>'Title kdhghsgdh dgs','surface'=>' 128 m²','value'=>'1','duree'=>'128'])
                    @include('shared.pricing',['type'=>'Tokyo','description'=>'Title kdhghsgdh dgs','surface'=>' 128 m²','value'=>'1','duree'=>'128'])
                    @include('shared.pricing',['type'=>'Tokyo','description'=>'Title kdhghsgdh dgs','surface'=>' 128 m²','value'=>'1','duree'=>'128'])
                    @include('shared.pricing',['type'=>'Tokyo','description'=>'Title kdhghsgdh dgs','surface'=>' 128 m²','value'=>'1','duree'=>'128'])
                    <!-- end column price -->
                 </div>
              </div>
           </div>
        </div>
     </div>
     <!-- end price card-->
     <!-- radio button type de finition-->
     <div class="row">
        <h1 class="text-center" >type de finition</h1>
        <div class="col-3">
            <input type="radio" class="btn-check" name="options-base" id="option1" autocomplete="off">
            <label class="btn" for="option1">Radio</label>
        </div>
        <div class="col-3">
            <input type="radio" class="btn-check" name="options-base" id="option2" autocomplete="off">
            <label class="btn" for="option2">Radio</label>
        </div>
        <div class="col-3">
            <input type="radio" class="btn-check" name="options-base" id="option3" autocomplete="off">
            <label class="btn" for="option3">Radio</label>
        </div>
        <div class="col-3">
            <input type="radio" class="btn-check" name="options-base" id="option4" autocomplete="off">
            <label class="btn" for="option4">Radio</label>
        </div>
     </div>
     <!-- end radio button type de finition-->
     <div class="row  justify-content-center">
        <div class="mb-3 col-4">
            <label for="date_debut" class="form-label">Date debut travaux</label>
            <input type="date" class="form-control"  name="date_debut" value="" required>
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
