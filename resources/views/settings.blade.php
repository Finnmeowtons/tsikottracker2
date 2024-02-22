<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
</head>
<body>
<div class="container-fluid">
        <div class="row">
            @include('components.side-nav')

            <div class="col" > 
            <div class="row mb-4">
        <div class="row g-3 mx-auto mt-3">
            <div class="col-md-6"> <select class="form-select" style="max-width:400px;">
                    <option value="0">CJS</option>
                </select>
            </div>
            <div class="col-md-6 d-flex justify-content-end"> <button class="btn btn-primary" style="width:200px;">Add Offer</button>
            </div>
        </div>
    </div>
    
    <div class="table-container   mx-auto"  style="margin: 1.2rem; max-width:1600px;">
        <table class="table table-striped table-hover" id="data-table">
            <thead>
                <tr>
                <th class="col">ID</th>
                    <th class="col">Name</th>
                    <th class="col">Owner ID</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($companies as $company)
                <tr>
                <th scope="row">{{ $company->id }}</th>
                <td>{{ $company->name }}</td>
                <td>{{ $company->owner_id }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
                </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"></script>

</body>
</html>