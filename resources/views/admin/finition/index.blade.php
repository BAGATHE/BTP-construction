@extends('admin.baseadmin')

@section('title','type finition')

@section('content')

<div class="container-fluid">

     <!-- table section -->
       <div class="col-md-12">
          <div class="white_shd full margin_bottom_30">
             <div class="full graph_head">
                <div class="heading1 margin_0">
                   <h2>Type de finition</h2>
                </div>
             </div>
             <div class="table_section padding_infor_info">
                <div class="table-responsive-sm">
                   <table class="table">
                      <thead>
                         <tr>
                            <th scope="col">type finition</th>
                            <th scope="col">prix</th>
                            <th scope="col">taux</th>
                         </tr>
                      </thead>
                      <tbody>
                        @foreach ($finitions as $finition)
                        <tr>
                            <td scope="col">{{$finition->type_finition}}</td>
                            <td scope="col">{{$finition->prix}}</td>
                            <td scope="col">{{$finition->taux_finition}}</td>

                            <td scope="col">
                                <a href="{{ route('admin.finition.edit', $finition->id) }}" class="btn btn-primary">Editer</a>
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
