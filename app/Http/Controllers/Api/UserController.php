<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $posts = User::all();

        return new PostResource(true, 'List Data Posts', $posts);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'         => 'required',
            'email'        => 'required',
            'password'     => 'required',
            'address'      => 'required',
            'house_number' => 'required',
            'phone_number' => 'required',
            'city'         => 'required',
            'roles'        => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $post = User::create([
            'name'         => $request->name,
            'email'        => $request->email,
            'password'     => $request->password,
            'address'      => $request->address,
            'house_number' => $request->house_number,
            'phone_number' => $request->phone_number,
            'city'         => $request->city,
            'roles'        => $request->roles,
        ]);

        return new PostResource(true, 'Data Post Berhasil Ditambahkan.', $post);
    }

    public function show($id)
    {
        $post = User::find($id);

        return new PostResource(true, 'Detail Data Post', $post);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'         => 'required',
            'email'        => 'required',
            'password'     => 'required',
            'address'      => 'required',
            'house_number' => 'required',
            'phone_number' => 'required',
            'city'         => 'required',
            'roles'        => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $post = User::find($id);
        $post->update([
            'name'         => $request->name,
            'email'        => $request->email,
            'password'     => $request->password,
            'address'      => $request->address,
            'house_number' => $request->house_number,
            'phone_number' => $request->phone_number,
            'city'         => $request->city,
            'roles'        => $request->roles,
        ]);

        return new PostResource(true, 'Data Post Berhasil Diubah!', $post);
    }

    public function destroy($id)
    {
        $post = User::find($id);

        if ($post) {
            $post->delete();
        }

        return new PostResource(true, 'Data Post Berhasil Dihapus!', null);
    }
}
