<h1> Add Department </h1>
<form method="post" action=" {{ route('departmentStore') }}"  >

    {{ csrf_field() }}

                            <div class="col-md-6">
                                Name
                                <input id="department_name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Department">

                                @if ($errors->has('department_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department_name') }}</strong>
                                    </span>
                                @endif
                            </div>
  <br>
                            <button type="button" onclick="window.location='{{ url('/departments')  }}'">close</button>
                            <button type="submit" class="btn btn-primary">Save Department</button>
