<h1>
    Edit Division
</h1>


<form role="form" method="POST" action= "{{ route('divisionUpdate', ['id' => $division->id]) }}" >
    {{ csrf_field() }}

    <div class="col-md-6">
        Name
        <input id="division_name" type="text" class="form-control" name="name" value="{{ $division->name }}" >

        @if ($errors->has('division_name'))
            <span class="help-block">
                <strong>{{ $errors->first('division_name') }}</strong>
            </span>
        @endif
    </div>
<br>
    <button type="button" onclick="window.location='{{ url('/divisions')  }}'">close</button>
    <button type="submit" class="btn btn-primary">Save Division</button>

</form>
