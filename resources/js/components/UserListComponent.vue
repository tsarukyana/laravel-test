<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default mb-md-3">
                    <div class="card-header text-center"><h3>List of users</h3></div>
                    <ul class="list-group">
                        <li class="list-group-item" v-for="user of users">
                            <div class="row">
                                <div class="col-md-3">
                                    <img :src="`/images/${user.photo}`" alt="img" width="80px" height="80px">
                                </div>
                                <div class="col-md-3">
                                    {{user.name}}
                                </div>
                                <div class="col-md-3">
                                    {{user.email}}
                                </div>
                                <div class="col-md-3">
                                    <button @click="editUser(user)">Edit</button>
                                    <button @click="removeUser(user)">delete</button>
                                </div>
                            </div>

                        </li>
                    </ul>

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
                users: []
            }
        },
        created() {
            this.allUsers();

        },
        methods: {
            allUsers(){
                axios.post('/api/users/all', {})
                    .then((response) => {
                        console.log(response);
                        // success callback
                        if (response.data.users) {
                            this.users = response.data.users
                        }
                    }, (err) => {
                        // error callback
                        console.log(err);
                    });
            },
            removeUser(user){
                if (confirm('Are you sure')) {
                    axios.delete('/api/users/' + user.id, {})
                        .then((response) => {
                            if (response.data.success) {
                                alert(response.data.message)
                                this.allUsers();
                            }
                        }, (err) => {
                            // error callback
                            console.log(err);
                        });
                }
            },
            editUser(user){
                this.$router.push('edit/' + user.id)
            }
        }
    }
</script>
<style>

</style>
