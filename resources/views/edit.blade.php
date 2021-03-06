<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="container">
        <h2> form</h2>
        <form action="{{ url('update') }}" method="post" enctype="multipart/form-data">

            @csrf


            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" value="{{ $data->name }}" class="form-control" id="exampleInputName"
                    aria-describedby="" placeholder="Enter Name">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Age</label>
                <input type="number" name="age" value="{{ $data->age }}" class="form-control" id="exampleInputEmail1"
                    aria-describedby="" placeholder="Enter Age">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Phone</label>
                <input type="number" name="phone" value="{{ $data->phone }}" class="form-control"
                    id="exampleInputEmail1" aria-describedby="" placeholder="Enter Phone">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">National Id</label>
                <input type="number" name="id" value="{{ $data->national_id }}" class="form-control" id="exampleInputEmail1"
                    aria-describedby="" placeholder="Enter National Id">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">New Password</label>
                <input type="password" name="password" value="{{ old('password') }}" class="form-control"
                    id="exampleInputPassword1" placeholder="Password">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <input type="text" name="address" value="{{ $data->address }}" class="form-control"
                    id="exampleInputEmail1" aria-describedby="" placeholder="Enter Address">
            </div>

            <div class="form-group">
                <textarea name="about " placeholder="About Me" cols="160" rows="10"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>
