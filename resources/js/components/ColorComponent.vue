<template>
    <div id="app">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">Colores</h1>
                    <a href class="btn btn-primary float-right mb-4" data-toggle="modal" data-target="#createcolor">Nuevo color
                        </a>
                </div>
                <div class="col-md-12 align-center">
                    <table class="table table-hover table-spriped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>color</th>
                                <th colspan="2">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="color in colors">
                                <td width="10px">{{ color.id }}</td>
                                <td>{{ color.color_name }}</td>
                                <td width="10px">
                                    <a href="#" class="btn btn-warning btn-sm"
                                     data-toggle="modal"
                                     data-target="#editcolor"
                                     v-on:click.prevent="editcolor(color)">
                                     Editar</a>
                                </td>
                                <td width="10px">
                                    <a href="#" class="btn btn-danger btn-sm"
                                        v-on:click.prevent="deletecolor(color)">Eliminar</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
               <!-- <div class="col-md-5 bg-white">
                    <pre>
                           {{ $data }}
                    </pre>
                </div> -->
            </div>
        </div>

                <!-- FORM CREATE COLOR -->


        <form method="POST" v-on:submit.prevent="createcolor">

            <div class="modal fade" id="createcolor">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Crear</h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label for="color">Nuevo color</label>
                            <input type="text" name="color" class="form-control" v-model="newcolor" >
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Guardar" />
                        </div>
                    </div>
                </div>
            </div>
        </form>
            <!-- /FORM CREATE COLOR -->

            <!-- FORM EDIT COLOR -->


        <form method="POST" v-on:submit.prevent="updatecolor(fillcolor.id)">

            <div class="modal fade" id="editcolor">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Editar </h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label for="color">Actualizar color</label>
                            <input type="text" name="color" class="form-control" v-model="fillcolor.color_name" >
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Actualizar" />
                        </div>
                    </div>
                </div>
            </div>
        </form>
            <!-- /FORM CREATE COLOR -->

    </div>
</template>

<script>
    import toastr from "toastr";

    export default {
        data() {
            return {
                colors: [],
                newcolor: "",
                errors: [],
                fillcolor : {'id':'','color_name': ''},
            };
        },

        created: function () {
            this.getcolor();
        },

        methods: {
            getcolor: function () {
                var urlcolors = "colors";
                axios.get(urlcolors).then(response => {
                    this.colors = response.data;
                });
            },

            editcolor: function(color){
                this.fillcolor.id = color.id;
                this.fillcolor.color_name = color.color_name;
                $('#editcolor').modal('show');
            },

            updatecolor : function(id){
               var url = 'colors/' + id;
               axios.put(url, this.fillcolor).then(response =>{
                   this.getcolor();
                   this.fillcolor = {'id':'','color_name': ''};
                   this.errors = [];
                   $('#editcolor').modal('hide');
                   toastr.success('La edicion fue realizada').catch(error => {
                    this.errors = error.response.data;
                   });


               })
            },

            deletecolor: function (color) {
                var urlnotes = "colors/" + color.id;
                axios.delete(urlnotes).then(response => {
                    this.getcolor();
                    toastr.success("el color fue eliminada con exito");
                });
            },

            createcolor: function () {
                var urlnotes = "colors";
                axios.post(urlnotes, {
                    color_name: this.newcolor,
                }).then(response => {
                    this.getcolor(),
                    this.newcolor = "",
                    this.errors = [],
                    $("#createcolor").modal("hide");
                    toastr.success("Nueva tarea creada con exito");
                }).catch(error => {
                    this.errors = error.response.data;
                });
            }
        }
    };

</script>
