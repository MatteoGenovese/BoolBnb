<template>
    <div class="my-5">
        <form class="d-flex flex-column w-50 m-auto" @submit.prevent="sendMessage()" method="POST">
            
            <label for="user">Inserisci il tuo nome completo</label>
            <input type="text" name="user" id="user" v-model="username">
            <label for="email">Inserisci la tua email *</label>
            <input type="email" name="email" id="email" v-model="userEmail">
            <label for="contact-message">Messaggio *</label>
            <textarea name="message" id="contact-message" cols="30" rows="10" v-model="contactMessage" style="resize: none"></textarea>
            <small class="text-danger">* = Campi obbligatori</small>
            <button type="submit" class="mt-3 w-25 align-self-center">Invia</button>

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
        }
    },
    methods: {
        sendMessage() {
            axios.post(`/api/messages?apartment_id=${this.apartment.id}&username=${this.username}&email=${this.userEmail}&message=${this.contactMessage}`)
            .then(response => {console.log(response)})
            .catch(error => console.error(error.response));
        }
    }
}
</script>

<style lang="scss" scoped>

</style>