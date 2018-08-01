<style>
    .form-control[disabled] {
        cursor: default;
    }
</style>

<div class="media">
    <div class="media-body">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="title">SUPPLIER</label>
                    <input type="text" name="supplier_name" id="supplier_name" value="{{ $supplier->supplier_name }}" class="form-control" disabled/>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="title">COUNTRY</label>
                    <input type="text" name="scountry" id="scountry" value="{{ $supplier->country }}" class="form-control" disabled/>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="title">CITY</label>
                    <input type="text" name="scity" id="scity" value="{{ $supplier->city }}" class="form-control" disabled/>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="title">CONTACT PERSON</label>
                    <input type="text" name="scontact_name" id="scontact_name" value="{{ $supplier->contact_name }}" class="form-control" disabled/>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="title">CONTACT EMAIL</label>
                    <input type="text" name="semail" id="semail" value="{{ $supplier->email }}" class="form-control" disabled/>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="title">CONTACT EMAIL</label>
                    <input type="text" name="telephone" id="telephone" value="{{ $supplier->telephone }}" class="form-control" disabled/>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="title">ADDRESS</label>
                    <input type="text" name="address" id="address" value="{{ $supplier->address }}" class="form-control" disabled/>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="title">MEMO</label>
                    <input type="text" name="memo" id="memo" value="{{ $supplier->memo }}" class="form-control" disabled/>
                </div>
            </div>
        </div>
    </div>

</div>

