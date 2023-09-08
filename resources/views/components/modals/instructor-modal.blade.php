<!-- The Modal -->
<div class="modal fade" id="createinstructorModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Instructor</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='processing-instructor'></div>
                    <form id="create-instructor" action="">
                        @csrf

                            <p class="text-sm">Personal Information</p>

                            <label for="" class="mt-2">Full Name</label>
                            <input type="text" class="form-control" name="fullname" required>

                            <label for="" class="mt-2">Position/Rank</label>
                            <input type="text" class="form-control" name="position" required>

                            <label for="" class="mt-2">Contact Number</label>
                            <input type="text" class="form-control" name="contactnumber" required>

                            <label for="" class="mt-2">Address</label>
                            <input type="text" class="form-control" name="address" required>

                            <p class="mt-4 text-sm">Account Information</p>

                            <label for="" class="mt-2">Email</label>
                            <input type="email" class="form-control" name="email" required>

                            <label for="" class="mt-2">Password</label>
                            <input type="password" class="form-control" name="password" required>

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