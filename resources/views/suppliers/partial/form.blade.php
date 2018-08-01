
<div class="media">
    <div class="media-body">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="form-group {{ $errors->has('supplier_name') ? 'has-error' : '' }}">
                    <label for="title">SUPPLIER NAME</label>
                    <input type="text" name="supplier_name" id="supplier_name" value="{{ old('supplier_name', $supplier->supplier_name) }}" class="form-control"/>
                    {!! $errors->first('supplier_name', '<span class="form-error">:message</span>') !!}
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
                    <label for="title">COUNTRY</label>
                    <input type="text" name="country" id="country" value="{{ old('country', $supplier->country) }}" class="form-control"/>
                    {!! $errors->first('country', '<span class="form-error">:message</span>') !!}
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                    <label for="title">CITY</label>
                    <input type="text" name="city" id="city" value="{{ old('country', $supplier->city) }}" class="form-control"/>
                    {!! $errors->first('city', '<span class="form-error">:message</span>') !!}
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-group {{ $errors->has('contact_name') ? 'has-error' : '' }}">
                    <label for="title">CONTACT NAME</label>
                    <input type="text" name="contact_name" id="contact_name" value="{{ old('city', $supplier->contact_name) }}" class="form-control"/>
                    {!! $errors->first('contact_name', '<span class="form-error">:message</span>') !!}
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-group {{ $errors->has('contact_name') ? 'has-error' : '' }}">
                    <label for="title">EMAIL</label>
                    <input type="text" name="email" id="email" value="{{ old('email', $supplier->email) }}" class="form-control"/>
                    {!! $errors->first('email', '<span class="form-error">:message</span>') !!}
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-group {{ $errors->has('telephone') ? 'has-error' : '' }}">
                    <label for="title">PHONE</label>
                    <input type="text" name="telephone" id="telephone" value="{{ old('telephone', $supplier->telephone) }}" class="form-control"/>
                    {!! $errors->first('telephone', '<span class="form-error">:message</span>') !!}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                    <label for="title">ADDRESS</label>
                    <input type="text" name="address" id="address" value="{{ old('address', $supplier->address) }}" class="form-control"/>
                    {!! $errors->first('address', '<span class="form-error">:message</span>') !!}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group {{ $errors->has('memo') ? 'has-error' : '' }}">
                    <label for="title">MEMO</label>
                    <input type="text" name="memo" id="memo" value="{{ old('memo', $supplier->memo) }}" class="form-control"/>
                    {!! $errors->first('memo', '<span class="form-error">:message</span>') !!}
                </div>
            </div>
        </div>
    </div>
</div>
</br>