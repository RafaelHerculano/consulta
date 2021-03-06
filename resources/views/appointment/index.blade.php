<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
     <button><a href="{{action('AppointmentController@create')}}">Cadastrar</a></button>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Date</th>
        <th>Time</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($appointments as $appointment)
      <tr>
        <td>{{$appointment['date']}}</td>
        <td>{{$appointment['time']}}</td>
        
        <td><a href="{{action('AppointmentController@edit', $appointment['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('ApponnitmentController@destroy', $doctor['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>