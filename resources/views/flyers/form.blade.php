@inject('countries', 'App\Http\Utilities\Country')

<div class="row">
    {{ csrf_field() }}

    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Name</label>
            <input name="name" type="text" class="form-control" id="name" value="{{old('name')}}" required>
        </div>

        <div class="form-group">
            <label for="street">Street</label>
            <input name="street" type="text" class="form-control" id="street" value="{{old('street')}}" required>
        </div>

        <div class="form-group">
            <label for="zip">Zip</label>
            <input name="zip" type="text" class="form-control" id="zip" value="{{old('zip')}}" required>
        </div>

        <div class="form-group">
            <label for="country">Country</label>
            <select class="form-control" id="country" name="country">
                @foreach($countries::all() as $name => $code)
                    <option value="{{$code}}">{{$name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="state">State</label>
            <input name="state" type="text" class="form-control" id="state" value="{{old('state')}}" required>
        </div>

        <div class="form-group">
            <label for="city">City</label>
            <input name="city" type="text" class="form-control" id="city" value="{{old('city')}}" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="price">Sale price</label>
            <input name="price" type="text" class="form-control" id="price" value="{{old('price')}}" required>
        </div>

        <div class="form-group">
            <label for="description">Home Description</label>
            <textarea name="description" type="text" class="form-control" id="description" rows="10" required>
        {{old('description')}}
        </textarea>
        </div>
    </div>

    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Create Flyer</button>
    </div>
</div>