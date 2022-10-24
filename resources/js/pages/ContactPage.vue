<template>
<div class="container">
    <h3>Contact Us</h3> 
    <div v-if="success" class="alert alert-primary" role="alert">
        Dear User, thanks for contacting us. We'll be in touch with you soon.
    </div>  
    <form @submit.prevent="sendMail">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="email" class="form-control" :class="errors.name?'is-invalid':''" id="name" v-model="name" required>
                <div v-for="(error, index) in errors.name" class="invalid-feedback" :key="index">
                    {{error}}
                </div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" :class="errors.email?'is-invalid':''" id="email" v-model="email" required >
                <div v-for="(error, index) in errors.name" class="invalid-feedback" :key="index">
                    {{error}}
                </div>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" :class="errors.message?'is-invalid':''" id="message" rows="5" v-model="message" required></textarea>
                <div v-for="(error, index) in errors.name" class="invalid-feedback" :key="index">
                    {{error}}
                </div>
        </div>

        <button type="submit" class="btn btn-primary" :disabled="sending">Submit</button>
</form>
</div>
</template>

<script>
    export default {
        name: "ContactPage",
        data() {
            return {
                name: '',
                email: '',
                message: '',
                errors: {},
                success: false,
                sending: false
            }
        },
        methods: {
            sendMail() {
                this.sending=true;

                axios.post('/api/contacts', {
                    'name': this.name,
                    'email': this.email,
                    'message': this.message
                }).then((response) =>{
                    this.success= response.data.success;
                    this.sending= false;
                    
                    if(this.success){
                        this.errors={};
                        this.name ='';
                        this.email ='';
                        this.message='';

                    }else{
                        this.errors= response.data.errors;
                    }
                    
                });
            }
        }
    }
</script>

<style>

</style>