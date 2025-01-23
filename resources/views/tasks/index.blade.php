<!DOCTYPE html>
<html lang="en">

<head>
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    
    <br>
    <br>
    <div class="container text-center">
        <h1>Task Management System</h1>

        <h2>Task List</h2> @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}    <!-- show aletrs in style-->
        </div>
        @endif
        
    </div>

    <div class="container">
        
        <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Create Task</a>   <!--directs to create task form -->
        <a href="{{ route('taskshow') }}" class="btn btn-success mb-3">Show Completed Tasks</a>  <!--button to show completed tasks -->
        <a href="{{ route('pendingTask') }}" class="btn btn-secondary mb-3">Show Pending Tasks</a>      <!-- button to show pending tasks-->
       
        <form action="{{ route('searchTask') }}" method="GET" class="mb-3">   <!--search bar to filter task by title name -->
            <input type="text" name="search" class="form-control" placeholder="Search tasks by title" value="{{ request('search') }}">
            <button type="submit" class="btn btn-dark mt-2">Search</button>
        </form>

        <table class="table table-bordered">  <!--records display table -->
            <thead class="thead-dark">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Priority</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>   <!-- retrived data assign-->
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->priority }}</td>
                    <td>{{ $task->due_date }}</td>
                
                    <td>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm">  <!--connects button to edit route to show edit form -->
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">   <!--connects button to task.destroy with the value of deleting task id -->
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this task?')">   <!--pops confirmation box -->
                                <i class="fa fa-trash"></i> Delete
                            </button>
                        </form>

                        @if (!$task->completed)
                        <form action="{{ route('tasks.complete', $task->id) }}" method="POST" style="display: inline;">   <!--button to update task when completed -->
                            @csrf
                            <button type="submit" class="btn btn-warning btn-sm">
                                <i class="fa fa-check"></i> Click To Complete
                            </button>
                        </form>
                        @else
                             <a href="{{ route('taskshow') }}" class="btn btn-success btn-sm">   <!--if the task is completed task completed button display can also visit completed task page  -->
                              <i class="fa fa-check-circle"></i> Task Completed 
                             </a>
                        @endif
                    </td>


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
