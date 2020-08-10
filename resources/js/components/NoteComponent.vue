<template>
    <div id="app">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">Tarea a recordar</h1>
                </div>

                <div class="col-md-7">
                    <a href class="btn btn-primary float-right" data-toggle="modal" data-target="#create_note">Nueva
                        tarea</a>

                    <table class="table table-hover table-spriped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tarea</th>
                                <th colspan="2">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="note in notes">
                                <td width="10px">{{ note.id }}</td>
                                <td>{{ note.description }}</td>
                                <td width="10px">
                                    <a href="#" class="btn btn-warning btn-sm">editar</a>
                                </td>
                                <td width="10px">
                                    <a href="#" class="btn btn-danger btn-sm"
                                        v-on:click.prevent="deletenote(note)">eliminar</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="col-md-5 bg-white">
                    <pre>
                           {{ notes}}
                </pre>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
    import toastr from "toastr";

export default {
  data() {
    return {
      notes: [],
      new_note: '',
      errors : [],
    };
  },

  created: function () {
    this.getnote();
  },

  methods: {
    getnote: function () {
      var urlnotes = "notes";
      axios.get(urlnotes).then((response) => {
        this.notes = response.data;
      });
    },
    deletenote: function (note) {
      var urlnotes = "notes/" + note.id;
      axios.delete(urlnotes).then((response) => {
        this.getnote();
        toastr.success('La tarea fue eliminada con exito');
      
      });

    },
    createnote: function(){
        var urlnotes = 'notes';
        axios.post(urlnotes,{
            note : this.new_note
        }).then(Response =>{
            this.getnote();
            this.new_note = '',
            this.errors = [],
            $('#create_note').modal('hide');
            toastr.success('nueva tarea creada con exito');        
        }).catch(error => {
            this.errors = erro.response.data;
        });
    }
  }
};
</script>