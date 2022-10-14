@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrazione') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" class="needs-validation">
                        @csrf

                        
                        <div class="form-group row mt-4 position-relative">
    
                            <label for="name" class="col-md-4 col-form-label mt-3 text-end">Nome</label>

                            <div class="col-md-6 mt-3 mt-2">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    
                                <div class="invalid-tooltip mt-1">
                                    Il nome deve essere lungo almeno 4 caratteri e più corto di 20.
                                </div>
                            </div>

                        </div>

                        <div class="form-group row mt-4 position-relative">
                            <label for="surname" class="col-md-4 col-form-label mt-3 text-end">Cognome</label>

                            <div class="col-md-6 mt-3">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" autocomplete="surname" autofocus>

                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    
                                <div class="invalid-tooltip mt-1">
                                    Il cognome deve essere lungo almeno 3 caratteri e più corto di 25.
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mt-4 position-relative">
                            <label for="email" class="col-md-4 col-form-label mt-3 text-end">E-mail *</label>

                            <div class="col-md-6 mt-3">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required value="{{ old('email') }}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror    
                                <div class="invalid-tooltip mt-1">
                                    L'e-mail non è valida.
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mt-4 position-relative">
                            <label for="password" class="col-md-4 col-form-label mt-3 text-end">Password *</label>

                            <div class="col-md-6 mt-3">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror    
                                <div class="invalid-tooltip mt-1">
                                    La password deve essere lunga almeno 9 caratteri e contenere almeno un numero.
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mt-4 position-relative">
                            <label for="password-confirm" class="col-md-4 col-form-label mt-3 text-end">Conferma la password *</label>

                            <div class="col-md-6 mt-3">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    
                                <div class="invalid-tooltip mt-1">
                                    Le password non sono uguali.
                                </div>
                            </div>
                            
                        </div>

                        <div class="form-group row mt-4 position-relative">
                            <label for="date_of_birth" class="col-md-4 col-form-label mt-3 text-end">Data di nascita</label>

                            <div class="col-md-6 mt-3">
                                <input id="date_of_birth" type="date" class="form-control" name="date_of_birth" autocomplete="date_of_birth">
                                {{-- // FIXME: Messaggio di errore --}}
                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    
                                <div class="invalid-tooltip mt-1">
                                    Vieni dal futuro?
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0 mt-3 text-end">
                            
                            <div class="col-md-6 mt-3 offset-md-4 d-flex justify-content-between">
                                
                            <div class="text-start text-danger">
                                * = Campi obbligatori
                            </div>
                                
                                <button id="register-button" type="submit" class="btn btn-primary">
                                    Registrati
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('bottom-scripts')
<script type="application/javascript" defer>
        
        const formElement = document.querySelector('form');
        const name = document.getElementById('name');
        const surname = document.getElementById('surname');
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const passwordConfirm = document.getElementById('password-confirm');
        const date_of_birth = document.getElementById('date_of_birth');
        const registerButton = document.getElementById('register-button');
        let isValid = true;

        const currentDate = new Date();

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

        function isEmail(email) {
            return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
        }

        function typeCheck(input, conditionOne, conditionTwo) {
            input.addEventListener('keyup', function(){
                if(input.value.trim() == ''){
                    removeValid(input);
                    registerButton.removeAttribute('disabled', "");
                }else if(input.value.length <= conditionOne || input.value.length > conditionTwo){
                    setError(input);
                    registerButton.setAttribute('disabled', "");
                }else{ 
                    setSuccess(input);
                    registerButton.removeAttribute('disabled', "");
                }
            })
        }

        email.addEventListener('keyup', function(){
        if(email.value.trim() == ''){
            removeValid(email)
            isValid = false;
            registerButton.removeAttribute('disabled', "");
        }else if(!isEmail(email.value)){
            setError(email);
            registerButton.setAttribute('disabled', "");
        }else{ 
            setSuccess(email);
            registerButton.removeAttribute('disabled', "");
        }
    });

    password.addEventListener('keyup', function(){
        if(password.value.trim() == ''){
            removeValid(password);
            isValid = false;
            registerButton.removeAttribute('disabled', "");
            passcheck();
        }else if(password.value.length < 8 || password.value.length > 100 || !(/[0-9]/.test(password.value))){
            setError(password);
            registerButton.setAttribute('disabled', "");
            passcheck()
        }else{ 
            setSuccess(password);
            registerButton.removeAttribute('disabled', "");
            passcheck()
        }
    });

    function passcheck(){
        if(password.value !== passwordConfirm.value){
            setError(passwordConfirm);
            registerButton.setAttribute('disabled', "");
        }
    }

    passwordConfirm.addEventListener('keyup', function(){
        if(passwordConfirm.value.trim() == ''){
            removeValid(passwordConfirm);
            isValid = false;
            registerButton.removeAttribute('disabled', "");
        }else if(password.value !== passwordConfirm.value){
            setError(passwordConfirm);
            registerButton.setAttribute('disabled', "");
        }else{ 
            setSuccess(passwordConfirm);
            registerButton.removeAttribute('disabled', "");
        }
    
    });

    date_of_birth.addEventListener('change', function(){

        const birthDateCheck = new Date(date_of_birth.value);

        if(birthDateCheck <= currentDate) {
            setSuccess(date_of_birth);
            registerButton.removeAttribute('disabled', "");
        } else {
            setError(date_of_birth);
            registerButton.setAttribute('disabled', "");
        }
    });

    typeCheck(name, 3, 20);
    typeCheck(surname, 2, 25);

    let inputFields = document.querySelectorAll("input");

    formElement.addEventListener('submit', function(submit) {

        submit.preventDefault();

        isValid = true;
        inputFields.forEach(input => {
            if (input.classList.contains("is-invalid") || email.value.length === 0 || password.value.length === 0 || passwordConfirm.value.length === 0) {
                isValid = false;
        }})

        console.log(isValid);


        if (isValid === true) {
            formElement.submit()
        }
    })


    </script>
@endsection
