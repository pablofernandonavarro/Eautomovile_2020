<template>
    <div id="app">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">Marcas</h1>
                    <a href class="btn btn-primary float-right mb-4" data-toggle="modal" data-target="#createbrand">Registar nueva Marca
                        </a>
                </div>
                <div class="col-md-12 align-center">
                    <table class="table table-hover table-spriped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Marca</th>
                                <th colspan="2">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="brand in brands">
                                <td width="10px">{{ brand.id }}</td>
                                <td>{{ brand.brand_name }}</td>
                                <td width="10px">
                                    <a href="#" class="btn btn-warning btn-sm"
                                     data-toggle="modal"
                                     data-target="#editbrand"
                                     v-on:click.prevent="editbrand(brand)">
                                     Editar</a>
                                </td>
                                <td width="10px">
                                    <a href="#" class="btn btn-danger btn-sm"
                                        v-on:click.prevent="deletebrand(brand)">Eliminar</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
             <!-- <div class="col-md-5 bg-white">
                    <pre>
                           {{ $data }}
                    </pre>
                </div>   -->
            </div>
        </div>

                <!-- FORM CREATE brand -->


        <form method="POST" v-on:submit.prevent="createbrand">

            <div class="modal fade" id="createbrand">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Crear</h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label for="brand">Nueva marca</label>
                            <input type="text" name="brand" class="form-control" v-model="newbrand" >
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Guardar" >
                        </div>
                    </div>
                </div>
            </div>
        </form>
            <!-- /FORM CREATE brand -->

            <!-- FORM EDIT brand -->


        <form method="POST" v-on:submit.prevent="updatebrand(fillbrand.id)">

            <div class="modal fade" id="editbrand">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Editar </h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label for="brand">Actualizar nombre de la categoria</label>
                            <input type="text" name="brand" class="form-control" v-model="fillbrand.brand_name" >
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Actualizar" />
                        </div>
                    </div>
                </div>
            </div>
        </form>
            <!-- /FORM CREATE brand -->

    </div>
</template>

<script>
    import toastr from "toastr";

    export default {
        data() {
            return {
                brands: [],
                newbrand: "",
                errors: [],
                fillbrand : {'id':'','brand_name': ''},
            };
        },

        created: function () {
            this.getbrand();
        },

        methods: {
            getbrand: function () {
                var urlbrands = "brands";
                axios.get(urlbrands).then(response => {
                    this.brands = response.data;
                });
            },

            editbrand: function(brand){
                this.fillbrand.id = brand.id;
                this.fillbrand.brand_name = brand.brand_name;
                $('#editbrand').modal('show');
            },

            updatebrand : function(id){
               var url = 'brands/' + id;
               axios.put(url, this.fillbrand).then(response =>{
                   this.getbrand();
                   this.fillbrand = {'id':'','brand_name': ''};
                   this.errors = [];
                   $('#editbrand').modal('hide');
                   toastr.success('La edicion fue realizada').catch(error => {
                    this.errors = error.response.data;
                   });


               })
            },

            deletebrand: function (brand) {
                var urlnotes = "brands/" + brand.id;
                axios.delete(urlnotes).then(response => {
                    this.getbrand();
                    toastr.success("el brand fue eliminada con exito");
                });
            },

            createbrand: function () {
                var urlnotes = "brands";
                axios.post(urlnotes, {
                    brand_name: this.newbrand,
                }).then(response => {
                    this.getbrand(),
                    this.newbrand = "",
                    this.errors = [],
                    $("#createbrand").modal("hide");
                    toastr.success("Nueva tarea creada con exito");
                }).catch(error => {
                    this.errors = error.response.data;
                });
            }
        }
    };

</script>