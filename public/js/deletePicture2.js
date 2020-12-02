



var picture = new Vue({
    el:'#picture',
    methods: {
<<<<<<< HEAD
        deletepicture(picture){
              
=======
        eliminarpicture(picture){
                   console.log(picture);
>>>>>>> f120cb4716fe63008e594be8d2e9737c065276ea
                
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