



var picture = new Vue({
    el:'#picture',
    methods: {
        deletepicture(picture){
              
                
        let url = '/deletepicture/' + picture.id;
            
            axios.delete(url).then(response => {
                console.log(response.data);
                });

              
                  
        //    eliminar el elemento
                    var elemento = document.getElementById('id'+ picture.id);
                    console.log(elemento);
                    elemento.parentNode.removeChild(elemento);
                   
                  }        
       
            
            }
      
});