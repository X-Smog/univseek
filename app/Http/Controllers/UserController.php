<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\university;
use App\Http\Controllers\HomeController;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if ($user) {
            // L'utilisateur est authentifié, vous pouvez accéder à ses propriétés en toute sécurité
            $usertype = $user->usertype;
        } else {
            // L'utilisateur n'est pas authentifié, gérez ce cas en conséquence
            // Par exemple, redirigez l'utilisateur vers la page de connexion
            return redirect()->route('login');
        }
        if (Auth::user()->usertype == 'admin') {
            $users = User::orderBy('created_at', 'desc')->get();
            return view('admin.users.views', compact('users'));
        }else {

        }

        
    }

    public function about() {
        return view('about');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->usertype == 'admin') {
            return view('admin.users.user_from');
        } else {
            return view('dashboard');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->usertype == 'admin') {
            User::create($request->all());
            // Redirection vers une page de confirmation ou autre
            return redirect()->route('adminhome')->with('success', 'success');
        } else {
            return view('dashboard');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->usertype == 'admin') {
            $users = User::findOrFail($id);
            return view('admin.users.show', compact('users'));
        } else {
            $univ = university::findOrFail($id);
            return view('type_user.show', compact('univ'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->usertype == 'admin') {
            $users = User::findOrFail($id);
            return view('admin.users.edit', compact('users'));
        } else {
            return view('dashboard');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        if (Auth::user()->usertype == 'admin') {
            $users = User::findOrFail($id);
            $users -> update($request->all());
            return redirect()->route('adminhome');
        } else {
            return view('dashboard');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->usertype == 'admin') {
            $users = User::findOrFail($id);
            $users -> delete();
            return redirect()->route('adminhome');
        } else {
            return view('dashboard');
        }
    }

    public function show_user($id)
    {
        if (Auth::user()->usertype == 'user') {
            $univ = university::findOrFail($id);
            return view('admin.universities.show', compact('univ'));
        } else {
            return view('dashboard');
        }
    }
}
