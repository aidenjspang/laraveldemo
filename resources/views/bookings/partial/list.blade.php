<div class="media">
    <div class="media-body">
        <h4 class="media-heading">
            <a href="{{ route('bookings.show', $booking->id) }}">
                {{ $booking->id }}
            </a>
        </h4>

        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="title">Customer name</label>
                    <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name', $booking->customer_name) }}" class="form-control" disabled/>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="title">Customer Contact No</label>
                    <input type="text" name="customer_contact_no" id="customer_contact_no" value="{{ old('customer_contact_no', $booking->customer_contact_no) }}" class="form-control" disabled/>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="title">Customer Contact No</label>
                    <input type="text" name="customer_contact_no" id="customer_contact_no" value="{{ old('customer_contact_no', $booking->customer_contact_no) }}" class="form-control" disabled/>
                </div>
            </div>
        </div>
    </div>
</div>
