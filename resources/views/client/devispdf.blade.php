<!DOCTYPE html>
<html>

<head>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            width: 100%; /* Assurez-vous que la table prend toute la largeur disponible */
        }

        th, td {
            padding: 5px;
            text-align: left;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            margin-bottom: 5px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header ul {
            margin: 0;
        }

        .container {
            width: 100%;
        }
    </style>
</head>

<body>
<main style="display: flex;justify-content:center;">
    <div>
        <div style="display: flex;gap:30vw;" >
            <ul>
                <li>Reference:   {{ $global_devis->ref_devis }}</li>
                <li>Type Maison: {{ $global_devis->type_maison }}</li>
                <li>Finition:  {{ $global_devis->finition }}</li>
                <li>Date debut: {{ $global_devis->date_debut }}</li>
                <li>Date fin: {{ $global_devis->date_fin }}</li>
                <li>Lieu: {{ $global_devis->lieu }}</li>
            </ul>
            <img  src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBVcGxvYWRlZCB0bzogU1ZHIFJlcG8sIHd3dy5zdmdyZXBvLmNvbSwgR2VuZXJhdG9yOiBTVkcgUmVwbyBNaXhlciBUb29scyAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgDQoJIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IHg9IjUxLjI3MyIgeT0iMTQ3LjUxOSIgc3R5bGU9ImZpbGw6I0ZGQzQ3MzsiIHdpZHRoPSIxMDguNjY5IiBoZWlnaHQ9IjMzMS4xOTEiLz4NCjxyZWN0IHg9IjM1Mi4wNTciIHk9IjE0Ni40MzIiIHN0eWxlPSJmaWxsOiNGRkE5MUY7IiB3aWR0aD0iMTA4LjY2OSIgaGVpZ2h0PSIzMzEuMTkxIi8+DQo8cmVjdCB4PSIxNDQuMjY5IiB5PSIzMy4yOSIgc3R5bGU9ImZpbGw6I0FFQURCMzsiIHdpZHRoPSIyMjMuNDYyIiBoZWlnaHQ9IjQyOS43NDYiLz4NCjxyZWN0IHg9IjI1NS4zMSIgeT0iMzMuMjkiIHN0eWxlPSJmaWxsOiM4Qjg4OTI7IiB3aWR0aD0iMTEyLjQyMSIgaGVpZ2h0PSI0MjkuNzQ2Ii8+DQo8cmVjdCB4PSIyMzAuNCIgeT0iMzYzLjQ3OCIgc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIHdpZHRoPSI1MS4yIiBoZWlnaHQ9Ijk5LjU1OCIvPg0KPHJlY3QgeD0iMjU1LjMxIiB5PSIzNjMuNDc4IiBzdHlsZT0iZmlsbDojQzhDNkNEOyIgd2lkdGg9IjI2LjI5IiBoZWlnaHQ9Ijk5LjU1OCIvPg0KPGc+DQoJPHJlY3QgeD0iMTg4LjE3NiIgeT0iNzUuMDk3IiBzdHlsZT0iZmlsbDojRkZGRkZGOyIgd2lkdGg9IjMyLjE5MiIgaGVpZ2h0PSIzMi4xOTIiLz4NCgk8cmVjdCB4PSIyMzkuOTA5IiB5PSI3NS4wOTciIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiB3aWR0aD0iMzIuMTgzIiBoZWlnaHQ9IjMyLjE5MyIvPg0KCTxyZWN0IHg9IjI5MS42MzEiIHk9Ijc1LjA5NyIgc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIHdpZHRoPSIzMi4xODMiIGhlaWdodD0iMzIuMTkzIi8+DQoJPHJlY3QgeD0iMTg4LjE3NiIgeT0iMTI1Ljc3NCIgc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIHdpZHRoPSIzMi4xOTIiIGhlaWdodD0iMzIuMTkyIi8+DQoJPHJlY3QgeD0iMjM5LjkwOSIgeT0iMTI1Ljc3NCIgc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIHdpZHRoPSIzMi4xODMiIGhlaWdodD0iMzIuMTkzIi8+DQoJPHJlY3QgeD0iMjkxLjYzMSIgeT0iMTI1Ljc3NCIgc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIHdpZHRoPSIzMi4xODMiIGhlaWdodD0iMzIuMTkzIi8+DQoJPHJlY3QgeD0iMTg4LjE3NiIgeT0iMTc2LjQ1MiIgc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIHdpZHRoPSIzMi4xOTIiIGhlaWdodD0iMzIuMTkyIi8+DQoJPHJlY3QgeD0iMjM5LjkwOSIgeT0iMTc2LjQ1MiIgc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIHdpZHRoPSIzMi4xODMiIGhlaWdodD0iMzIuMTkzIi8+DQoJPHJlY3QgeD0iMjkxLjYzMSIgeT0iMTc2LjQ1MiIgc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIHdpZHRoPSIzMi4xODMiIGhlaWdodD0iMzIuMTkzIi8+DQoJPHJlY3QgeD0iMTg4LjE3NiIgeT0iMjI3LjEyOSIgc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIHdpZHRoPSIzMi4xOTIiIGhlaWdodD0iMzIuMTkyIi8+DQoJPHJlY3QgeD0iMjM5LjkwOSIgeT0iMjI3LjEyOSIgc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIHdpZHRoPSIzMi4xODMiIGhlaWdodD0iMzIuMTkzIi8+DQoJPHJlY3QgeD0iMjkxLjYzMSIgeT0iMjI3LjEyOSIgc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIHdpZHRoPSIzMi4xODMiIGhlaWdodD0iMzIuMTkzIi8+DQo8L2c+DQo8Zz4NCgk8cmVjdCB4PSIxNDQuMjY5IiB5PSIzMDAuMjUxIiBzdHlsZT0iZmlsbDojNTc1NTVDOyIgd2lkdGg9IjIyMy40NjIiIGhlaWdodD0iMzEuMzQ3Ii8+DQoJPHJlY3QgeT0iNDQ3LjM2MyIgc3R5bGU9ImZpbGw6IzU3NTU1QzsiIHdpZHRoPSI1MTIiIGhlaWdodD0iMzEuMzQ3Ii8+DQo8L2c+DQo8cmVjdCB4PSIyNTUuMzEiIHk9IjMwMC4yNTEiIHN0eWxlPSJmaWxsOiMyQjI5MkM7IiB3aWR0aD0iMTEyLjQyMSIgaGVpZ2h0PSIzMS4zNDciLz4NCjxnPg0KCTxyZWN0IHg9IjI1NS4zMSIgeT0iNzUuMDk3IiBzdHlsZT0iZmlsbDojQzhDNkNEOyIgd2lkdGg9IjE2Ljc4MSIgaGVpZ2h0PSIzMi4xOTMiLz4NCgk8cmVjdCB4PSIyNTUuMzEiIHk9IjEyNS43NzQiIHN0eWxlPSJmaWxsOiNDOEM2Q0Q7IiB3aWR0aD0iMTYuNzgxIiBoZWlnaHQ9IjMyLjE5MyIvPg0KCTxyZWN0IHg9IjI1NS4zMSIgeT0iMTc2LjQ1MiIgc3R5bGU9ImZpbGw6I0M4QzZDRDsiIHdpZHRoPSIxNi43ODEiIGhlaWdodD0iMzIuMTkzIi8+DQoJPHJlY3QgeD0iMjU1LjMxIiB5PSIyMjcuMTI5IiBzdHlsZT0iZmlsbDojQzhDNkNEOyIgd2lkdGg9IjE2Ljc4MSIgaGVpZ2h0PSIzMi4xOTMiLz4NCgk8cmVjdCB4PSIyOTEuNjMxIiB5PSI3NS4wOTciIHN0eWxlPSJmaWxsOiNDOEM2Q0Q7IiB3aWR0aD0iMzIuMTgzIiBoZWlnaHQ9IjMyLjE5MyIvPg0KCTxyZWN0IHg9IjI5MS42MzEiIHk9IjEyNS43NzQiIHN0eWxlPSJmaWxsOiNDOEM2Q0Q7IiB3aWR0aD0iMzIuMTgzIiBoZWlnaHQ9IjMyLjE5MyIvPg0KCTxyZWN0IHg9IjI5MS42MzEiIHk9IjE3Ni40NTIiIHN0eWxlPSJmaWxsOiNDOEM2Q0Q7IiB3aWR0aD0iMzIuMTgzIiBoZWlnaHQ9IjMyLjE5MyIvPg0KCTxyZWN0IHg9IjI5MS42MzEiIHk9IjIyNy4xMjkiIHN0eWxlPSJmaWxsOiNDOEM2Q0Q7IiB3aWR0aD0iMzIuMTgzIiBoZWlnaHQ9IjMyLjE5MyIvPg0KPC9nPg0KPHJlY3QgeD0iMjU1LjMxIiB5PSI0NDcuMzYzIiBzdHlsZT0iZmlsbDojMkIyOTJDOyIgd2lkdGg9IjI1Ni42OSIgaGVpZ2h0PSIzMS4zNDciLz4NCjwvc3ZnPg==" alt="logo" width="80vw" alt="">
        </div>

    <table>
        <tr>
            <th>N°</th>
            <th>DESIGNATIONS</th>
            <th>U</th>
            <th>Q</th>
            <th>PU</th>
            <th>TOTAL</th>
        </tr>
        @foreach($devis as $devi )
        <tr>
            <td>{{$devi->code_travaux}}</td>
            <td>{{$devi->type_travaux}}</td>
            <td>{{$devi->unite}}</td>
            <td>{{$devi->quantite}}</td>
            <td>{{$devi->prix_unitaire}}</td>
            <td>{{$devi->quantite * $devi->prix_unitaire }}</td>
        </tr>

        @endforeach


        <tr>
            <td colspan="5">TOTAL Devis</td>
            <td>{{$total}}</td>
        </tr>
    </table>
    </div>
</main>
</body>

</html>
