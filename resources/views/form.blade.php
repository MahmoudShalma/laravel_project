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
        <h2>Vertical (basic) form</h2>
        <form action="{{ url('store') }}" method="post" enctype="multipart/form-data">

            @csrf

            {{-- <input type="hidden" name="_token"  value="{{csrf_token()}}" > --}}

            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="exampleInputName"
                    aria-describedby="" placeholder="Enter Name">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Age</label>
                <input type="number" name="age" value="{{ old('age') }}" class="form-control" id="exampleInputEmail1"
                    aria-describedby="" placeholder="Enter Age">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Phone</label>
                <input type="number" name="phone" value="{{ old('phone') }}" class="form-control"
                    id="exampleInputEmail1" aria-describedby="" placeholder="Enter Phone">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">National Id</label>
                <input type="number" name="id" value="{{ old('id') }}" class="form-control" id="exampleInputEmail1"
                    aria-describedby="" placeholder="Enter National Id">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">New Password</label>
                <input type="password" name="password" value="{{ old('password') }}" class="form-control"
                    id="exampleInputPassword1" placeholder="Password">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <input type="text" name="address" value="{{ old('address') }}" class="form-control"
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
