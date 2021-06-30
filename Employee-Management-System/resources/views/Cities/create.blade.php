<h1> Add City </h1>
<form method="post" action=" {{ route('cityStore') }}"  >

    {{ csrf_field() }}

                            <div class="col-md-6">
                                Name
                                <input id="city_name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="City">

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
