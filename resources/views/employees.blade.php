<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employees</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    body {
      background-color: #fefefe;
    }


    table td,
    table th {
      text-overflow: ellipsis;
      white-space: nowrap;
      overflow: hidden;
      vertical-align: middle;
    }

    tbody td {
      font-weight: 500;
      color: #999999;
    }

    body .container {
      margin: 0;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      @include('components.side-nav')

      <div class="col">
        <div class="row mb-4">
          <div class="row g-3 mx-auto mt-3">
            <div class="col-md-6"> <select class="form-select" style="max-width:400px;">
                <option value="0">CJS</option>
              </select>
            </div>
            <div class="col d-flex justify-content-end"> <button class="btn btn-primary" style="width:200px;">Add
                Employee</button>
            </div>
          </div>
        </div>

        <div class="table-container mx-auto" style="max-width: 1000px">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Position</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($employees as $employee)
              <tr>
                <th scope="row">{{ $employee->name }}</th>
                <td>{{ $employee->contact_details }}</td>
                <td>{{ $employee->position }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"></script>
</body>

</html>