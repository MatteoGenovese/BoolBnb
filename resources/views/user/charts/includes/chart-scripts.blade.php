<script>

const apartmentId=document.getElementById('ApaID');

axios.get(`http://127.0.0.1:8000/api/visuals/${apartmentId.value}`)
        .then(response => {
            console.log(response);
            })
        .catch((error) => console.log(error));

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
label: 'My First dataset',
backgroundColor: 'rgb(255, 99, 132)',
borderColor: 'rgb(255, 99, 132)',
data: [0, 10, 5, 2, 20, 30, 45],
}]
};

// const config = {
// type: 'line',
// data: data,
// options: {}
// };

// const myChart = new Chart(
//           document.getElementById('myChart'),
//           config
//         );



</script>


