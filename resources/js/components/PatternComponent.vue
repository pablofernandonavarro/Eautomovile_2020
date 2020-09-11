<template>
    <div id="app">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">Modelos</h1>
                    <a href class="btn btn-primary float-right mb-4" data-toggle="modal" data-target="#createpattern">Registar nuevo Modelo
                        </a>
                </div>
                <div class="col-md-12 align-center">
                    <table class="table table-hover table-spriped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Modelo</th>
                                <th>Marca</th>
                                <th colspan="1">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="pattern in patterns">
                                <td width="10px">{{ pattern.id }}</td>
                                <td>{{ pattern.pattern_name }}</td>
                                <td>{{ pattern.brand_id}}</td>
                            
                                <td width="10px">
                                    <a href="#" class="btn btn-warning btn-sm"
                                     data-toggle="modal"
                                     data-target="#editpattern"
                                     v-on:click.prevent="editpattern(pattern)">
                                     Editar</a>
                                </td>
                                <td width="10px">
                                    <a href="#" class="btn btn-danger btn-sm"
                                        v-on:click.prevent="deletepattern(pattern)">Eliminar</a>
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
        </div>

                <!-- FORM CREATE pattern -->


        <form method="POST" v-on:submit.prevent="createpattern">

            <div class="modal fade" id="createpattern">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Crear</h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label for="pattern">Nuevo modelo</label>
                            <input type="text" name="pattern" class="form-control" v-model="newpattern" >
                        </div>
                        <div class="modal-body">
                            <label for="brand">Marca al que pertenece el Modelo</label>
                                <select v-model="select_brand" class="form-control" id="brand">
                                    <option v-for="brand in brand_name" :value="brand.id">{{brand_name.brand_name}}</option>
                                </select>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Guardar" >
                        </div>
                    </div>
                </div>
            </div>
        </form>
            <!-- /FORM CREATE pattern -->

            <!-- FORM EDIT pattern -->


        <form method="POST" v-on:submit.prevent="updatepattern(fillpattern.id)">

            <div class="modal fade" id="editpattern">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Editar </h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label for="pattern">Actualizar modelo</label>
                            <input type="text" name="pattern" class="form-control" v-model="fillpattern.pattern_name" >
                        </div>
                            <div class="modal-body">
                                <label for="brand">Marca al que pertenece el Modelo</label>
                                    <select v-model="fillpattern.brand_id" class="form-control" id="brand">
                                        <option v-for="brand in brand_name" :value="brand.id">{{brand.brand_name}}</option>
                                    </select>
                        </div>

                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Actualizar" />
                        </div>
                    </div>
                </div>
            </div>
        </form>
            <!-- /FORM CREATE pattern -->

    </div>
</template>

<script>
    import toastr from "toastr";

    export default {
        data() {
            return {
                patterns: [],
                select_brand: {},
                brand:[],
                newpattern: "",
                errors: [],
                brand_name:'',
                fillpattern: {'id':'','pattern_name': '','brand_id':''},
            };
        },

        created: function () {
            this.getpattern();
            this.getbrand();
            this.getbrand_name();

        },

        // created: function () {
        //     this.getbrand();
        // },

        methods: {
            getpattern: function () {
                var urlpatterns = "patterns";
                axios.get(urlpatterns).then(response => {
                    this.patterns = response.data;
                });
            },

            getbrand: function () {
                var urlpatterns= "brands";
                axios.get(urlpatterns).then(response => {
                    this.brand_name = response.data;
                });
            },
            
            getbrand_name: function () {
                var urlpatterns = "patterns";
                axios.get(urlpatterns).then(response => {
                    this.patterns = response.data;
                });
            },


            editpattern: function(pattern){
                this.fillpattern.id = pattern.id;

                this.fillpattern.pattern_name = pattern.pattern_name;
                $('#editpattern').modal('show');
            },

            updatepattern : function(id){
               var url = 'patterns/' + id;
               axios.put(url, this.fillpattern).then(response =>{
                   this.getpattern();
                   this.fillpattern = {'id':'','pattern_name': '','brand_id':''};
                   this.errors = [];
                   $('#editpattern').modal('hide');
                   toastr.success('La edicion fue realizada').catch(error => {
                    this.errors = error.response.data;
                   });


               })
            },

            deletepattern: function (pattern) {
                var urlnotes = "patterns/" + pattern.id;
                axios.delete(urlnotes).then(response => {
                    this.getpattern();
                    toastr.success("el pattern fue eliminada con exito");
                });
            },

            createpattern: function () {
                var urlnotes = "patterns";
                axios.post(urlnotes, {
                    pattern_name: this.newpattern,
                    brand_id: this.select_brand,
                }).then(response => {
                    this.getpattern(),
                    this.newpattern = "",
                    this.errors = [],
                    $("#createpattern").modal("hide");
                    toastr.success("Nueva tarea creada con exito");
                }).catch(error => {
                    this.errors = error.response.data;
                });
            }
        }
    };

</script>
