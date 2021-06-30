<h1> Countries </h1>
@include('layouts.sidebar')

<h1> Search </h1>
    <form class="form-horizontal" role="form" method="POST" action="{{ route('countrySearch') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-row">
            <div class="col-md-4">
                Name
                <input id="countryname" type="text" class="form-control" name="countryname">

                <button type="submit" class="btn btn-primary">Search</button>
            </div>
            </form>

     <br> <br>

        <div class="col-sm-4">
            <button type="button" onclick="window.location='{{ route('countryCreate') }}'">Add Country</button>
        </div>
    <br><br>

    <table class="table table-bordered table-dark">
        <thead>

            <tr>
              <th scope="col">Name</th>

              <th scope="col" rowspan="3">Action</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($countries as $country)
              <tr role="row" class="odd">
                <td >{{ $country->name }} </td>

                <td colspan="3">


                  <form class="row" method="POST" action="{{ route('countryDelete', $country -> id ) }}" onsubmit = "return confirm('Are you sure?')">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      <button type="submit" class="btn btn-danger col-sm-2 col-xs-3 btn-margin"> Delete

                      </button>

                      <button type="button" onclick="window.location='{{ route('countryEdit', $country -> id ) }}'">Edit</button>



                  </form>
                </td>
            </tr>
          @endforeach
          </tbody>
