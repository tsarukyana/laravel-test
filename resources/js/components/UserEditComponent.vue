<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default mb-md-3">

                    <div class="card-header text-center"><h3>Edit user</h3></div>
                    <h4 class="text-center">This part didn't implement yet</h4>

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
                    <button class="btn btn-primary" @click="save">Save</button>

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
            save(){

                // todo need to implement
            },
            choosePhoto(event){
                // todo need to implement
            }
        }
    }
</script>
<style>

</style>
