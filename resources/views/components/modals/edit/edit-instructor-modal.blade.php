<!-- The Modal -->
<div class="modal fade" id="updateinstructorModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Instructor</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='edit-processing-instructor'></div>
                    <form id="update-instructor" action="">
                        @csrf

                            <p class="text-sm">Personal Information</p>

                            <input type="hidden" class="form-control" name="userid" id="edit-userid" required>

                            <label for="" class="mt-2">Full Name</label>
                            <input type="text" class="form-control" name="fullname" id="edit-fullname" required>

                            <label for="" class="mt-2">Position/Rank</label>
                            <input type="text" class="form-control" name="position" id="edit-position" required>

                            <label for="" class="mt-2">Contact Number</label>
                            <input type="text" class="form-control" name="contactnumber" id="edit-contactnumber" required>

                            <label for="" class="mt-2">Address</label>
                            <input type="text" class="form-control" name="address" id="edit-address" required>
                            
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-info mt-4"> Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 