 <template>
 <div id="picture">
    <div class="container col-md-12">
          <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Imágenes</h3>
            </div>
                <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group">
                    <img :src="'/storage/pictures/sku10_1.jpg'" alt="foto" width="200" class="img-fluid mb-2"> 
                     
                </div>
            </div>
                <!-- /.card-body -->
            <div class="card-footer">
            </div>
        </div>
        <div class="col-md-5 bg-white">
            <pre>
                {{ $data }}
            </pre>
        </div> 
        </div>
        </div>  
</template>
<script>
   export default {
        data() {
            return {
                products: [],
                errors: [],
                product_id: "",
            };
        },
         created: function ($id) {
             this.getproducts();
             this.getid(products);
         },

         methods: {
            getproducts: function () {
                var urlpictures = "/admin/pictures/";
                axios.get(urlpictures).then(response => {
                    this.products = response.data;
                });
            },

         }, getid: function(id){
              var urlpictures = '/admin/pictures/.id./edit'
                this.product_id = this.products.id;
                
              
               
            },
    };
</script>