<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    /**
     * Menampilkan daftar kategori.
     */
    public function index()
    {
        $members = Member::all();

        return response()->json([
            'data' => $members
        ]);
    }

    /**
     * Menyimpan kategori baru.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_member' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'detail_alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $input = $request->all();


        $members = Member::create($input);

        return response()->json([
            'message' => 'Kategori berhasil disimpan.',
            'data' => $members
        ]);
    }

    /**
     * Memperbarui kategori yang ditentukan.
     */
    public function update(Request $request, Member $member)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_member' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'detail_alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $input = $request->all();

        $member->update($input);

        return response()->json([
            'message' => 'Kategori berhasil diperbarui.',
            'data' => $member
        ]);
    }

    /**
     * Menghapus kategori yang ditentukan.
     */
    public function destroy(Member $member)
    {
        $member->delete();

        return response()->json([
            'message' => 'succes'
        ]);
    }
}
