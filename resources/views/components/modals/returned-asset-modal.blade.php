<!-- The Modal -->
<div class="modal fade" id="returnassetModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Return Asset</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='processing-return'></div>
                    <form id="return-property" action="">
                        @csrf

                            <input type="hidden" id="return-asset-id" class="form-control" name="assetid">

                            <label for="" class="mt-2">Property Name</label>
                            <input type="text" class="form-control" id="return-property-name" readonly>

                            <label for="" class="mt-2">Date Returned</label>
                            <input type="date" class="form-control" name="date_returned" required>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-info mt-4"> Return</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 