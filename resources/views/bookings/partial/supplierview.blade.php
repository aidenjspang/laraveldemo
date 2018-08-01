<div class="budget-body" style="border-top: 1px solid #eeeeee;margin-top:5px;padding-top:15px;">
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label for="title">SUPPLIER</label>
                <select name="supplier_id" id="supplier_id" class="form-control" >
                    @foreach($allSuppliers as $allSupplier)
                        <option value="{{ $allSupplier->id }}" {{ $booking->supplier_id == $allSupplier->id ? 'selected="selected"' : '' }}>{{ $allSupplier->nick_name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-2 mb-3">
            <div class="form-group">
                <label for="title">COMPANY NAME</label>
                <input type="text" name="ssuppliername" id="ssuppliername" value="{{ $supplier->supplier_name }}" class="form-control" disabled/>
            </div>
        </div>

        <div class="col-md-2 mb-3">
            <div class="form-group">
                <label for="title">COUNTRY</label>
                <input type="text" name="scountry" id="scountry" value="{{ $supplier->country }}" class="form-control" disabled/>
            </div>
        </div>

        <div class="col-md-2 mb-3">
            <div class="form-group">
                <label for="title">CITY</label>
                <input type="text" name="scity" id="scity" value="{{ $supplier->city }}" class="form-control" disabled/>
            </div>
        </div>

        <div class="col-md-2 mb-3">
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

        <div class="col-md-2 mb-3">
            <div class="form-group">
                <label for="title">CONTACT NUMBER</label>
                <input type="text" name="stelephone" id="stelephone" value="{{ $supplier->telephone }}" class="form-control" disabled/>
            </div>
        </div>

        <div class="col-md-2 mb-3">
            <div class="form-group">
                <label for="title">ADDRESS</label>
                <input type="text" name="saddress" id="saddress" value="{{ $supplier->address }}" class="form-control" disabled/>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label for="title">MEMO</label>
                <input type="text" name="smemo" id="smemo" value="{{ $supplier->memo }}" class="form-control" disabled/>
            </div>
        </div>
    </div>
</div>

@section('script')
    @parent
    <script type="text/javascript">
        $('#supplier_id').on('change', function()
        {
            var supplierId = $('#supplier_id').val();
            console.log(supplierId);

            $.ajax ({
                type: "GET",
                url: '/laraveldemo/supplier_query/' + supplierId,
                data : {"_token":"{{ csrf_token() }}"},  //pass the CSRF_TOKEN()
                dataType:"json",
                success: function(item) {
                    $('#ssuppliername').val(item[0].supplier_name);
                    $('#scountry').val(item[0].country);
                    $('#scity').val(item[0].city);
                    $('#scontact_name').val(item[0].contact_name);
                    $('#semail').val(item[0].email);
                    $('#stelephone').val(item[0].telephone);
                    $('#saddress').val(item[0].address);
                    $('#smemo').val(item[0].memo);
                }
            });
        });
    </script>
@stop