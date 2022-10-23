<template>
    <div class="my-5">
        <form class="d-flex flex-column w-50 m-auto" @submit.prevent="sendMessage()" method="POST">
            
            <label for="user">Inserisci il tuo nome completo</label>
            <input type="text" name="user" id="user" v-model="username">
            <label for="email">Inserisci la tua email *</label>
            <input type="text" name="email" id="email"  v-model="userEmail">
            <label for="contact-message">Messaggio *</label>
            <textarea name="message" id="contact-message" required cols="30" rows="10" v-model="contactMessage" style="resize: none"></textarea>
            <small class="text-danger">* = Campi obbligatori</small>
            <button type="submit" class="mt-3 w-25 align-self-center btn btn-lg brand-btn-1" :disabled="isMessageSent" > {{submitButton}} </button>

        </form>
    </div>

    </template>

<script>

import axios from "axios";

export default {
    name: "ContactForm",
    props: {
        apartment: {
            type: Object,
            required: true
        }
    },
    data: function() {
        return {
            username: "",
            userEmail: "",
            contactMessage: "",
            submitButton: "Invia",
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

                axios.post(`/api/messages?apartment_id=${this.apartment.id}&username=${this.username}&email=${this.userEmail}&message=${this.contactMessage}`)
                    .then(response => {
                        this.username = "";
                        this.userEmail = "";
                        this.contactMessage = "";
                        this.submitButton = "Messaggio inviato"
                        this.isMessageSent = true;
                    }
                )
                .catch(error => console.error(error.response));
            } else {
                alert("mail non valida")
            }
        }
    }
}
</script>

<style lang="scss" scoped>

</style>