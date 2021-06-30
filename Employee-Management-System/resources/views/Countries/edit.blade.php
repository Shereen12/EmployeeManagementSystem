<h1>
    Edit Country
</h1>


<form role="form" method="POST" action= "{{ route('countryUpdate', ['id' => $country->id]) }}" >
    {{ csrf_field() }}

    <div class="col-md-6">
        Name
        <input id="country_name" type="text" class="form-control" name="name" value="{{ $country->name }}" >

        @if ($errors->has('country_name'))
            <span class="help-block">
                <strong>{{ $errors->first('country_name') }}</strong>
            </span>
        @endif
    </div>
<br>
    <button type="button" onclick="window.location='{{ url('/countries')  }}'">close</button>
    <button type="submit" class="btn btn-primary">Save Country</button>

</form>
