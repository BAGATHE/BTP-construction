@extends('admin.baseadmin')

@section('title','type travaux')

@section('content')

<div class="container-fluid">





     <!-- table section -->
       <div class="col-md-12">
          <div class="white_shd full margin_bottom_30">
             <div class="full graph_head">
                <div class="heading1 margin_0">
                   <h2>Type de Travaux</h2>
                </div>
             </div>
             <div class="table_section padding_infor_info">
                <div class="table-responsive-sm">
                   <table class="table">
                      <thead>
                         <tr>
                            <th scope="col">code_travaux</th>
                            <th scope="col">type_travaux</th>
                            <th scope="col">unite</th>
                            <th scope="col">quantite</th>
                            <th scope="col">prix_unitaire</th>
                         </tr>
                      </thead>
                      <tbody>
                        @foreach ($travaux as $travo)
                        <tr>
                            <td scope="col">{{$travo->code_travaux}}</td>
                            <td scope="col">{{$travo->type_travaux}}</td>
                            <td scope="col">{{$travo->unite}}</td>
                            <td scope="col">{{$travo->quantite}}</td>
                            <td scope="col">{{$travo->prix_unitaire}}</td>
                            <td scope="col">
                                <a href="{{ route('admin.typetravaux.edit', $travo->id) }}" class="btn btn-primary">Editer</a>
                            </td>
                         </tr>
                        @endforeach
                      </tbody>
                   </table>
                </div>
             </div>
          </div>
       </div>
 </div>
@endsection

@section('script')

@endsection
