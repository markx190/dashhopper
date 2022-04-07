<div class="modal" id="custCustomerBookingModal" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content pull-right">
    <div class="edit-bookings-icon"> <b><p id="header-label"><i class="fa fa-edit"></i> Update Transaction Status</p></b></div>
<form id="cust-cb-edit-form">    
<div class="modal-body bt-industry">
    <div class="row skills-form-modal">
        <div class="col-md-3">
            <label><b>Transaction ID No.</b></label>
                <h3 id="cust-cus-id-no" style="font-size: 14px;" class="trans-id-no"></h3>
                <input id="cust-bookings-id-no" type="hidden" class="form-control edit-input" name="trans_id_no"> 
                <input id="cust-accept-status" type="hidden" class="form-control edit-input" value="Confirmed" name="trans_status">            
            <span id="edit-bookings-id-no-text" class="span-edit-text"><span>
        </div>
        <div class="col-md-3">
            <label><b>Drivers Name</b></label>
            <h3 id="cust-bookings-name" style="font-size: 14px;" class="booking-name"></h3>
        </div>
        <div class="col-md-3">
            <label><b>Route</b></label>
            <h3 id="cust-bookings-service-route" style="font-size: 14px;" class="service-route"></h3>
        </div>
        <div class="col-md-3">
            <label><b>Contact Number</b></label>
                <h3 id="cust-bookings-contact-no" style="font-size: 14px;" class="client-contact-no"></h3>
        </div>
        <div class="col-md-3">
            <label><b>Fare Amount</b></label>
                <h3 id="cust-bookings-trans-amount" style="font-size: 14px;" class="fare-amount"></h3>
        </div>
        <div class="col-md-3">
            <label><b>Travel Date</b></label>
                <h3 id="cust-date-of-travel" style="font-size: 14px;"></h3>
        </div>
        <div class="col-md-3">
            <label><b>Waiting / Pickup Location</b></label>
                <h3 id="cust-pickup-location" style="font-size: 14px;"></h3>
        </div>
        
            </div>
        </div>
        <div class="modal-footer">
            <button id="edit-trans-btn" type="button" value="Save" class="btn btn-success btn-sm pull-right" onclick="submitCustAcceptBooking(event)">Save</button>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</form>

