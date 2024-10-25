@extends('layouts.admin')
@section('content')
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

            .btn1 {
                background-color: rgba(0, 0, 0, 0.55);
                width: 200px;
                color: white;
                border-radius: 50px;
                border: none;
                font-weight: bold;
                transition: transform 0.3s, background-color 0.3s;
            }

            .btn1:hover {
                color: rgba(0, 0, 0, 0.55) background-color: #f54e54;
                transform: scale(1.05);
            }

            input,
            select {
                padding: 12px;
                margin-bottom: 20px;
                border-radius: 10px;
                border: 1px solid #ccc;
                transition: border-color 0.3s;
            }

            input:focus,
            select:focus {
                border-color: #bfc0fa;
                outline: none;
            }
        </style>
    </head>

    <body>
        <div class="card">
            <div class="card-body">
                <h6 class="mb-4">Enter department details below</h6>
                <form action="{{ route('Department.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Show errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Department Code Input -->
                    <div class="mb-3">
                        <label for="d_code">Code</label>
                        <input type="text" class="form-control" id="d_code" name="d_code"
                            placeholder="Enter Department code here..." value="{{ old('d_code') }}">
                        @error('d_code')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Department Name Input -->
                    <div class="mb-3">
                        <label for="d_name">Name</label>
                        <input type="text" class="form-control" id="d_name" name="d_name"
                            placeholder=" Enter Department name here..." value="{{ old('d_name') }}">
                        @error('d_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Status Dropdown -->
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select class="form-select" id="status" name="status">
                            <option selected disabled>Choose status </option>
                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="2" {{ old('status') == '2' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn1">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </body>


    </html>
@endsection
