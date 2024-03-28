<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function showLoginForm()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $user = $request->input('user');
        $password = $request->input('password');
    
        $customer = Customer::where('user', $user)->first();
    
        if ($customer && password_verify($password, $customer->password)) {
            session(['user' => $user, 'customer_id' => $customer->id_customer]);
            return redirect()->route('homepage'); 
        }
    
        return redirect()->route('login2')->with('error', 'Đăng nhập không thành công.');
    }

    public function showRegistrationForm()
    {
        return view('pages.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'user' => 'required|unique:customers',
            'password' => 'required',
            'fullname' => 'required',
            'dob' => 'required|date',
        ]);

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        Customer::create($data);

        return redirect()->route('login2')->with('success', 'Đăng ký thành công. Đăng nhập để tiếp tục.');
    }

    public function logout()
    {
        session()->forget('user');

        return redirect()->route('homepage');
    }

    public function index()
    {
        $customer = Customer::all(); // Lấy tất cả comment từ cơ sở dữ liệu
        return view('admincp.customer.index', ['customer' => $customer]); // Trả về view index và truyền dữ liệu comments vào view
    }

   

    

     public function destroy($id_customer)
    {
        customer::find($id_customer)->delete();
        return redirect()->back();
    }
}