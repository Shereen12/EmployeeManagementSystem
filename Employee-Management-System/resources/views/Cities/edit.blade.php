<h1>
    Edit City
</h1>


<form role="form" method="POST" action= "{{ route('cityUpdate', ['id' => $city->id]) }}" >
    {{ csrf_field() }}

    <div class="col-md-6">
        Name
        <input id="country_name" type="text" class="form-control" name="name" value="{{ $city->name }}" >

        @if ($errors->has('city_name'))
            <span class="help-block">
                <strong>{{ $errors->first('city_name') }}</strong>
            </span>
        @endif
    </div>
<br>
    <button type="button" onclick="window.location='{{ url('/cities')  }}'">close</button>
    <button type="submit" class="btn btn-primary">Save City</button>

</form>
