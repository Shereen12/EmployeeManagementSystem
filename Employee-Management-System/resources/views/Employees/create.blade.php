<h1>
    New Employee Data
</h1>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('employeeStore') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="col-md-4">
                                First Name
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autofocus placeholder="First name">

                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="col-md-4">
                            Middle Name
                            <input id="middlename" type="text" class="form-control" name="middlename" value="{{ old('middlename') }}"  placeholder="Middle name">

                            @if ($errors->has('middlename'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('middlename') }}</strong>
                                </span>
                            @endif
                    </div>
                            <div class="col-md-4">
                                Last Name
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required placeholder="Last name">

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                        </div>

                            <br><br>
                            <div class="col-md-4">
                                Country
                                <select class="form-control js-country" name="country">
                                    <option value="-1" selected disabled>Please select your country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                        </div>

                            <div class="col-md-4">
                                <select class="form-control js-cities" name="city" >
                                    City
                                    <option value="-1" selected disabled>Please select your city</option>
                                    @foreach ($cities as $city)
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <br><br>
                            <div class="col-md-4">
                                Zip
                                <input id="zip" type="text" class="form-control" name="zip" value="{{ old('zip') }}" required placeholder="Zip Code">

                                @if ($errors->has('zip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zip') }}</strong>
                                    </span>
                                @endif
                        </div>

                            <div class="col-md-4">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        Birthdate
                                    </div>
                                    <input type="text" value="{{ old('birthdate') }}" name="birthdate" class="form-control" id="birthDate" required placeholder="Date of Birth" >
                                </div>
                        </div>
                            <div class="col-md-4">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        Date Hired
                                    </div>
                                    <input type="text" value="{{ old('date_join') }}" name="date_join" class="form-control pull-right" id="hiredDate" required placeholder="Join Date">
                                </div>
                        </div>
                        <br><br>
                            <div class="col-md-4">
                                Department
                                <select class="form-control" name="department_id">
                                    <option selected disabled>Select Department</option>
                                    @foreach ($departments as $department)
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                                 @if ($errors->has('department_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                Division
                                <select class="form-control" name="division_id">
                                    <option selected disabled>Select Division</option>
                                    @foreach ($divisions as $division)
                                        <option value="{{$division->id}}">{{$division->name}}</option>
                                    @endforeach
                                </select>
                                 @if ($errors->has('division_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('division_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                                <div class="col-md-4">
                                    Image
                                    <input type="file" id="picture" name="picture" required >
                                </div>
                                <br><br>
                        <div class="col-md-12">
                            Address
                            <textarea id="address" type="text" class="form-control" name="address"  placeholder="Address"> {{ old('address') }} </textarea>

                            @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" onclick="window.location='{{ url('/employees')  }}'">close</button>
          <button type="submit" class="btn btn-primary">Save Employee</button>
        </div>
    </form>
      </div>
    </div>

