<div class="modal fade" id="uploadModal">
    <div class="modal-dialog">
        <div class="modal-content">
            {{ Form::open(array('route'=>'flashcard.import','files'=>true)) }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Upload Flashcards</h4>
                </div>
                <div class="modal-body">
                    {{ Form::label('csv_file','File',array('id'=>'','class'=>'')) }}
                    {{ Form::file('csv_file','',array('id'=>'csv_file','class'=>'file')) }}
                    <br/>
                </div>
                <div class="modal-footer">
                    <!-- submit buttons -->
                    {{ Form::submit('Upload', array('class'=>'btn btn-primary')) }}

                    <!-- cancel buttons -->
                    {{
                        Form::button('Cancel', array(
                            'class'=>'btn btn-danger',
                            'data-dismiss'=>'modal',
                        ))
                    }}
                </div>
            {{ Form::close() }}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
