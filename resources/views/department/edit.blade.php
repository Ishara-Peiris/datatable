<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <title>Department Form</title>
    <style>
        body {
            height: 100vh;
            margin: 0;
            background-image: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.1);
            border: none;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            border-radius: 20px;
            padding: 30px;
            width: 40rem;

        }

        .card-body {
            color: white;
        }

        .btn {
            background-color: rgba(0, 0, 0, 0.55);
            width: 200px;
            color: white;
            border-radius: 50px;
            border: none;
            font-weight: bold;
            transition: transform 0.3s, background-color 0.3s;
        }

        .btn:hover {
            color: rgb(15, 15, 15);
            background-color: #c0bfc2;
            transform: scale(1.05);
        }

        input {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 10px;
            border: 1px solid #ccc;
            transition: border-color 0.3s;
        }

        input:focus {
            border-color: #242323;
            outline: none;
        }

        select {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 10px;
            border: 1px solid #ccc;
            transition: border-color 0.3s;
        }

        select:focus {
            border-color: #3d3d3d;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-body">

            <h6 class="mb-4">Enter department details below</h6>
            <form action="{{ route('DepartmentController.edit', $dept->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                </ul>
        </div>
        <div class="mb-3">
            <label class="visually-hidden" for="d_code">Code</label>
            <input type="text" class="form-control" id="d_code" name="d_code" value="{{ $dept->d_code }}"
                placeholder="Department code" required>
        </div>
        <div class="mb-3">
            <label class="visually-hidden" for="d_name">Name</label>
            <input type="text" class="form-control" id="d_name" name="d_name" value="{{ $dept->d_name }}"
                placeholder="Department name" required>
        </div>
        <div class="mb-3">
            <label class="visually-hidden" for="status">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option selected disabled>Choose status</option>
                <option value="Active" {{ $dept->status == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Inactive" {{ $dept->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>


        <div class="d-flex justify-content-center">
            <button type="submit" class="btn">UPDATE</button>
        </div>
    </div>
    </div>
    </div>
</body>

</html>
