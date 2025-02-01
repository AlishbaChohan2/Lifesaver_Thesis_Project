<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\FormSubmission;

class AdminLoginController extends Controller  
{
    public function showAdmin()
    {
        return view('admin');  
    }

    public function loginAdmin(Request $request)
    {
      
        $request->validate([
            'a_email' => 'required|email',
            'a_pswd' => 'required|min:2'
        ]);

       
        $admin = Admin::where('email', $request->a_email)->first();

        if ($admin && Hash::check($request->a_pswd, $admin->password)) {
            
            session(['admin_logged_in' => true, 'admin_name' => $admin->name]);

            return redirect()->route('admin.dashboard');
        }

        
        return back()->withErrors(['login_error' => 'Invalid email or password.']);
    }

    public function showDashboard()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('show.admin')->withErrors(['login_error' => 'Unauthorized Access!']);
        }

        $submissions = FormSubmission::latest()->get(); 

        return view('admin_dashboard', compact('submissions'));
    }

    public function logoutAdmin()
    {
        session()->flush(); 
        return redirect()->route('show.admin'); 
    }
}
