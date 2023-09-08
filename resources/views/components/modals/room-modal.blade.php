<!-- The Modal -->
<div class="modal fade" id="createroomModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Room</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='processing-room'></div>
                    <form id="create-room" action="">
                        @csrf

                            <p class="text-sm">Room Information</p>

                            <label for="" class="mt-2">Room/Laboratory Name</label>
                            <input type="text" class="form-control" name="room" required>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-info mt-4"> Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 