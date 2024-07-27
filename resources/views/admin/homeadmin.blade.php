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
             <div class="couter_icon">
                <div>
                   <i class="fa fa-user yellow_color"></i>
                </div>
             </div>
             <div class="counter_no">
                <div>
                   <p class="total_no">2500</p>
                   <p class="head_couter">Welcome</p>
                </div>
             </div>
          </div>
       </div>
       <div class="col-md-6 col-lg-3">
          <div class="full counter_section margin_bottom_30">
             <div class="couter_icon">
                <div>
                   <i class="fa fa-clock-o blue1_color"></i>
                </div>
             </div>
             <div class="counter_no">
                <div>
                   <p class="total_no">123.50</p>
                   <p class="head_couter">Average Time</p>
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
                   <h2>Extra Area Chart</h2>
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
                            <th>#</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Age</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>Sex</th>
                            <th>Example</th>
                            <th>Example</th>
                            <th>Example</th>
                            <th>Example</th>
                         </tr>
                      </thead>
                      <tbody>
                         <tr>
                            <td>1</td>
                            <td>Anna</td>
                            <td>Pitt</td>
                            <td>35</td>
                            <td>New York</td>
                            <td>USA</td>
                            <td>Female</td>
                            <td>Yes</td>
                            <td>Yes</td>
                            <td>Yes</td>
                            <td scope="col">
                                <button class="btn btn-info" onclick="openModal('D001')" data-bs-toggle="modal" data-bs-target="#travaux">
                                    devis &nbsp;&nbsp;
                                    <i class="fa fa-file fa-1x"></i>
                                </button>
                            </td>
                         </tr>
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

            </div>
        </div>
    </div>
</div>


 </div>





<script>
    function openModal(reference) {
        console.log(reference);
    }
</script>

@endsection
