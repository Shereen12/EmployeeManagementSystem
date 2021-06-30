<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
    <div class="row">
      <div class="col-sm-12">
        <table class="table table-bordered table-dark">
          <thead>

            <tr>
              <th scope="col">Image</th>
              <th scope="col">Employee</th>
              <th scope="col">DoB</th>
              <th scope="col">Department</th>
              <th scope="col">Division</th>

            </tr>
          </thead>
          <tbody>
            @foreach ($results as $result)
              <tr role="row" class="odd">
                <td><img src="{{ asset ('avatars/' . $result->picture ) }}"  class="user-image" width="50px" height="50px"/></td>
                <td >{{ $result->firstname }} {{$result->middlename}} {{$result->lastname}}</td>
                <td class="hidden-xs">{{ $result->birthdate }}</td>
                <td class="hidden-xs">{{ $result->department_name }}</td>
                <td class="hidden-xs">{{ $result->division_name }}</td>

                <td colspan="3">

                </td>
            </tr>
          @endforeach
          </tbody>
        </table>
    </div>
</div>
<br>
<button type="button" onclick="window.location='{{ url('/departments')  }}'">close</button>

