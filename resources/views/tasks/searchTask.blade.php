<!DOCTYPE html>
<html lang="en">

<head>
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <br>
        <h1>Task Search</h1>
        <table class="table table-bordered"><!-- display retrive values in table-->
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Due Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($searchTask as $task)     <!--assign values variable name change -->
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>       <!-- retrived values are assigned -->
                        <td>{{ $task->due_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>