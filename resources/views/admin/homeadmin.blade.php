@extends('admin.baseadmin')

@section('title','home')

@section('content')

<div class="container-fluid">
    <div class="row column_title">
       <div class="col-md-12">
          <div class="page_title">
             <h2>Dashboard</h2>
          </div>
       </div>
    </div>
    <div class="row column1">
       <div class="col-md-6 col-lg-3">
          <div class="full counter_section margin_bottom_30">
             <div class="counter_no">
                <div>
                   <p class="head_couter">Total devis</p>
                   <p class="total_no"> {{ number_format($montant_total_devis, 2, '.', ' ') }}<span> Ariary </span></p>
                </div>
             </div>
          </div>
       </div>
       <div class="col-md-6 col-lg-3">
          <div class="full counter_section margin_bottom_30">
             <div class="counter_no">
                <div>
                   <p class="head_couter">Somme paiement</p>
                   <p class="total_no">{{number_format($somme_paiement_effectuer,2,'.',' ')}}</p>
                </div>
             </div>
          </div>
       </div>
       <div class="col-md-6 col-lg-3">
          <div class="full counter_section margin_bottom_30">
             <div class="couter_icon">
                <div>
                   <i class="fa fa-cloud-download green_color"></i>
                </div>
             </div>
             <div class="counter_no">
                <div>
                   <p class="total_no">1,805</p>
                   <p class="head_couter">Collections</p>
                </div>
             </div>
          </div>
       </div>
       <div class="col-md-6 col-lg-3">
          <div class="full counter_section margin_bottom_30">
             <div class="couter_icon">
                <div>
                   <i class="fa fa-comments-o red_color"></i>
                </div>
             </div>
             <div class="counter_no">
                <div>
                   <p class="total_no">54</p>
                   <p class="head_couter">Comments</p>
                </div>
             </div>
          </div>
       </div>
    </div>
    <!-- graph -->
    <div class="row column2 graph margin_bottom_30">
       <div class="col-md-l2 col-lg-12">
          <div class="white_shd full">
             <div class="full graph_head">
                <div class="heading1 margin_0">
                    <form id="data_chart">
                        <div class="input-group mb-3">
                            <select class="form-select" id="year" aria-label="Example select with button addon">
                              <option selected>Choisir anner</option>
                              <option value="2022">2022</option>
                              <option value="2023">2023</option>
                              <option value="2024">2024</option>
                            </select>
                            <button class="btn btn-outline-secondary" type="submit">Button</button>
                          </div>
                    </form>
                </div>
             </div>
             <div class="full graph_revenue">
                <div class="row">
                   <div class="col-md-12">
                      <div class="content">
                         <div class="area_chart">
                            <canvas height="120" id="canvas"></canvas>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <!-- end graph -->


     <!-- table section -->
       <div class="col-md-12">
          <div class="white_shd full margin_bottom_30">
             <div class="full graph_head">
                <div class="heading1 margin_0">
                   <h2>Responsive Tables</h2>
                </div>
             </div>
             <div class="table_section padding_infor_info">
                <div class="table-responsive-sm">
                   <table class="table">
                      <thead>
                         <tr>
                            <th scope="col">Ref Devis</th>
                            <th scope="col">Type de Maison</th>
                            <th scope="col">Finition</th>
                            <th scope="col">date reference</th>
                            <th scope="col">date Debut</th>
                            <th scope="col">date fin</th>
                            <th scope="col">Lieu </th>
                            <th scope="col">montant total</th>
                            <th scope="col">montant payé</th>
                            <th scope="col">Action</th>
                         </tr>
                      </thead>
                      <tbody>
                        @foreach ($devis as $devi)
                        <tr>
                            <td scope="col">{{$devi->ref_devis}}</td>
                            <td scope="col">{{$devi->type_maison}}</td>
                            <td scope="col">{{$devi->finition}}</td>
                            <td scope="col">{{$devi->date_reference}}</td>
                            <td scope="col">{{$devi->date_debut}}</td>
                            <td scope="col">{{$devi->date_fin}}</td>
                            <td scope="col">{{$devi->lieu}}</td>
                            <td scope="col">{{$devi->prix_total_travaux}}</td>
                            <td scope="col">{{$devi->somme_paiements}}</td>
                            <td scope="col">
                                <button class="btn btn-info" onclick="openModal('{{$devi->type_maison}}')" data-bs-toggle="modal" data-bs-target="#travaux">
                                    travauc a faire &nbsp;&nbsp;
                                    <i class="fa fa-file fa-1x"></i>
                                </button>
                            </td>
                         </tr>
                        @endforeach
                      </tbody>
                   </table>
                </div>
             </div>
          </div>
       </div>


       <!-- Modal -->
<div class="modal fade" id="travaux" tabindex="-1" aria-labelledby="travauxLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="travauxLabel">Travaux à faire</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <div class="table_section padding_infor_info">
                    <div class="table-responsive-sm">
                       <table class="table">
                          <thead>
                             <tr>
                                <th scope="col">N°</th>
                                <th scope="col">DESIGNATIONS</th>
                                <th scope="col">Unité</th>
                                <th scope="col">Quantité</th>
                                <th scope="col">Prix unitaire</th>
                                <th scope="col">Total</th>
                             </tr>

                          </thead>
                          <tbody>

                          </tbody>
                       </table>
                    </div>
                 </div>



            </div>
        </div>
    </div>
</div>


 </div>

 @section('script')
 <script src="/assets/js/bootstrap.bundle.min.js"></script>
 <script src="/assets/js/chart.min.js"></script>
 <script src="/assets/js/homeadmin.js"></script>
 @endsection
<script>
    function openModal(type_maison) {

    const url = `/admin/travaux?type_maison=${encodeURIComponent(type_maison)}`;


    fetch(url, {
        method: 'get',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if(data.success){
            const tbody = document.querySelector('#travaux .modal-body table tbody');
            tbody.innerHTML = '';
            data.travaux.forEach(travail => {
                    // Créer une nouvelle ligne pour chaque travail
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td scope="col">${travail.code_travaux}</td>
                        <td scope="col">${travail.type_travaux}</td>
                        <td scope="col">${travail.unite}</td>
                        <td scope="col">${travail.quantite}</td>
                        <td scope="col">${travail.prix_unitaire}</td>
                        <td scope="col">${(travail.prix_unitaire * travail.quantite).toFixed(2)}</td>
                    `;
                    tbody.appendChild(row);
                });
        }
    })
    .catch(error => {
        // Gérer les erreurs
        alert(error);
    });

    }
</script>

@endsection
