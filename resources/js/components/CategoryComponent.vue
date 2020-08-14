<template>
    <div id="app">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">Categorias</h1>
                    <a href class="btn btn-primary float-right mb-4" data-toggle="modal" data-target="#createcategory">Nueva categoria
                        </a>
                </div>
                <div class="col-md-12 align-center">
                    <table class="table table-hover table-spriped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Categoria</th>
                                <th colspan="2">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="category in categories">
                                <td width="10px">{{ category.id }}</td>
                                <td>{{ category.category_name }}</td>
                                <td width="10px">
                                    <a href="#" class="btn btn-warning btn-sm"
                                     data-toggle="modal"
                                     data-target="#editcategory"
                                     v-on:click.prevent="editcategory(category)">
                                     Editar</a>
                                </td>
                                <td width="10px">
                                    <a href="#" class="btn btn-danger btn-sm"
                                        v-on:click.prevent="deletecategory(category)">Eliminar</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <!-- <div class="col-md-5 bg-white">
                    <pre>
                           {{ $data }}
                    </pre>
                </div>  -->
            </div>
        </div>

                <!-- FORM CREATE category -->


        <form method="POST" v-on:submit.prevent="createcategory">

            <div class="modal fade" id="createcategory">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Crear</h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label for="category">Nueva categoria</label>
                            <input type="text" name="category" class="form-control" v-model="newcategory" >
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Guardar" >
                        </div>
                    </div>
                </div>
            </div>
        </form>
            <!-- /FORM CREATE category -->

            <!-- FORM EDIT category -->


        <form method="POST" v-on:submit.prevent="updatecategory(fillcategory.id)">

            <div class="modal fade" id="editcategory">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Editar </h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label for="category">Actualizar nombre de la categoria</label>
                            <input type="text" name="category" class="form-control" v-model="fillcategory.category_name" >
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Actualizar" />
                        </div>
                    </div>
                </div>
            </div>
        </form>
            <!-- /FORM CREATE category -->

    </div>
</template>

<script>
    import toastr from "toastr";

    export default {
        data() {
            return {
                categories: [],
                newcategory: "",
                errors: [],
                fillcategory : {'id':'','category_name': ''},
            };
        },

        created: function () {
            this.getcategory();
        },

        methods: {
            getcategory: function () {
                var urlcategories = "categories";
                axios.get(urlcategories).then(response => {
                    this.categories = response.data;
                });
            },

            editcategory: function(category){
                this.fillcategory.id = category.id;
                this.fillcategory.category_name = category.category_name;
                $('#editcategory').modal('show');
            },

            updatecategory : function(id){
               var url = 'categories/' + id;
               axios.put(url, this.fillcategory).then(response =>{
                   this.getcategory();
                   this.fillcategory = {'id':'','category_name': ''};
                   this.errors = [];
                   $('#editcategory').modal('hide');
                   toastr.success('La edicion fue realizada').catch(error => {
                    this.errors = error.response.data;
                   });


               })
            },

            deletecategory: function (category) {
                var urlnotes = "categories/" + category.id;
                axios.delete(urlnotes).then(response => {
                    this.getcategory();
                    toastr.success("el category fue eliminada con exito");
                });
            },

            createcategory: function () {
                var urlnotes = "categories";
                axios.post(urlnotes, {
                    category_name: this.newcategory,
                }).then(response => {
                    this.getcategory(),
                    this.newcategory = "",
                    this.errors = [],
                    $("#createcategory").modal("hide");
                    toastr.success("Nueva tarea creada con exito");
                }).catch(error => {
                    this.errors = error.response.data;
                });
            }
        }
    };

</script>