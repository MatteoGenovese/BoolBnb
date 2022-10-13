@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" autocomplete="surname" autofocus>

                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Date of birth') }}</label>

                            <div class="col-md-6">
                                <input id="date_of_birth" type="date" class="form-control" name="date_of_birth" autocomplete="date_of_birth">
                                {{-- // FIXME: Messaggio di errore --}}
                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button id="register-button" type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <button id="bottone">bottone</button>
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
        const bottone = document.getElementById('bottone');
        let isValid = false;

        bottone.addEventListener("click", function() {
            alert("ciao")
        })

        function setError(input){
            input.classList.remove('is-valid');
            input.classList.add('is-invalid');
        }
        
        function setSuccess(input){
            input.classList.remove('is-invalid');
            input.classList.add('is-valid');
        }
        const currentDate = moment().format("YYYY-M-D");

        const date = new Date();

        console.log(date);


        function checkInputs(){
            const nameValue = name.value.trim();
            const surnameValue = surname.value.trim();
            const emailValue = email.value.trim();
            const passwordValue = password.value.trim();
            const passwordConfirmValue = passwordConfirm.value.trim();
            const date_of_birthValue = date_of_birth.value;

            if(!nameValue.length === 0){
                if(nameValue.length <= 3 || nameValue.length > 20){
                    setError(name);
                }else{
                    setSuccess(name);
                }
            }

            if(!surnameValue.length === 0){
                if(surnameValue.length <= 2 || surnameValue.length > 25){
                    setError(surname);
                }else{
                    setSuccess(surname);
                }
            }

            function isEmail(email) {
                return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
            }

            if(emailValue.length === 0 || !isEmail(emailValue)){
                setError(email);
            }else{
                setSuccess(email);
            }

            if(passwordValue.length <= 8 || passwordValue.length > 10 || !(/[0-9]/.test(passwordValue)) ){
                setError(password);
            }else{
                setSuccess(password);
            }

            if(passwordValue === passwordConfirmValue) {
                setSuccess(passwordConfirm)
            } else {
                setError(passwordConfirm)
            }
            console.log(date_of_birthValue);
            if(date_of_birthValue < superCurrentDate) {
                console.warn("daje")
            }

            
        }

        formElement.addEventListener('submit', function(submit) {

            submit.preventDefault();
            checkInputs();
        })


    </script>
@endsection
