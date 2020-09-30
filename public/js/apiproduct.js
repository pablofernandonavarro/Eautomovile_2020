const app = new Vue({
    el: '#app',
    data: {
      
    }, 
    methods: {
        picturedelete(picture) { 
            console.log(picture);
        },
        //     Swal.fire({
        //         title: '¿Estas seguro de eliminar la imagen '+ picture.id+ '?',
        //         text: "¡No podrás revertir esto!",
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: '¡Si, Eliminar!',
        //         cancelButtonText: 'Cancelar'
        //       }).then((result) => {
        //         if (result.value) {

                  
        //             let url = '/api/eliminarimagen/'+imagen.id;
        //             axios.delete(url).then(response => {
        //                  console.log(response.data);
        //             });


        //           //eliminar el elemento
        //           var elemento = document.getElementById('idimagen-'+imagen.id);
        //           //console.log(elemento);
        //           elemento.parentNode.removeChild(elemento);
                    
        //           Swal.fire(
        //             '¡Eliminado!',
        //             'Su archivo ha sido eliminado.',
        //             'success'
        //           )
        //         }
        //       })


        // },
       
    },


});