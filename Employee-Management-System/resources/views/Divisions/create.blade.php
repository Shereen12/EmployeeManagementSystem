<h1> Add Division </h1>
<form method="post" action=" {{ route('divisionStore') }}"  >

    {{ csrf_field() }}

                            <div class="col-md-6">
                                Name
                                <input id="division_name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Division">

                                @if ($errors->has('division_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('division_name') }}</strong>
                                    </span>
                                @endif
                            </div>
  <br>
                            <button type="button" onclick="window.location='{{ url('/divisions')  }}'">close</button>
                            <button type="submit" class="btn btn-primary">Save Division</button>
