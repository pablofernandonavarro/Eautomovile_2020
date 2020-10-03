<template>
    <div id="app">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">Proveedores</h1>
                    <a href class="btn btn-primary float-right mb-4" data-toggle="modal" data-target="#createsupplier">Registar un Proveedor
                        </a>
                </div>
                <div class="col-md-12 align-center">
                    <table class="table table-hover table-spriped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Proveedor</th>
                                <th colspan="2">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="supplier in suppliers">
                                <td width="10px">{{ supplier.id }}</td>
                                <td>{{ supplier.supplier_businessName }}</td>
                                <td width="10px">
                                    <a href="#" class="btn btn-warning btn-sm"
                                     data-toggle="modal"
                                     data-target="#editsupplier"
                                     v-on:click.prevent="editsupplier(supplier)">
                                     Editar</a>
                                </td>
                                <td width="10px">
                                    <a href="#" class="btn btn-danger btn-sm"
                                        v-on:click.prevent="deletesupplier(supplier)">Eliminar</a>
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

                <!-- FORM CREATE supplier -->


        <form method="POST" v-on:submit.prevent="createsupplier">

            <div class="modal fade" id="createsupplier">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Crear</h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label for="supplier">Codigo Proveedor</label>
                            <input type="text" name="supplier" class="form-control" v-model="newsupplier.supplier_code" >
                            <label for="supplier">Nombre o Razon social</label>
                            <input type="text" name="supplier" class="form-control" v-model="newsupplier.supplier_businessName" >
                            <label for="supplier">email</label>
                            <input type="text" name="supplier" class="form-control" v-model="newsupplier.supplier_email" >
                            <label for="supplier">Telefono</label>
                            <input type="text" name="supplier" class="form-control" v-model="newsupplier.supplier_phone" >
                            <label for="supplier">Direccion</label>
                            <input type="text" name="supplier" class="form-control" v-model="newsupplier.supplier_address" >
                            <label for="supplier">Localidad</label>
                            <input type="text" name="supplier" class="form-control" v-model="newsupplier.supplier_address_location" >
                            <label for="supplier">Provincia</label>
                            <input type="text" name="supplier" class="form-control" v-model="newsupplier.supplier_address_province" >
                            <label for="supplier">Codigo postal</label>
                            <input type="text" name="supplier" class="form-control" v-model="newsupplier.supplier_address_postalCode" >
                            <label for="supplier">web</label>
                            <input type="text" name="supplier" class="form-control" v-model="newsupplier.supplier_web" >
                            <label for="supplier">C.U.I.T.</label>
                            <input type="text" name="supplier" class="form-control" v-model="newsupplier.supplier_cuit" >
                            <label for="supplier">Condicion I.V.A.</label>
                            <input type="text" name="supplier" class="form-control" v-model="newsupplier.supplier_ivaType" >
                            <label for="supplier">I.V.A. exento</label>
                            <input type="text" name="supplier" class="form-control" v-model="newsupplier.supplier_ivaExclusion" >
                             <label for="supplier">Ingreso Brutos condicion</label>
                            <input type="text" name="supplier" class="form-control" v-model="newsupplier.supplier_ibRegiment" >
                             <label for="supplier">numero I.B.</label>
                            <input type="text" name="supplier" class="form-control" v-model="newsupplier.supplier_ibNumber" >
                             <label for="supplier">Provincia ingresos brutos</label>
                            <input type="text" name="supplier" class="form-control" v-model="newsupplier.supplier_ibProvince" >
                             <label for="supplier">Direccion de entrega</label>
                            <input type="text" name="supplier" class="form-control" v-model="newsupplier.supplier_delivery_Address" >
                             <label for="supplier">Localidad de direccion de entrega</label>
                            <input type="text" name="supplier" class="form-control" v-model="newsupplier.supplier_delivery_AddressLocation" >
                             <label for="supplier">Provincia direccion de entrega</label>
                            <input type="text" name="supplier" class="form-control" v-model="newsupplier.supplier_delivery_AddressProvince" >
                             <label for="supplier">Codigo Postal direccion entrega</label>
                            <input type="text" name="supplier" class="form-control" v-model="newsupplier.supplier_delivery_AddressPostalCode" >
                            <label for="supplier">Descuento habitual</label>
                            <input type="text" name="supplier" class="form-control" v-model="newsupplier.supplier_discount" >
                            <label for="supplier">Descuento Extra</label>
                            <input type="text" name="supplier" class="form-control" v-model="newsupplier.supplier_extra_discount" >


                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Guardar" >
                        </div>
                    </div>
                </div>
            </div>
        </form>
            <!-- /FORM CREATE supplier -->

            <!-- FORM EDIT supplier -->


        <form method="POST" v-on:submit.prevent="updatesupplier(fillsupplier.id)">

            <div class="modal fade" id="editsupplier">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Editar </h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                             <label for="supplier">Codigo Proveedor</label>
                            <input type="text" name="supplier" class="form-control" v-model="fillsupplier.supplier_code" >
                            <label for="supplier">Nombre o Razon social</label>
                            <input type="text" name="supplier" class="form-control" v-model="fillsupplier.supplier_businessName" >
                            <label for="supplier">email</label>
                            <input type="text" name="supplier" class="form-control" v-model="fillsupplier.supplier_email" >
                            <label for="supplier">Telefono</label>
                            <input type="text" name="supplier" class="form-control" v-model="fillsupplier.supplier_phone" >
                            <label for="supplier">Direccion</label>
                            <input type="text" name="supplier" class="form-control" v-model="fillsupplier.supplier_address" >
                            <label for="supplier">Localidad</label>
                            <input type="text" name="supplier" class="form-control" v-model="fillsupplier.supplier_address_location" >
                            <label for="supplier">Provincia</label>
                            <input type="text" name="supplier" class="form-control" v-model="fillsupplier.supplier_address_province" >
                            <label for="supplier">Codigo postal</label>
                            <input type="text" name="supplier" class="form-control" v-model="fillsupplier.supplier_address_postalCode" >
                            <label for="supplier">web</label>
                            <input type="text" name="supplier" class="form-control" v-model="fillsupplier.supplier_web" >
                            <label for="supplier">C.U.I.T.</label>
                            <input type="text" name="supplier" class="form-control" v-model="fillsupplier.supplier_cuit" >
                            <label for="supplier">Condicion I.V.A.</label>
                            <input type="text" name="supplier" class="form-control" v-model="fillsupplier.supplier_ivaType" >
                            <label for="supplier">I.V.A. exento</label>
                            <input type="text" name="supplier" class="form-control" v-model="fillsupplier.supplier_ivaExclusion" >
                             <label for="supplier">Ingreso Brutos condicion</label>
                            <input type="text" name="supplier" class="form-control" v-model="fillsupplier.supplier_ibRegiment" >
                             <label for="supplier">numero I.B.</label>
                            <input type="text" name="supplier" class="form-control" v-model="fillsupplier.supplier_ibNumber" >
                             <label for="supplier">Provincia ingresos brutos</label>
                            <input type="text" name="supplier" class="form-control" v-model="fillsupplier.supplier_ibProvince" >
                             <label for="supplier">Direccion de entrega</label>
                            <input type="text" name="supplier" class="form-control" v-model="fillsupplier.supplier_delivery_Address" >
                             <label for="supplier">Localidad de direccion de entrega</label>
                            <input type="text" name="supplier" class="form-control" v-model="fillsupplier.supplier_delivery_AddressLocation" >
                             <label for="supplier">Provincia direccion de entrega</label>
                            <input type="text" name="supplier" class="form-control" v-model="fillsupplier.supplier_delivery_AddressProvince" >
                             <label for="supplier">Codigo Postal direccion entrega</label>
                            <input type="text" name="supplier" class="form-control" v-model="fillsupplier.supplier_delivery_AddressPostalCode" >
                            <label for="supplier">Descuento habitual</label>
                            <input type="text" name="supplier" class="form-control" v-model="fillsupplier.supplier_discount" >
                            <label for="supplier">Descuento Extra</label>
                            <input type="text" name="supplier" class="form-control" v-model="fillsupplier.supplier_extra_discount" >
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Actualizar" />
                        </div>
                    </div>
                </div>
            </div>
        </form>
            <!-- /FORM CREATE supplier -->

    </div>
