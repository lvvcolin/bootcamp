<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\Rule;

class ProfilesController

{

	public function show(User $user)

	{

		return view('profiles.show', compact('user'));
	}

	public function edit(User $user)

	{

		return view('profiles.edit', compact('user'));
	}

	public function update(User $user)

	{

		$user->update($this->validateProf());

		return back();
	}

	protected function validateProf()

	{

		$attributes = request()->validate([

			'username' => ['string', 'required', 'max:255', 'alpha_dash',],
			'name' => ['string', 'required', 'max:255'],
			'avatar' => ['file', 'dimensions:min_width=100,min_height=200',],
			'email' => ['string', 'required', 'email', 'max:255',],
			'password' => (['string', 'required', 'min:8', 'max:255', 'confirmed'])

		]);

		$attributes['password'] = Hash::make(request('password'));

		$attributes['avatar'] = request('avatar')->storeAs('avatars', request('avatar')->getClientOriginalName());

		return $attributes;
	}
}
