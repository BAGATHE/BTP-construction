

function updateChart(chart, totalDevis, totalPaiement) {
    // Convertir les résultats en tableaux de 12 mois avec des valeurs
    const devisData = Array(12).fill(0);
    const paiementData = Array(12).fill(0);

    totalDevis.forEach(item => {
        devisData[item.month - 1] = item.total; // Ajuster l'indexation de 0 à 11 pour les mois
    });

    totalPaiement.forEach(item => {
        paiementData[item.month - 1] = item.total; // Ajuster l'indexation de 0 à 11 pour les mois
    });

    chart.data.datasets[0].data = devisData;
    chart.data.datasets[1].data = paiementData;
    chart.update();
}

/*graphique annuelle*/
var annualRevenueCtx = document.getElementById('canvas').getContext('2d');
var annualRevenueChart = new Chart(annualRevenueCtx, {
type: 'bar',
data: {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    datasets: [
        {
            label: 'somme devis',
            data:Array(12).fill(0), // Initialement tous les mois à 0
            //Array(12).fill(0)
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        },
        {
            label: 'total paiement',
            data:Array(12).fill(0),// Initialement tous les mois à 0
            backgroundColor: 'rgba(255, 255, 0, 0.2)', // Jaune avec transparence
            borderColor: 'rgba(255, 255, 0, 1)', // Jaune pour les bordures
            borderWidth: 1
        },
    ]
},
options: {
    scales: {
        y: {
            beginAtZero: true
        }
    }
}
});



document.getElementById('data_chart').addEventListener('submit', function(event) {
    event.preventDefault();

    // Récupérer les données du formulaire
    const year = document.getElementById('year').value;


    // Préparer les données pour l'envoi
    const formData = new FormData();
    formData.append('year', year);


    // Envoyer les données avec fetch
    fetch('/admin/statistiquedevispaiement', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            updateChart(annualRevenueChart, data.total_devis, data.total_paiement);
        }
    })
});


