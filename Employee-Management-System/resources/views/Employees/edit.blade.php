<h1>
    Edit Employee
</h1>


<form role="form" method="POST" action= "{{ route('employeeUpdate', ['id' => $employee->id]) }}" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="col-md-4">
        First Name
        <input id="firstname" type="text" class="form-control" name="firstname" value="{{ $employee -> firstname }}">

</div>

<div class="col-md-4">
    Middle Name
    <input id="middlename" type="text" class="form-control" name="middlename" value="{{ $employee -> middlename }}" >

</div>

<div class="col-md-4">
    Last Name
    <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $employee -> lastname }}">
</div>

<br><br>
<div class="col-md-4">
    Country
    <select class="form-control" name="country_id">
        @foreach ($countries as $country)
            <option {{$employee->country_id == $country->id ? 'selected' : ''}} value="{{$country->id}}">{{$country->name}}</option>
        @endforeach
    </select>
    </div>

    <div class="col-md-4">
        City
        <select class="form-control" name="city_id">
            @foreach ($cities as $city)
                <option {{$employee->city_id == $city->id ? 'selected' : ''}} value="{{$city->id}}">{{$city->name}}</option>
            @endforeach
        </select>
</div>
<br><br>
<div class="col-md-4">
    Zip
    <input id="zip" type="text" class="form-control" name="zip" value="{{ $employee -> zip }}">

</div>

<div class="col-md-4">
    Birthdate
    <div class="input-group date">
        <div class="input-group-addon">
        </div>
        <input type="text" value="{{ $employee -> birthdate }}" name="birthdate" class="form-control" id="birthDate" >
    </div>
</div>
<div class="col-md-4">
    Hire Date
    <div class="input-group date">
        <div class="input-group-addon">

        </div>
        <input type="text" value="{{ $employee -> date_joined }}" name="date_joined" class="form-control pull-right" id="hiredDate">
    </div>
</div>
<br><br>
<div class="col-md-4">
    Department
    <select class="form-control" name="department_id">
        @foreach ($departments as $department)
            <option {{$employee->department_id == $department->id ? 'selected' : ''}} value="{{$department->id}}">{{$department->name}}</option>
        @endforeach
    </select>
</div>

<div class="col-md-4">
    Division
    <select class="form-control" name="division_id">
        <option selected disabled></option>
        @foreach ($divisions as $division)
            <option {{$employee->division_id == $division->id ? 'selected' : ''}} value="{{$division->id}}">{{$division->name}}</option>
        @endforeach
    </select>
</div>
    <div class="col-md-4">
        Image
        <input type="file" id="picture" name="picture"  >
    </div>
    <br><br>
<div class="col-md-12">
    Address
<textarea id="address" type="text" class="form-control" name="address"  placeholder="Address"> {{ $employee -> address }} </textarea>

@if ($errors->has('address'))
    <span class="help-block">
        <strong>{{ $errors->first('address') }}</strong>
    </span>
@endif
</div>


                    <button type="submit" class="btn btn-primary">Save Employee</button>
                    <button type="button" onclick="window.location='{{ url('/employees')  }}'">close</button>

    </form>

