<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #A8C449;
            font-family: Arial, sans-serif;
        }
        .dashboard {
            max-width: 90%;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .logout-btn {
            background-color: #dc3545;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }
        .table thead {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>

<div class="dashboard text-center">
    <h1 class="mb-4" style="color:#A8C449;">Admin Dashboard</h1>
    
    <p>Welcome, <strong>{{ session('admin_name') }}</strong></p>
    
    <h4 class="mt-4">Total Form Submissions: 
        <!-- <span class="badge bg-primary"></span> -->
    </h4>
    
    <h5 class="mt-4">Latest Submissions:</h5>
    <div class="table-responsive mt-3">
        <table class="table table-striped border">
            <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Req. ID</th>
                    <th>Date</th>
                    <th>Patient</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Location</th>
                    <th>Symptoms</th>
                    <th>Ambulance Called</th>
                    <th>Police Called</th>
                </tr>
            </thead>
            <tbody>
               
            </tbody>
        </table>
    </div>

    <a href="{{ route('logout.admin') }}" class="btn logout-btn mt-4">Logout</a>
</div>

</body>
</html>
