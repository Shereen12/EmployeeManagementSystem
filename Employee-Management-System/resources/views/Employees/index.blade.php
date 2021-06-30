@extends('Employees.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    @include('flash_message')

    <h1> Search </h1>
    <form class="form-horizontal" role="form" method="POST" action="{{ route('employeeSearch') }}" enctype="multipart/form-data">
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

    <button type="submit" class="btn btn-primary">Search</button>

</form>

    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">List of Employees</h3>
        </div>
        <div class="col-sm-4">
            <button type="button" onclick="window.location='{{ route('employeeCreate') }}'">Add New Employee</button>
        </div>

    </div>
  </div>




  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>

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
                <th scope="col" rowspan="3">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($employees as $employee)
                <tr role="row" class="odd">
                  <td><img src="{{ asset ('avatars/' . $employee->picture ) }}"  class="user-image" width="50px" height="50px"/></td>
                  <td >{{ $employee->firstname }} {{$employee->middlename}} {{$employee->lastname}}</td>
                  <td class="hidden-xs">{{ $employee->birthdate }}</td>
                  <td class="hidden-xs">{{ $employee->department_name }}</td>
                  <td class="hidden-xs">{{ $employee->division_name }}</td>
                  <td colspan="3">


                    <form class="row" method="POST" action="{{ route('employeeDelete', $employee->id ) }}" onsubmit = "return confirm('Are you sure?')">
                        @csrf

                        <input type="hidden" name="_method" value="DELETE">


                        <button type="submit" class="btn btn-danger col-sm-2 col-xs-3 btn-margin"> Delete

                        </button>
                        <button type="button" onclick="window.location='{{ route('employeeEdit', $employee-> id ) }}'">Edit</button>





                    </form>
                  </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">page 1 to {{count($employees)}} of {{count($employees)}} entries</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $employees->links() }}
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
    </section>
    <!-- /.content -->
  {{-- </div> --}}
@endsection
