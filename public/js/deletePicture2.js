var app = new Vue({
    el:'#app',
    methods: {
        eliminarpicture(picture){
                   console.log(picture);
                
        // let url = '/deletepicture/' + picture.id;
            
        //     axios.delete(url).then(response => {
        //         console.log(response.data);
        //         });

              
                  
        //    eliminar el elemento
                    var elemento = document.getElementById('id'+ picture.id);
                    console.log(elemento);
                    elemento.parentNode.removeChild(elemento);
                   
                  }        
       
            
            }
      
});