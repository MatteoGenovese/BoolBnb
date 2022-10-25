<script>

    const apartmentId=document.getElementById('ApaID');
    var visuals=getData();
    
    
    
    function getData(){
        axios.get(`http://127.0.0.1:8000/api/visuals/${apartmentId.value}`)
            .then(response => {
                const visuals=response.data.results.visuals;
                // console.log(typeof visuals);
                divideData(visuals);
                })
            .catch((error) => console.log(error));
    }
    function divideData(visuals){
    
        var totalVisuals=0;
        var VisualsInMonth=[]
    
        visuals.forEach(visual => {
    
            const date = new Date(visual.date);
            const month = date.getMonth();
            if (typeof(VisualsInMonth[month]) == "undefined")
            {
                VisualsInMonth[month]=1;
            }
            else{
                VisualsInMonth[month]=VisualsInMonth[month]+1;
            }
        });
        // console.log(VisualsInMonth);
        getChart(VisualsInMonth);
    
    }
    
    // console.log(ApaID.value);
    
    function getChart(VisualsInMonth){
    
        const labels = [
        'Gennaio',
        'Febbraio',
        'Marzo',
        'Aprile',
        'Maggio',
        'Giugno',
        'Luglio',
        'Agosto',
        'Settembre',
        'Ottobre',
        'Novembre',
        'Dicembre'
        ];
    
        const data = {
        labels: labels,
        datasets: [{
        label: 'Visualizzazioni',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: VisualsInMonth,
        }]
        };
    
        const config = {
        type: 'line',
        data: data,
        options: {}
        };
    
        const myChart = new Chart(
                document.getElementById('myChart'),
                config
                );
    }
    
    
    
    </script>
    
    
    