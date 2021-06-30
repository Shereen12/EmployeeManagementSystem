@include('layouts.sidebar')

<form method="POST" action={{ route('reportSearch') }} >
    @csrf
<div class="col-md-4">
    From
    <div class="input-group date">
        <div class="input-group-addon">
        </div>
        <input type="text"  name="from" class="form-control" id="from_date"  >
    </div>

    <div class="col-md-4">
        To
        <div class="input-group date">
            <div class="input-group-addon">
            </div>
            <input type="text"  name="to" class="form-control" id="to_date"  >
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Search</button>

</form>


