<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Enums\UserType;
use App\Enums\Status;

class AdminClientManageController extends Controller
{
    public function clientsList(){
        $clients = User::where('type','=',UserType::CLIENT)->get();
        return view('admin.client.index', compact('clients'));
    }

    public function addClient()
    {
        return view('admin.client.add_client');
    }

    public function addSubmit(Request $request)
    {
        
        $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:users,email',
            'phone'                 => 'required|string|max:15',
            'password'              => 'required|confirmed|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'password' => Hash::make($request->password),
            'type'     => UserType::CLIENT,
            'status'   => Status::ACTIVE,
        ]);

         return redirect()->route('admin.client.list')->with('success', 'Client added successfully.');
    }

    public function edit($id)
    {
        $client = User::findOrFail($id);
        return view('admin.client.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $client = User::findOrFail($id);

        $validated = $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:users,email,' . $id,
            'phone'  => 'nullable|string|max:20',
            'image'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=100,min_height=100',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $client->image = 'images/' . $imageName;
        }

        $client->name = $validated['name'];
        $client->email = $validated['email'];
        $client->phone = $validated['phone'];
        $client->status  = $request->status;
        $client->save();

        return redirect()->route('admin.client.list')->with('success', 'Client updated successfully.');
    }


    public function destroy($id)
    {
        $client = User::findOrFail($id);
        $client->delete();

        return redirect()->route('admin.client.list')->with('success', 'Client deleted.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
