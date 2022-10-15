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
    const submitButton = document.getElementById('submit-button');
    const inputFields = document.querySelectorAll("input:not(#upload)");
    let isValid = false;

    const apiUrl = "api.tomtom.com/search/2/search/";
    const apiKey = "idKostWqefAIHb9WKcGcOklsshiC2KtN";

    address.addEventListener("keyup", function(){
        // axios.get(apiUrl + address.value + ".json?key=" + apiKey + "&language=it-IT&countrySet=IT&limit=4")
        axios.get(`${apiUrl}${address.value}.json?key=${apiKey}&language=it-IT&countrySet=IT&limit=4`)
        .then(response => console.log(response))
        .catch((error) => console.log(error));

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

        
        typeCheck(title, 10, 100);
        typeCheck(description, 10, 100);
        numberCheck(bathroomNo, 1, 10);
        numberCheck(bedNo, 1, 10);
        numberCheck(roomsNo, 1, 20);
        numberCheck(squareMeters, 30, 1000);
        typeCheck(address, 5, 100);

formElement.addEventListener('submit', function(submit) {

    submit.preventDefault();
    isValid = true;

    let hasChecks = false;

    services.forEach(service => {
            if (service.hasAttributes("checked")) {
                hasChecks = true;
            }
        })

    inputFields.forEach(input => {
            if (input.classList.contains("is-invalid") || input.value.length === 0 || description.classList.contains("is-invalid") || !hasChecks) {
                isValid = false;
        }})

    if (isValid === true) {
        formElement.submit()
    }
})

</script>