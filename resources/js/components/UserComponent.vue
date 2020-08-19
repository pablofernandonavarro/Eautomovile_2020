<template>
    <div id="app">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">Lista de usuarios</h1>
                    <a href class="btn btn-primary float-right mb-4" data-toggle="modal" data-target="#createuser">Nuevo usuario 
                        </a>
                </div>
                <div class="col-md-12 align-center">
                    <table class="table table-hover table-spriped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>email</th>
                                <th>Telefono</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="user in users">
                                <td width="10px">{{ user.id }}</td>
                                <td>{{ user.name }}</td>
                                <td>{{ user.email }}</td>
                                <td>{{ user.email }}</td>
                               
                                <td width="10px">
                                    <a href="#" class="btn btn-warning btn-sm"
                                     data-toggle="modal"
                                     data-target="#edituser"
                                     v-on:click.prevent="edituser(user)">
                                     Editar</a>
                                </td>
                                <td width="10px">
                                    <a href="#" class="btn btn-danger btn-sm"
                                        v-on:click.prevent="deleteuser(user)">Eliminar</a>
                                </td>
                                 <td width="10px">
                                    <a href="#" class="btn btn-success btn-sm"
                                        v-on:click.prevent="detailleusers(user)">Datos</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
               <div class="col-md-5 bg-white">
                    <pre>
                           {{ $data }}
                    </pre>
               
            </div>
        </div>

                <!-- FORM CREATE user -->


        <form method="POST" v-on:submit.prevent="createuser">

            <div class="modal fade" id="createuser">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Agregar</h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label for="user">Nuevo usuarior</label>
                            <input type="text" name="user" class="form-control" v-model="newuser" >
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Guardar" />
                        </div>
                    </div>
                </div>
            </div>
        </form>
            <!-- /FORM CREATE user -->

            <!-- FORM EDIT user -->


        <form method="POST" v-on:submit.prevent="updateuser(filluser.id)">

            <div class="modal fade" id="edituser">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Editar </h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label for="user">Actualizar user</label>
                            <input type="text" name="user" class="form-control" v-model="filluser.user_name" >
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Actualizar" />
                        </div>
                    </div>
                </div>
            </div>
        </form>
            <!-- /FORM CREATE user -->

    </div>

    </div>
</template>

<script>
    import toastr from "toastr";

    export default {
        data() {
            return {
                users: [],
                newusers: "",
                errors: [],
                fillusers : {'id':'','name': '','email' : '','email_verified_at': '','role':''},
            };
        },

        created: function () {
            this.getusers();
        },

        methods: {
            getusers: function () {
                var urlusers = "userss";
                axios.get(urlusers).then(response => {
                    this.users = response.data;
                });
            },

            edituser: function(user){
                this.filluser.id = user.id;
                this.filluser.user_name = user.user_name;
                $('#edituser').modal('show');
            },

            updateuser : function(id){
               var url = 'users/' + id;
               axios.put(url, this.filluser).then(response =>{
                   this.getuser();
                   this.filluser = {'id':'','user_name': ''};
                   this.errors = [];
                   $('#edituser').modal('hide');
                   toastr.success('La edicion fue realizada').catch(error => {
                    this.errors = error.response.data;
                   });


               })
            },

            deleteuser: function (user) {
                var urlnotes = "users/" + user.id;
                axios.delete(urlnotes).then(response => {
                    this.getuser();
                    toastr.success("el user fue eliminada con exito");
                });
            },

            createuser: function () {
                var urlnotes = "users";
                axios.post(urlnotes, {
                    user_name: this.newuser,
                }).then(response => {
                    this.getuser(),
                    this.newuser = "",
                    this.errors = [],
                    $("#createuser").modal("hide");
                    toastr.success("Nueva tarea creada con exito");
                }).catch(error => {
                    this.errors = error.response.data;
                });
            },
        }
    };

</script>
