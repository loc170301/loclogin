</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>LOGIN TASKS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Stacked form</h2>
        <form action={{ route('tasks_list') }} method="post">
          @csrf
          <div class="form-group">
            <label>name:</label>
            <input type="text" class="form-control" name="name">
          </div>
          @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
          @endif
          <button type="submit">+ Add Task</button>
        </form>
        <hr>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>TASKS <b>Details</b></h2></div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Delete</th>                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tks as $tk) 
                        <tr>
                            <td>{{$tk->name}}</td>                           
                            <td>
                                <form action="{{ route('tasks_delete',$tk->id) }}" method="post">
                                @csrf
                                {{@method_field('DELETE')}}
                                <button type="submit" class="noboder">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach    
                </tbody>
            </table>
		   {{ $tks->links("pagination::bootstrap-4") }}  
        </div>
    </div> 
</body>
</html>
