<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>More Advice Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- jQuery Validation JS -->

    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

</head>
<body>

    <div class="container">
        <div class="row mt-3">
            <h4>MoreAdvance Test</h4>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="col-md-3 m-0">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Create Task
                </button>

            </div>
        </div>
        <div class="row mt-3 card">
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">S/N</th>
                        <td>Task Name</td>
                        <td>Edit</td>
                        <td>Delete</td>
                      </tr>
                      @foreach($tasks as $data)
                    <tr>
                        <th scope="row">{{ $loop->index + 1}}</th>
                        <td>{{ $data->task_name }}</td>
                        <td><a href="{{route('single-task', $data->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                        <td>
                            <form method="POST" action='/{{ $data->id }}'>
                                @csrf
                                @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" name="deleteTask">Delete Task</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                  </table>
                  <div class="d-flex justify-content-center">
                    {!! $tasks->links() !!}
                  </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Task</h5>
                </div>
                <div class="modal-body">

                    <form id="task-form" method="post" action="" name="task-form" class="needs-validation">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Enter task name</label>
                          <input type="text" name="task_name" class="form-control" id="exampleInputaskname1" aria-describedby="taskName">
                          <div id="taskName" class="form-text">Enter task name.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputaskdescrition1" class="form-label">Description</label>
                            <textarea name="task_description" id="task_description" cols="30"  class="form-control" id="exampleInputaskdescription1" aria-describedby="taskDescription" rows="10"></textarea>
                            <div id="taskDescription" class="form-text">Enter Task description.</div>
                        </div>
                       <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
            </div>
        </div>
    </div>

    <script>
        // Basic Form
        $(document).ready( function () {
            $("#task-form").validate( {
                e.preventDefault();
                rules: {
                    task_name: "required",
                    task_description: "required",
                },
                messages: {
                    task_name: "Please enter your task name",
                    task_description: "Please enter your task description",
                },
                errorElement: "em",

                errorPlacement: function ( error, element ) {
                    // Add the `invalid-feedback` class to the error element
                    error.addClass( "invalid-feedback" );
                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter(element.next( "label" ));
                    } else {
                        error.insertAfter(element.next(".pmd-textfield-focused"));
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
                }
            } );
        });

    </script>


</body>
</html>
