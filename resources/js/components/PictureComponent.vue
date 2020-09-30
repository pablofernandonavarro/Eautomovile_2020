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
                    <!-- <img v-for="picture as pictures" src="{{'/storage/'.$picture->url_picture}}" alt="foto" width="200" class="img-fluid mb-2"> -->
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
                pictures:   [],
                errors: [],
                
            };
        },
         created: function () {
             this.getpictures();
         },

         methods: {
            getpictures: function () {
                var urlpictures = "pictures";
                axios.get(urlpictures).then(response => {
                    this.pictures = response.data;
                });
            },
         },
    };
</script>