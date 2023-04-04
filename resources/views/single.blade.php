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
            <h4>{{ $tasks->task_name}}</h4>

        </div>
        <div class="row mt-3 card">
            <div class="card-body">
                <form id="task-form" method="post" action="" name="task-form" class="needs-validation">
                    {{ method_field('PUT') }}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Enter task name</label>
                      <input type="text" name="task_name" class="form-control" value="{{ $tasks->task_name }}" id="exampleInputaskname1" aria-describedby="taskName" />
                      <div id="taskName" class="form-text">Enter task name.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputaskdescrition1" class="form-label">Description</label>
                        <textarea name="task_description" id="task_description" cols="30" class="form-control" id="exampleInputaskdescription1" aria-describedby="taskDescription" rows="10">{{ $tasks->task_description }}</textarea>
                        <div id="taskDescription" class="form-text">Enter Task description.</div>
                    </div>
                   <div class="modal-footer">

                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>

                </form>
            </div>
        </div>

    </div>

</body>
</html>
