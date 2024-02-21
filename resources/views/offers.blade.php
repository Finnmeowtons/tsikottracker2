<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offerings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        /* Apply the orange color to the table header */
        .table thead th {
            background-color: #FE8E43;
            /* Your desired orange color */
            color: #121619;
            /* Optional: Use white font for contrast */
            vertical-align: middle;
        }

        .table tr {
            height: 50px;
            vertical-align: middle;
        }
    </style>
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
    
    <div class="table-container   mx-auto"  style="margin: 1.2rem; max-width:700px;">
        <table class="table table-striped table-hover" id="data-table">
            <thead>
                <tr>
                    <th class="col-3">Name</th>
                    <th class="col-2">Price</th>
                    <th class="col-2">Type</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Carwash</th>
                    <td>99,000 Pesos</td>
                    <td>Service</td>
                </tr>
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