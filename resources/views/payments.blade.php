<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .btn {
            margin-top: 30px;
        }
    </style>
</head>

<body style="padding: 50px 50px 50px 50px;">
    <form method="POST" action="{{ route('excel.export') }}">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="inputEmail4">User</label>
                <select name="user_id" id="inputState" class="form-control" required>
                    <option value="">Choose...</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="inputPassword4">Total min</label>
                <input type="number" name="min_total" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="inputPassword4">Total max</label>
                <input type="number" name="max_total" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="inputPassword4">Start Date</label>
                <input type="date" name="start_date" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="inputPassword4">End Date</label>
                <input type="date" name="end_date" class="form-control">
            </div>
            <div class="form-group col-md-2">

                <button type="submit" class="btn btn-primary"><i class="fa fa-download"></i> Excel Download</button>

            </div>
        </div>

    </form>


</body>

</html>