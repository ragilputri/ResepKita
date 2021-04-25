<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate_admin = User::where('email', $request->input('email'))
                                ->first();

        if($validate_admin){

            if(Hash::check($request->input('password'), $validate_admin->password)){
                Auth::loginUsingId($validate_admin->id);
                $request->session()->put('id', $validate_admin->id);
                if($validate_admin->account_status == '1'){
                    return redirect('/');
                }
                if($validate_admin->account_status  == '2'){
                    return redirect('member');
                }
            } else{
                Session::flash('gagal','Oppsss, Email atau Password salah');
                return redirect('/login')
                    ->with('account_status', 3);
            }

        }
        else{
            Session::flash('gagal','Oppsss, Email atau Password salah');
            return redirect('/login')
            ->with('account_status', 3);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
