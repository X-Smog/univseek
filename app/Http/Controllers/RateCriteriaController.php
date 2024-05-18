<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RateCriteria;
use Illuminate\Support\Facades\Auth;


class RateCriteriaController extends Controller
{
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
            $criteria = RateCriteria::orderBy('created_at', 'desc')->get();
        }

        return view('admin.criteria.views', compact('criteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->usertype == 'admin') {
            return view('admin.criteria.criteria_from');
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
            RateCriteria::create($request->all());
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
            $criteria = RateCriteria::findOrFail($id);
            return view('admin.criteria.show', compact('criteria'));
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
            $criteria = RateCriteria::findOrFail($id);
            return view('admin.criteria.edit', compact('criteria'));
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
            $criteria = RateCriteria::findOrFail($id);
            $criteria -> update($request->all());
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
            $criteria = RateCriteria::findOrFail($id);
            $criteria -> delete();
            return redirect()->route('adminhome');
        } else {
            return view('dashboard');
        }
    }
}
