<?php

namespace App\Traits;
trait ProfileUpdatable {
    public function updateProfile($request, $user) {
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required',
            'password' => 'nullable|confirmed|min:6',
            'image' => 'nullable|image|mimes:jpg,png|max:2048|dimensions:min_width=100,min_height=100'
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $user->image = 'images/'.$imageName;
        }

        $user->email = $validated['email'];
        $user->phone = $validated['phone'];
        if ($validated['password']) {
            $user->password = bcrypt($validated['password']);
        }
        $user->save();
    }
}

?>
