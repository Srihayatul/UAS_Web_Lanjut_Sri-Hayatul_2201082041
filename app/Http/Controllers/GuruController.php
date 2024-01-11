<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class GuruController extends Controller
{
    public function index()
    {
    $query = Guru::latest();
        if (request('search')) {
            $query->where(function ($query) {
                $query->where('nama', 'like', '%' . request('search') . '%')
                    ->orWhere('deskripsi', 'like', '%' . request('search') . '%');
            });
        }

        $gurus = $query->paginate(6)->withQueryString();

        return view('homepage', compact('gurus'));
    }

    public function detail($id)
    {
        $guru = Guru::findOrFail($id);

        return view('detail', compact('guru'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('input', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'string', 'max:255', Rule::unique('guru', 'id')],
            'nama' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'deskripsi' => 'required|string',
            'tahunlahir' => 'required|integer',
            'lulusan' => 'required|string',
            'foto_sampul' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->route('gurus.create')
                ->withErrors($validator)
                ->withInput();
        }

        $randomName = Str::uuid()->toString();
        $fileExtension = $request->file('foto_sampul')->getClientOriginalExtension();
        $fileName = $randomName . '.' . $fileExtension;

        $request->file('foto_sampul')->move(public_path('images'), $fileName);

        Guru::create([
            'id' => $request->id,
            'nama' => $request->nama,
            'category_id' => $request->category_id,
            'deskripsi' => $request->deskripsi,
            'tahunlahir' => $request->tahunlahir,
            'lulusan' => $request->lulusan,
            'foto_sampul' => $fileName,
        ]);

        return redirect('/')->with('success', 'Data berhasil disimpan');
    }

    public function data()
    {
        $gurus = Guru::latest()->paginate(10);

        return view('data-gurus', compact('gurus'));
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        $categories = Category::all();

        return view('form-edit', compact('guru', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'deskripsi' => 'required|string',
            'tahunlahir' => 'required|integer',
            'lulusan' => 'required|string',
            'foto_sampul' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->route('gurus.edit', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        }

        $guru = Guru::findOrFail($id);

        if ($request->hasFile('foto_sampul')) {
            $randomName = Str::uuid()->toString();
            $fileExtension = $request->file('foto_sampul')->getClientOriginalExtension();
            $fileName = $randomName . '.' . $fileExtension;

            $request->file('foto_sampul')->move(public_path('images'), $fileName);

            if (File::exists(public_path('images/' . $guru->foto_sampul))) {
                File::delete(public_path('images/' . $guru->foto_sampul));
            }

            $guru->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'category_id' => $request->category_id,
                'tahunlahir' => $request->tahunlahir,
                'lulusan' => $request->lulusan,
                'foto_sampul' => $fileName,
            ]);
        } else {
            $guru->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'category_id' => $request->category_id,
                'tahunlahir' => $request->tahunlahir,
                'lulusan' => $request->lulusan,
            ]);
        }

        return redirect()->route('gurus.data')->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        $guru = Guru::findOrFail($id);

        if (File::exists(public_path('images/' . $guru->foto_sampul))) {
            if ($guru->foto_sampul != 'default.jpg') {
                File::delete(public_path('images/' . $guru->foto_sampul));
            }
        }

        $guru->delete();

        return redirect()->route('gurus.data')->with('success', 'Data berhasil dihapus');
    }
}
