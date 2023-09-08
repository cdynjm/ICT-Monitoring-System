<!-- The Modal -->
<div class="modal fade" id="createreportModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Report</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='processing-report'></div>
                    <form id="create-report" action="">
                        @csrf

                            <p class="text-sm">Report Information</p>

                            <label for="" class="mt-2">Description</label>
                            <textarea id="" cols="30" rows="10" class="form-control" name="description"></textarea>

                            <label for="" class="mt-2">Room/Office/Laboratory</label>
                            <select name="room" class="form-select" id="" required>
                                <option value="">Select Room</option>
                                @foreach ($rooms as $ro)
                                <option value="{{ $ro->id }}">{{ $ro->room }}</option>
                                @endforeach
                            </select>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-info mt-4"> Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 