<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\FormSubmission;

class AdminLoginController extends Controller  
{
    // Show admin login page
    public function showAdmin()
    {
        return view('admin');  
    }

    // Handle admin login
    public function loginAdmin(Request $request)
    {
        // Validate input
        $request->validate([
            'a_email' => 'required|email',
            'a_pswd' => 'required|min:2'
        ]);

        // Check if the admin exists
        $admin = Admin::where('email', $request->a_email)->first();

        if ($admin && Hash::check($request->a_pswd, $admin->password)) {
            // Store admin session
            session(['admin_logged_in' => true, 'admin_name' => $admin->name]);

            // Redirect to admin dashboard
            return redirect()->route('admin.dashboard');
        }

        // If login fails, redirect back with an error message
        return back()->withErrors(['login_error' => 'Invalid email or password.']);
    }

    // Admin dashboard
    public function showDashboard()
    {
        // Ensure admin is logged in
        if (!session('admin_logged_in')) {
            return redirect()->route('show.admin')->withErrors(['login_error' => 'Unauthorized Access!']);
        }

        

        $submissions = FormSubmission::latest()->get(); 

        // Pass data to the view
        return view('admin_dashboard', compact('submissions'));
    }

    // Admin logout
    public function logoutAdmin()
    {
        session()->flush(); // Clear session
        return redirect()->route('show.admin'); // Redirect to login page
    }
}
