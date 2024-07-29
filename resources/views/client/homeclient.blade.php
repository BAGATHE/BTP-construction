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
          <th scope="col">date Debut</th>
          <th scope="col">Lieu </th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($devis as $devi )

        <tr>
            <td scope="col">{{$devi->ref_devis}}</td>
            <td scope="col">{{$devi->type_maison}}</td>
            <td scope="col">{{$devi->finition}}</td>
            <td scope="col">{{$devi->date_debut}}</td>
            <td scope="col">{{$devi->lieu}}</td>
            <td scope="col">
                <button class="btn btn-info" onclick="openModal('{{$devi->ref_devis}}')" data-bs-toggle="modal" data-bs-target="#paymentModal">
                    Effectuer payement
                </button>
            </td>
            <td scope="col">
                <a href="{{ route('client.devis.exportPDF', ['type_maison' => $devi->type_maison]) }}" >
                    Devis &nbsp;&nbsp;
                    <i class="fa fa-file  fa-1x"></i>
                </a>
            </td>

            </tr>

        @endforeach

      </tbody>
    </table>
      </div>
      <div class="card-footer text-body-secondary">
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
        @endif
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

    // Récupérer les données du formulaire
    const reference = document.getElementById('reference').value;
    const amount = document.getElementById('amount').value;
    const date = document.getElementById('paymentDate').value;

    // Préparer les données pour l'envoi
    const formData = new FormData();
    formData.append('reference', reference);
    formData.append('amount',amount);
    formData.append('date',date);

    // Envoyer les données avec fetch
    fetch('/client/payement', { // Remplacez '/your-controller-route' par l'URL de votre route
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        // Gérer la réponse du serveur
        alert('Message: ' + data.message);
    })
    .catch(error => {
        // Gérer les erreurs
        console.error('Error:', error);
    });
});

</script>
@endsection
