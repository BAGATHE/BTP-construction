@extends('client.baseclient')

@section('title','Devis')

@section('content')
<div class="row">
 <div class="col-12">
    <div class="card text-center">
      <div class="card-header">
        <div class="d-flex justify-content-between align-items-centers">
            <h3>Devis</h3>
            <a href="{{route('client.devis.create')}}" class="btn btn-outline-info d-inline-flex align-items-center" type="button">
                Add Devis &nbsp;&nbsp;
                <i class="fa fa-plus  fa-2x"></i>
            </a>
         </div>
      </div>
      <div class="card-body overflow-auto">
      <table class="table caption-top">
      <caption>List De devis</caption>
      <thead>
        <tr>
          <th scope="col">Ref Devis</th>
          <th scope="col">Type de Maison</th>
          <th scope="col">Finition</th>
          <th scope="col">date Devis</th>
          <th scope="col">date Debut</th>
          <th scope="col">Lieu </th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
            <td scope="col">D001</td>
        <td scope="col">Tokyo</td>
        <td scope="col">Gold</td>
        <td scope="col">22/12/23</td>
        <td scope="col">07/01/24</td>
        <td scope="col">Imeritsiatosika</td>
        <td scope="col">
            <button class="btn btn-info" onclick="openModal('D001')" data-bs-toggle="modal" data-bs-target="#paymentModal">
                Effectuer payement
            </button>
        </td>
        <td scope="col">
            <a href="" >
                Devis &nbsp;&nbsp;
                <i class="fa fa-file  fa-1x"></i>
            </a>
        </td>

        </tr>

        <tr>
            <td scope="col">D041</td>
        <td scope="col">Tokyo</td>
        <td scope="col">Gold</td>
        <td scope="col">22/12/23</td>
        <td scope="col">07/01/24</td>
        <td scope="col">Imeritsiatosika</td>
        <td scope="col">
            <button class="btn btn-info" onclick="openModal('D041')" data-bs-toggle="modal" data-bs-target="#paymentModal">
                Effectuer payement
            </button>
        </td>
        <td scope="col">
            <a href="" >
                Devis &nbsp;&nbsp;
                <i class="fa fa-file  fa-1x"></i>
            </a>
        </td>

        </tr>


      </tbody>
    </table>
      </div>
      <div class="card-footer text-body-secondary">
        <h5 class="text-center">footer</h5>

      </div>
    </div>


</div>
</div>

 <!-- Modal -->
 <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Effectuer payement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="paymentForm">
                    <div class="mb-3">
                        <label for="reference" class="form-label">Référence Devis</label>
                        <input type="text" class="form-control" id="reference" name="reference" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Montant</label>
                        <input type="number" class="form-control" id="amount" name="amount" required>
                    </div>
                    <div class="mb-3">
                        <label for="paymentDate" class="form-label">Date de Payement</label>
                        <input type="date" class="form-control" id="paymentDate" name="paymentDate" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function openModal(reference) {
        document.getElementById('reference').value = reference;
    }

    document.getElementById('paymentForm').addEventListener('submit', function(event) {
        event.preventDefault();
        // Handle form submission here
        alert('Form submitted with reference: ' + document.getElementById('reference').value);
        // You can add AJAX code here to submit the form data to the backend
    });
</script>
@endsection
