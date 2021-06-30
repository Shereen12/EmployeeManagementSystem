<table class="table table-bordered table-dark">
    <thead>

        <tr>
          <th scope="col">Name</th>
          <th scope="col">Email</th>

        </tr>
      </thead>

      <tbody>
        @foreach ($results as $result)
          <tr role="row" class="odd">
            <td >{{ $result->name }} </td>
            <td > {{ $result->email}} </td>

            <td colspan="3"> </td>

        </tr>
        @endforeach
        </tbody>
</table>
<br><br>
                <button type="button" onclick="window.location='{{ url('/users')  }}'">close</button>



