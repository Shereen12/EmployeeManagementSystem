<h1> Add new User </h1>

<form class="form-horizontal" role="form" method="POST" action="{{ route('userstore') }}">
    {{ csrf_field() }}

        <div class="col-md-6">
            Name
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required placeholder="First Name">

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <br><br>


        <div class="col-md-6">
            Email
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="E-Mail Address">

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <br><br>
        <div class="col-md-6">
            Password
            <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="col-md-6">
            Confirm Password
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
        </div>
<br>
<div class="modal-footer">
    <button type="button" onclick="window.location='{{ url('/users')  }}'">close</button>
<button type="sumbit" class="btn btn-primary">Save User</button>
</div>
</form>
