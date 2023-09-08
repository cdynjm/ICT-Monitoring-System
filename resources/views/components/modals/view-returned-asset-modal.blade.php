<!-- The Modal -->
<div class="modal fade" id="viewassetModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Returned Asset/Property</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                
                            <p class="text-sm">Borrower's Information</p>

                            <label for="" class="mt-2">Full Name</label>
                            <input type="text" class="form-control" name="fullname" id="view-fullname" readonly>

                            <label for="" class="mt-2">Position/Rank/Office</label>
                            <input type="text" class="form-control" name="position" id="view-position" readonly>

                            <label for="" class="mt-2">Contact Number</label>
                            <input type="text" class="form-control" name="contactnumber" id="view-contactnumber" readonly>

                            <label for="" class="mt-2">Address</label>
                            <input type="text" class="form-control" name="address" id="view-address" readonly>

                            <p class="mt-4 text-sm">Property/Asset Information</p>

                            <label for="" class="mt-2">Property Name</label>
                            <input type="text" class="form-control" name="property_name" id="view-property-name" readonly>

                            <label for="" class="mt-2">Person-in-charge of the Property</label>
                            <input type="text" class="form-control" name="person_in_charge" id="view-person-incharge" readonly>

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="" class="mt-2">Quantity</label>
                                    <input type="number" class="form-control" name="quantity" id="view-quantity" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="mt-2">Date Borrowed</label>
                                    <input type="date" class="form-control" name="date_borrowed" id="view-borrowed-date" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="mt-2">Date Returned</label>
                                    <input type="date" class="form-control" name="date_borrowed" id="view-returned-date" readonly>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div> 