<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default mb-md-3">
                    <div class="card-header text-center"><h3>Register new user</h3></div>

                    <div class="form-group">
                        <label for="username">Name</label>
                        <input type="text" id="username" class="form-control" placeholder="Enter your name" v-model="user.name">
                    </div>
                    <div class="form-group">
                        <label for="user-email">Email</label>
                        <input type="email" id="user-email" class="form-control" placeholder="Enter your email" v-model="user.email">
                    </div>
                    <div class="form-group">
                        <label for="user-photo">Photo</label>
                        <input type="file" id="user-photo" class="form-control" @change="choosePhoto($event)" accept="image/*">
                    </div>
                    <button class="btn btn-primary" @click="register">Register</button>

                </div>

            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                user: {
                    name: '',
                    email: '',
                    photo: ''
                }
            }
        },
        methods: {
            register(){

                const formData = new FormData();
                formData.append('name', this.user.name);
                formData.append('email', this.user.email);
                formData.append('photo', this.user.photo);

                axios.post('/api/users/store', formData)
                    .then((response) => {
                        // success callback
                        if (response.data.success) {
                            alert(response.data.message);
                            this.$router.push('list');
                        } else {
                            if (response.data.message) {
                                alert(response.data.message);
                            } else if (response.data.errors) {
                                let _err = '';
                                Object.keys(response.data.errors).map(function(key, index) {
                                    _err += ' ' + response.data.errors[key];
                                });
                                alert(_err);
                            }
                        }
                    }, (response) => {
                        // error callback
                    });

            },
            choosePhoto(event){
                this.user.photo = event.target.files[0];
            }
        }
    }
</script>
<style>

</style>
