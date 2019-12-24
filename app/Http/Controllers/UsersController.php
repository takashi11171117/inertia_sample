<?php

namespace App\Http\Controllers;

use App\User;
use Inertia\Inertia;

class UsersController extends Controller
{
    public function index()
    {
        return Inertia::render('Users/Index', [
            'users'   => User::orderBy('name')->get()
                             ->transform(function ($user) {
                                 return [
                                     'id'         => $user->id,
                                     'name'       => $user->name,
                                     'email'      => $user->email,
                                 ];
                             }),
        ]);
    }
}