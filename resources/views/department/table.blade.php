@extends('layouts.admin')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('Asset/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('table/style.css') }}" rel="stylesheet">

    <link href="{{ asset('Asset/css/custom-styles.css') }}" rel="stylesheet"> <!-- New stylesheet -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" rel="stylesheet"> <!-- Updated DataTables link -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script> <!-- Updated DataTables link -->

    <title>Department Table</title>
</head>

<body>

    <div class="container ">

        <!-- Add Department Button -->
        <div class="add-btn-container mb-4">
            <a href="{{ route('department.insert') }}" class="btn btn-add-department" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                <i class="bi bi-plus-circle"></i> Create New
            </a>
        </div>

        <!-- Filter and Search Section -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>

                    </div>
                    <div>
                        <!-- DataTable Search Bar -->
                        <input type="text" id="searchInput" class="form-control" placeholder="Search...">
                    </div>
                </div>
            </div>
        </div>

        <!-- Table inside Card -->
        <div class="card">
            <div class="card-body">
                <table id="mydataTable" class="table table-bordered table-hover">
                    <thead class="table-light text-center">
                        <tr>
                            <th scope="col">Department ID</th>
                            <th scope="col">Department Code</th>
                            <th scope="col">Department Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($dept as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->d_code }}</td>
                            <td>{{ $row->d_name }}</td>
                            <td>{{ $row->status }}</td>
                            <td>
                                <a href="{{ route('department.update', $row->id) }}" class="btn btn-outline-warning btn-sm"
                                    title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="{{ route('department.delete', $row->id) }}" class="btn btn-outline-danger btn-sm"
                                    title="Delete"
                                    onclick="return confirm('Are you sure you want to delete this department?')">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade @if ($errors->any()) show @endif" id="exampleModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true" @if ($errors->any()) style="display:block;" @endif>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Enter department details below</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('Department.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <!-- Department Code Input -->
                        <div class="mb-3">
                            <label for="d_code">Code</label>
                            <input type="text" class="form-control @error('d_code') is-invalid @enderror" id="d_code" name="d_code"
                                placeholder="Enter Department code here..." value="{{ old('d_code') }}">
                            @error('d_code')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Department Name Input -->
                        <div class="mb-3">
                            <label for="d_name">Name</label>
                            <input type="text" class="form-control @error('d_name') is-invalid @enderror" id="d_name" name="d_name"
                                placeholder="Enter Department name here..." value="{{ old('d_name') }}">
                            @error('d_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Status Dropdown -->
                        <div class="mb-3">
                            <label for="status">Status</label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                                <option selected disabled>Choose status</option>
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
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Department added successfully.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


    <script src="jquery-3.7.1.min.js"></script>
    <script>
        // Initialize DataTable
        let table = $('#mydataTable').DataTable({
            paging: true,
            pageLength: 5 // Set number of rows per page
        });




        // Search input
        $('#searchInput').on('keyup', function () {
            table.search(this.value).draw();
        });

        $(document).ready(function () {
        @if(session('success'))
            // Show the success modal if there's a success message in the session
            $('#successModal').modal('show');
        @endif
    });
    </script>

</body>

</html>
@endsection
