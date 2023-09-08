<!-- The Modal -->
<div class="modal fade" id="editassetModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Borrowed Asset/Property</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='edit-processing-asset'></div>
                    <form id="update-asset" action="">
                        @csrf
                        
                            <input type="hidden" class="form-control" name="assetid" id="edit-assetid" >

                            <p class="text-sm">Borrower's Information</p>

                            <label for="" class="mt-2">Full Name</label>
                            <input type="text" class="form-control" name="fullname" id="edit-fullname" required>

                            <label for="" class="mt-2">Position/Rank/Office</label>
                            <input type="text" class="form-control" name="position" id="edit-position" required>

                            <label for="" class="mt-2">Contact Number</label>
                            <input type="text" class="form-control" name="contactnumber" id="edit-contactnumber" required>

                            <label for="" class="mt-2">Address</label>
                            <input type="text" class="form-control" name="address" id="edit-address" required>

                            <p class="mt-4 text-sm">Property/Asset Information</p>

                            <label for="" class="mt-2">Property Name</label>
                            <input type="text" class="form-control" name="property_name" id="edit-property-name" required>

                            <label for="" class="mt-2">Person-in-charge of the Property</label>
                            <input type="text" class="form-control" name="person_in_charge" id="edit-person-incharge" required>

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="" class="mt-2">Quantity</label>
                                    <input type="number" class="form-control" name="quantity" id="edit-quantity" required>
                                </div>
                                <div class="col-md-8">
                                    <label for="" class="mt-2">Date Borrowed</label>
                                    <input type="date" class="form-control" name="date_borrowed" id="edit-date" required>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-info mt-4"> update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 