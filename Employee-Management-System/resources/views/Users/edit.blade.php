<h1>
    Edit User
</h1>


<form role="form" method="POST" action= "{{ route('userUpdate', ['id' => $user->id]) }}" >
    {{ csrf_field() }}

    <div class="col-md-6">
        Name
        <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" >

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('user_name') }}</strong>
            </span>
        @endif
    </div>

    <div class="col-md-6">
        Email
        <input id="email" type="email" class="form-control" name="email" value="{{ $user -> email }}" >

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="col-md-6">
        Password
        <input id="password" type="password" class="form-control" name="password" value={{$user -> password}}>

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <div class="col-md-6">
        Confirm Password
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value = {{ $user -> password}}>
    </div>
<br>
    <button type="button" onclick="window.location='{{ url('/users')  }}'">close</button>
    <button type="submit" class="btn btn-primary">Save User</button>

</form>
