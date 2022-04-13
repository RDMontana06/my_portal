<div class="modal fade" id="new_bulletin" tabindex="-1" role="dialog"  >
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class='col-md-10'>
                    <h5 class="modal-title" id="new_bulletin">New Bulletin </h5>
                </div>
                <div class='col-md-2'>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <form method='post' action='new-bulletin' onsubmit="show()" enctype="multipart/form-data" >
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="file_path">File</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="form-control" id="file_path" required name="file_path">
                                <label class="custom-file-label" for="file_path">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    <button type='submit' class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>