
<div id="app">

<form method="POST" v-on:submit.prevent="createnote">

    <div class="modal fade" id="create_note">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Nueva tarea</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <label for="note">Creae Tarea</label>
                    <input type="text" name="note" class="form-control" v-model="new_note">
                   
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Guardar">
                </div>
            </div>
        </div>
    </div>
</form>

</div> 