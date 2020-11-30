



var app2 = new Vue({
    el:'#app-2',
    methods: {
        eliminarpicture(picture){
                   console.log(picture);
                
           let url = '/deletepicture/'+ picture.id;
               
                 axios.delete(url).then(response => {
                 console.log(response.data);
                 });

              
                  
              //eliminar el elemento
                   var elemento = document.getElementById('id'+ picture.id);
                   console.log(elemento);
                   elemento.parentNode.removeChild(elemento);
                   
                  }        
       
            
            }
      
});