</template>

<script>
    import toastr from "toastr";

    export default {
        data() {
            return {
                suppliers: [],
                newsupplier: {
                    'id' :'',
                    'supplier_code':'',
                    'supplier_businessName':'',
                    'supplier_email':'',
                    'supplier_phone':'',
                    'supplier_address':'',
                    'supplier_address_location':'',
                    'supplier_address_province':'',
                    'supplier_address_postalCode':'',
                    'supplier_web':'',
    
                    'supplier_cuit':'',
                    'supplier_ivaType':'',
                    'supplier_ivaExclusion':'',
                    'supplier_ibRegiment':'',
                    'supplier_ibNumber':'',
                    'supplier_ibProvince':'',
            
        
                    'supplier_delivery_Address':'',
                    'supplier_delivery_AddressLocation':'',
                    'supplier_delivery_AddressProvince':'',
                    'supplier_delivery_AddressPostalCode':'',

                    'supplier_discount':'',
                    'supplier_extra_discount':'',
},
                errors: [],
                fillsupplier : {
                    'id' :'',
                    'supplier_code':'',
                    'supplier_businessName':'',
                    'supplier_email':'',
                    'supplier_phone':'',
                    'supplier_address':'',
                    'supplier_address_location':'',
                    'supplier_address_province':'',
                    'supplier_address_postalCode':'',
                    'supplier_web':'',
    
                    'supplier_cuit':'',
                    'supplier_ivaType':'',
                    'supplier_ivaExclusion':'',
                    'supplier_ibRegiment':'',
                    'supplier_ibNumber':'',
                    'supplier_ibProvince':'',
            
        
                    'supplier_delivery_Address':'',
                    'supplier_delivery_AddressLocation':'',
                    'supplier_delivery_AddressProvince':'',
                    'supplier_delivery_AddressPostalCode':'',

                    'supplier_discount':'',
                    'supplier_extra_discount':'',
                    },
            };
        },

        created: function () {
            this.getsupplier();
        },

        methods: {
            getsupplier: function () {
                var urlsuppliers = "suppliers";
                axios.get(urlsuppliers).then(response => {
                    this.suppliers = response.data;
                });
            },

            editsupplier: function(supplier){
                id = supplier.id;
                supplier_code = supplier.supplier_code;
                supplier_businessName = supplier.supplier_businessName;
                supplier_businessName = supplier.supplier_businessName;
                supplier_address = supplier.supplier_address;
                supplier_address_location = supplier.supplier_address_location;
                supplier_address_province = supplier.supplier_address_province;
                supplier_address_postalCode = supplier.supplier_address_postalCode;
                supplier_web = supplier.supplier_web;
                supplier_name = supplier.supplier_name;
                supplier_cuit = supplier.supplier_cuit;
                supplier_ivaType = supplier.supplier_ivaType;
                supplier_ivaExclusion = supplier.supplier_ivaExclusion;
                supplier_ibRegiment = supplier.supplier_ibRegiment;
                supplier_ibNumber= supplier.supplier_ibNumber;
                supplier_ibProvince = supplier.supplier_ibProvince;
                supplier_delivery_Address= supplier.supplier_delivery_Address;
                supplier_delivery_AddressLocation = supplier.supplier_delivery_AddressLocation;
                supplier_name = supplier.supplier_name;
                supplier_delivery_AddressProvince = supplier.supplier_delivery_AddressProvince;
                supplier_delivery_AddressPostalCode = supplier.supplier_delivery_AddressPostalCode;
                supplier_discount = supplier.supplier_discount;
                supplier_extra_discount = supplier.supplier_extra_discount;



                $('#editsupplier').modal('show');
            },

            updatesupplier : function(id){
               var url = 'suppliers/' + id;
               axios.put(url, this.fillsupplier).then(response =>{
                   this.getsupplier();
                   this.fillsupplier = { 
                    'id' :'',
                    'supplier_code':'',
                    'supplier_businessName':'',
                    'supplier_businessName':'',
                    'supplier_phone':'',
                    'supplier_address':'',
                    'supplier_address_location':'',
                    'supplier_address_province':'',
                    'supplier_address_postalCode':'',
                    'supplier_web':'',
                    'supplier_cuit':'',
                    'supplier_ivaType':'',
                    'supplier_ivaExclusion':'',
                    'supplier_ibRegiment':'',
                    'supplier_ibNumber':'',
                    'supplier_ibProvince':'',
                    'supplier_delivery_Address':'',
                    'supplier_delivery_AddressLocation':'',
                    'supplier_delivery_AddressProvince':'',
                    'supplier_delivery_AddressPostalCode':'',
                    'supplier_discount':'',
                    'supplier_extra_discount':'',
                    };
                   this.errors = [];
                   $('#editsupplier').modal('hide');
                   toastr.success('La edicion fue realizada').catch(error => {
                    this.errors = error.response.data;
                   });


               })
            },

            deletesupplier: function (supplier) {
                var urlsuppliers = "suppliers/" + supplier.id;
                axios.delete(urlsuppliers).then(response => {
                    this.getsupplier();
                    toastr.success("el supplier fue eliminada con exito");
                });
            },

            createsupplier: function () {
                var urlsuppliers = "suppliers";
                axios.post(urlsuppliers, {
                   
                    supplier_code                      : this.newsupplier.supplier_code,
                    supplier_businessName              : this.newsupplier.supplier_businessName,
                    supplier_address                   : this.newsupplier.supplier_address,
                    supplier_address_location          : this.newsupplier.supplier_address_location,
                    supplier_address_province          : this.newsupplier.supplier_address_province,
                    supplier_address_postalCode        : this.newsupplier.supplier_address_postalCode,
                    supplier_web                       : this.newsupplier.supplier_web,
                    supplier_name                      : this.newsupplier.supplier_name,
                    supplier_cuit                      : this.newsupplier.supplier_cuit,
                    supplier_ivaType                   : this.newsupplier.supplier_ivaType,
                    supplier_ivaExclusion              : this.newsupplier.supplier_ivaExclusion,
                    supplier_ibRegiment                : this.newsupplier.supplier_ibRegiment,
                    supplier_ibNumber                  : this.newsupplier.supplier_ibNumber,
                    supplier_ibProvince                :this.newsupplier.supplier_ibProvince,
                    supplier_delivery_Address          : this.newsupplier.supplier_delivery_Address,
                    supplier_delivery_AddressLocation  : this.newsupplier.supplier_delivery_AddressLocation,
                    supplier_delivery_AddressProvince  : this.newsupplier.supplier_delivery_AddressProvince,
                    supplier_delivery_AddressPostalCode: this.newsupplier.supplier_delivery_AddressPostalCode,
                    supplier_discount                  : this.newsupplier.supplier_discount,
                    supplier_extra_discount            : this.newsupplier.supplier_extra_discount,

                }).then(response => {
                    this.getsupplier(),
                    this.newsupplier = "",
                    this.errors = [],
                    $("#createsupplier").modal("hide");
                    toastr.success("Nueva tarea creada con exito");
                }).catch(error => {
                    this.errors = error.response.data;
                });
            }
        }
    };

</script>