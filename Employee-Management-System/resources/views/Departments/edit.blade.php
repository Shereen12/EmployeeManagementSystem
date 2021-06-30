<h1>
    Edit Department
</h1>


<form role="form" method="POST" action= "{{ route('departmentUpdate', ['id' => $department->id]) }}" >
    {{ csrf_field() }}

    <div class="col-md-6">
        <input id="department_name" type="text" class="form-control" name="name" value="{{ $department->name }}" >

        @if ($errors->has('department_name'))
            <span class="help-block">
                <strong>{{ $errors->first('department_name') }}</strong>
            </span>
        @endif
    </div>
<br>
    <button type="button" onclick="window.location='{{ url('/departments')  }}'">close</button>
    <button type="submit" class="btn btn-primary">Save Department</button>

</form>
