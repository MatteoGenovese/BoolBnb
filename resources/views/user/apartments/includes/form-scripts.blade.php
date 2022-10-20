<script>

    const formElement = document.querySelector(".crud-form");
    const title = document.getElementById("title");
    const description = document.getElementById("description");
    const services = document.querySelectorAll(".services-check");
    const bathroomNo = document.getElementById("bathroom-no");
    const bedNo = document.getElementById("bed-no");
    const roomsNo = document.getElementById("rooms-no");
    const squareMeters = document.getElementById("square-meters");
    const address = document.getElementById("address");
    const addresses = document.getElementById("addresses");
    const lat = document.getElementById("lat");
    const lon = document.getElementById("lon");
    const submitButton = document.getElementById('submit-button');
    const inputFields = document.querySelectorAll("input:not(#upload, #lat, #lon)");
    const photo = document.getElementById('upload');
    const tagsCheck = document.getElementById('tagsCheck');
    const URLpath = window.location.href;
    let isValid = false;

    const apiUrl = "https://api.tomtom.com/search/2/search/";
    const apiKey = "idKostWqefAIHb9WKcGcOklsshiC2KtN";
    const country='IT';
    let addressesResult = [];
    let latValues = [];
    let lonValues = [];
    let addressIndex = 0;
    let isTimeoutCompleted = false;

    // l'address inserito non deve essere valido se metto cose a cazzo
    // deve avere una lat e lon ! se vuoti non si submitmitta 
    //  se lat e lon non sono valide non convalidare l'indirizzo e le cancelliamo ad ogni ricerca
    // ad ogni keyup resetto lat o lon 

    function searchAddress() {
        axios.get(`${apiUrl}${address.value}.json?key=${apiKey}&countrySet=${country}&typeahead=true&limit=4`)
        .then(response => {
            addressesResult = response.data.results;

            let addressAutocomplete;

            addresses.innerHTML = "";

            addressesResult.forEach((result, index) => {


                    addressAutocomplete = document.createElement("li");
                    addressAutocomplete.classList.add("list-group-item", "list-group-item-action");
                    addressAutocomplete.setAttribute('role','button');

                    addressAutocomplete.value = result.address.freeformAddress + ", " + result.address.countrySubdivision;
                    addressAutocomplete.innerHTML = result.address.freeformAddress + ", " + result.address.countrySubdivision;

                    addressAutocomplete.addEventListener("click", function(){

                        setSuccess(address);

                        lat.value = addressesResult[index].position.lat;
                        lon.value = addressesResult[index].position.lon;

                        address.value = result.address.freeformAddress + ", " + result.address.countrySubdivision;
                        address.innerHTML = result.address.freeformAddress + ", " + result.address.countrySubdivision;
                        addresses.innerHTML = "";

                    })

                    addresses.append(addressAutocomplete);


            })
            isTimeoutCompleted = true;
        })

        .catch((error) => console.log(error));
    }

    let search;
    address.addEventListener("keyup", function(){

        lat.value = '';
        lon.value = '';

        setError(address);

        isTimeoutCompleted = false;
        clearTimeout(search);
        if(address.value.length != 0) {
            search = setTimeout(searchAddress,500);
        }
    })

    function setError(input){
        input.classList.remove('is-valid');
        input.classList.add('is-invalid');
    }

    function setSuccess(input){
        input.classList.remove('is-invalid');
        input.classList.add('is-valid');
    }

    function removeValid(input){
        input.classList.remove('is-invalid');
        input.classList.remove('is-valid');
    }


    function typeCheck(input, conditionOne, conditionTwo) {
        input.addEventListener('keyup', function(){
            if(input.value.trim() == ''){
                removeValid(input);
                submitButton.removeAttribute('disabled', "");
            }else if(input.value.length <= conditionOne || input.value.length > conditionTwo){
                setError(input);
                submitButton.setAttribute('disabled', "");
            }else{
                setSuccess(input);
                submitButton.removeAttribute('disabled', "");
            }
        })
    };

    function numberCheck(input, conditionOne, conditionTwo) {
        input.addEventListener('change', function(){
            if(input.value == ''){
                removeValid(input);
                submitButton.removeAttribute('disabled', "");
            }else if(input.value < conditionOne || input.value > conditionTwo || isNaN(input.value)){
                setError(input);
                submitButton.setAttribute('disabled', "");
            }else{
                setSuccess(input);
                submitButton.removeAttribute('disabled', "");
            }
        })
    };

    photo.addEventListener('change', function() {
        if(photo.files.length === 0){
            setError(photo);
        }else{
            setSuccess(photo);
        }
    });


    services.forEach(service => {
        service.addEventListener('change', function() {
            if (service.checked) {
                setSuccess(tagsCheck);
            }
        })
    })


    typeCheck(title, 10, 100);
    typeCheck(description, 10, 100);
    numberCheck(bathroomNo, 1, 10);
    numberCheck(bedNo, 1, 10);
    numberCheck(roomsNo, 1, 20);
    numberCheck(squareMeters, 30, 1000);

formElement.addEventListener('submit', function(submit) {

    submit.preventDefault();
    isValid = true;

    inputFields.forEach(input => {
        if(input.value.length === 0){
            setError(input);
        }
    });

    if(lat.value == ''){
        setError(address);
    }else{
        setSuccess(address);
    }

    if(description.value.length === 0){
        setError(description);
    }

    if(!URLpath.includes('edit')){
        if(photo.files.length === 0){
            setError(photo);
        }else{
            setSuccess(photo);
        }
    }

    let hasChecks = false;

    services.forEach(service => {
        if (service.checked) {
            hasChecks = true;
        }
    })
    
    if(!hasChecks){
        setError(tagsCheck);
    }else{
        setSuccess(tagsCheck);
    }

    inputFields.forEach(input => {
        if (input.classList.contains("is-invalid") || description.classList.contains("is-invalid") || !hasChecks) {
            isValid = false;
    }})

    if (isValid === true) {
        formElement.submit()
    }
})

</script>
