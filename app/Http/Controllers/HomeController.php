<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\{Payment};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $notification = array(
            'message' => 'You are Logged in Successfully !!',
            'alert-type' => 'success'
        );
        $payments = Payment::where('payer_id', Auth::id())->get();
        return view('student.home',[
            'payments' => $payments
        ])->with($notification);
    }
}
