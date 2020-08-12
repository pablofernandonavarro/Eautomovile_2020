<template>
    <div id="app">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">Tarea a recordar</h1>
                    <a href class="btn btn-primary float-right mb-4" data-toggle="modal" data-target="#createnote">Nueva
                        tarea</a>
                </div>
                <div class="col-md-12 align-center">
                    <table class="table table-hover table-spriped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tarea</th>
                                <th colspan="2">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="note in notes">
                                <td width="10px">{{ note.id }}</td>
                                <td>{{ note.description }}</td>
                                <td width="10px">
                                    <a href="#" class="btn btn-warning btn-sm"
                                     data-toggle="modal" 
                                     data-target="#editnote"
                                     v-on:click.prevent="editnote(note)">
                                     Editar</a>
                                </td>
                                <td width="10px">
                                    <a href="#" class="btn btn-danger btn-sm"
                                        v-on:click.prevent="deletenote(note)">Eliminar</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--<div class="col-md-5 bg-white">
                    <pre>
                           {{ $data }}
                </pre>
                </div> -->
            </div>
        </div>

                <!-- FORM CREATE NOTE -->


        <form method="POST" v-on:submit.prevent="createnote">

            <div class="modal fade" id="createnote">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Crear</h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label for="note">Nueva Tarea</label>
                            <input type="text" name="note" class="form-control" v-model="newnote" />
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Guardar" />
                        </div>
                    </div>
                </div>
            </div>
        </form>
            <!-- /FORM CREATE NOTE -->

            <!-- FORM EDIT NOTE -->


        <form method="POST" v-on:submit.prevent="updatenote(fillnote.id)">

            <div class="modal fade" id="editnote">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Editar </h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label for="note">Actualizar nueva tarea</label>
                            <input type="text" name="note" class="form-control" v-model="fillnote.description" />
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Actualizar" />
                        </div>
                    </div>
                </div>
            </div>
        </form>
            <!-- /FORM CREATE NOTE -->

    </div>
</template>

<script>
    import toastr from "toastr";
   
    export default {
        data() {
            return {
                notes: [],
                newnote: "",
                errors: [],
                fillnote : {'id':'','description': ''},
            };
        },

        created: function () {
            this.getnote();
        },

        methods: {
            getnote: function () {
                var urlnotes = "notes";
                axios.get(urlnotes).then(response => {
                    this.notes = response.data;
                });
            },

            editnote: function(note){
                this.fillnote.id = note.id;
                this.fillnote.description = note.description;
                $('#editnote').modal('show');
            },

            updatenote : function(id){
               var url = 'notes/' + id;
               axios.put(url, this.fillnote).then(response =>{
                   this.getnote();
                   this.fillnote = {'id':'','description': ''};
                   this.errors = [];
                   $('#editnote').modal('hide');
                   toastr.success('La edicion fue realizada').catch(error => {
                    this.errors = error.response.data;
                   });


               })
            },

            deletenote: function (note) {
                var urlnotes = "notes/" + note.id;
                axios.delete(urlnotes).then(response => {
                    this.getnote();
                    toastr.success("La tarea fue eliminada con exito");
                });
            },

            createnote: function () {
                var urlnotes = "notes";
                axios.post(urlnotes, {
                    description: this.newnote,
                }).then(response => {
                    this.getnote(),
                    this.newnote = "",
                    this.errors = [],
                    $("#createnote").modal("hide");
                    toastr.success("Nueva tarea creada con exito");
                }).catch(error => {
                    this.errors = error.response.data;
                });
            }
        }
    };

</script>
