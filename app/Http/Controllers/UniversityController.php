<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\university;
use App\Http\Controllers\HomeController;


class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
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
            $univ = university::orderBy('created_at', 'desc')->get();
        }

        return view('admin.universities.views', compact('univ'));
    }

    public function create()
    {
        if (Auth::user()->usertype == 'admin') {
            return view('admin.universities.univ_from');
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
            university::create($request->all());
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
            $univ = university::findOrFail($id);
            return view('admin.universities.show', compact('univ'));
        } else {
            return view('dashboard');
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
            $univ = university::findOrFail($id);
            return view('admin.universities.edit', compact('univ'));
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
            $univ = university::findOrFail($id);
            $univ -> update($request->all());
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
            $univ = university::findOrFail($id);
            $univ -> delete();
            return redirect()->route('adminhome');
        } else {
            return view('dashboard');
        }
    }
}
