<h1> Add Country </h1>
<form method="post" action=" {{ route('countryStore') }}"  >

    {{ csrf_field() }}

                            <div class="col-md-6">
                                Name
                                <input id="country_name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Country">

                                @if ($errors->has('country_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country_name') }}</strong>
                                    </span>
                                @endif
                            </div>
  <br>
                            <button type="button" onclick="window.location='{{ url('/countries')  }}'">close</button>
                            <button type="submit" class="btn btn-primary">Save Country</button>
