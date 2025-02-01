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
            max-width: 95%;
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
        .table thead tr th {
            background-color:rgb(178, 204, 92);
            
        }
    </style>
</head>
<body>

<div class="dashboard text-center">
    <h1 class="mb-4" style="color:#A8C449;">Admin Dashboard</h1>
    
    <p>Welcome, <strong>{{ session('admin_name') }} !</strong> </p>
   <a href="{{ route('logout.admin') }}" class="btn btn-sm logout-btn mt-4">Logout</a>
    <h3 class="mt-4">User Records     </h3>
    <h5 class="mt-4">Total Records: <span class="badge bg-primary">{{ $submissions->count() }}</span></h5>
    
    <form id="searchForm" class="mb-4">
    <div class="input-group">
        <input type="text" id="emailSearch" class="form-control" placeholder="Search by Email">
        
        <button type="submit" class="btn btn-primary">Search</button>
    </div>
    </form>
    <button type="button" id="clearSearch" class="btn btn-secondary">Clear Search</button>

    <div class="table-responsive mt-3">
        <table class="table table-striped" id="submissionsTable">
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
                    <th>AI Advice</th>
                    <th>Ambulance Called</th>
                    <th>Police Called</th>
                </tr>
            </thead>
            <tbody>
            @forelse($submissions as $index => $submission)
                <tr data-email="{{ $submission->email }}" data-date="{{ $submission->created_at->format('Y-m-d') }}">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $submission->id }}</td>
                    <td>{{ $submission->created_at->format('d-m-Y H:i') }}</td>
                    <td>{{ $submission->name }}</td>
                    <td>{{ $submission->age }}</td>
                    <td>{{ ucfirst($submission->gender) }}</td>
                    <td>{{ $submission->contact }}</td>
                    <td>{{ $submission->email }}</td>
                    <td>{{ $submission->location }}</td>
                    <td>{{ $submission->symptoms }}</td>
                    <td>{{ $submission->advice }}</td>
                    <td>{{ $submission->ambulance_needed ? 'Yes' : 'No' }}</td>
                    <td>{{ $submission->police_needed ? 'Yes' : 'No' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="12" class="text-center">No submissions found.</td>
                </tr>
            @endforelse
        </tbody>
        </table>
    </div>

    
</div>

<!-- Include the search script -->
<script >
    document.getElementById('searchForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const emailSearch = document.getElementById('emailSearch').value.toLowerCase();

    const rows = document.querySelectorAll('#submissionsTable tbody tr');

    rows.forEach(function(row) {

        const email = row.getAttribute('data-email').toLowerCase();

        const matchesEmail = emailSearch ? email.includes(emailSearch) : true;

        if (matchesEmail) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});


</script>

<!-- Include the clear search script -->
<script> document.getElementById('clearSearch').addEventListener('click', function() {
    document.getElementById('emailSearch').value = '';
    document.getElementById('searchForm').submit();
});
</script>

</body>
</html>
