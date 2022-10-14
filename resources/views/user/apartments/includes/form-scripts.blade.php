<script>

    const title = document.getElementById("title");
    const description = document.getElementById("description");
    const services = document.getElementById("services");
    const bathroomNo = document.getElementById("bathroom-no");
    const bedNo = document.getElementById("bed-no");
    const roomsNo = document.getElementById("rooms-no");
    const squareMeters = document.getElementById("square-meters");
    const address = document.getElementById("address");
    const upload = document.getElementById("upload");
    const submitButton = document.getElementById('submit-button');
    let isValid = true;

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
</script>