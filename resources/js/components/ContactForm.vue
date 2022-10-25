<template>
    <div id="contactForm" class="col-12 col-lg-4" tabindex="4">

        <form class="p-4" @submit.prevent="sendMessage()" method="POST">

            <div class="p-3">
                <h5>
                    Contattami per ulteriori Informazioni
                </h5>


                <label for="username" class="form-label">Nome</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="username" placeholder="Inserisci nome e cognome..." v-model="username">
                </div>

                <label for="email" class="form-label">Email*</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="email" placeholder="Inserisci la tua email..." v-model="userEmail">
                </div>

                <label for="message" class="form-label">Messaggio*</label>
                <div class="input-group">
                    <textarea class="form-control" rows="3" id="message" aria-label="With textarea" style="resize: none" placeholder="Salve, vorrei più informazioni riguardo..." v-model="contactMessage"></textarea>
                </div>
                <small class="text-danger">* = Campi obbligatori</small>

                <div class="text-center" v-if="isMessageSent">
                    <h4 class="text-success">Messaggio inviato!</h4>
                </div>
                <div class="text-center" v-else>
                    <button type="submit" class="mt-3 btn btn-lg brand-btn-1">Invia</button>
                </div>
            </div>

        </form>
    </div>

    </template>

<script>

import axios from "axios";

export default {
    name: "ContactForm",
    props: {
        apartment: {
            type: [Object, Array],
            required: true
        }
    },
    data: function() {
        return {
            username: "",
            userEmail: "",
            contactMessage: "",
            isMessageSent: false,
        }
    },
    methods: {

        isEmail(input) {

            let validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            if (input.match(validRegex)) return true; 
            else return false;
        },

        sendMessage() {

            if(this.isEmail(this.userEmail)) {

                if(this.contactMessage.length > 5 ) {

                    
                    axios.post(`/api/messages?apartment_id=${this.apartment.id}&username=${this.username}&email=${this.userEmail}&message=${this.contactMessage}`)
                    .then(response => {
                        this.username = "";
                        this.userEmail = "";
                        this.contactMessage = "";
                        this.isMessageSent = true;
                        this.$emit("messageSent", true);

                    })
                    .catch(error => console.error(error.response));
                } else {
                    alert("Il messaggio è troppo corto.")
                }
            } else {
                alert("La mail non è valida.")
            }
        }
    }
}
</script>

<style lang="scss" scoped>
    #contactForm{

        form{
            position: sticky;
            border: 1px solid rgba(gray, .3);
            top: 20px;
            border-radius: 5px;
            box-shadow: -4px 4px 12px -5px rgba(0,0,0,0.2);
            -webkit-box-shadow: -4px 4px 12px -5px rgba(0,0,0,0.2);
            -moz-box-shadow: -4px 4px 12px -5px rgba(0,0,0,0.2);
        }
    }
</style>