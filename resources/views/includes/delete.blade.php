@if(Session::has('delete'))
  <div class="alert alert-success">
    <strong>Success!</strong> {{session('delete')}}
  </div>
@endif
