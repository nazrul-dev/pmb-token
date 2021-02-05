<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{


    private $label = 'Fakultas';
    private $prefix = 'faculty';
  

    public function index()
    {
        $route      = route('back.' . $this->prefix . '.create');
        $title      = 'Data ' . $this->label;
        $data       = Faculty::latest()->paginate(5);
        return view($this->prefix . '.index', compact(['route', 'data', 'title']));
    }

    public function create()
    {
        $title = 'Tambah ' . $this->label;
        $label = $this->label;
        $route = route('back.' . $this->prefix . '.store');
        return view($this->prefix . '.create', compact(['route', 'label', 'title']));
    }

    public function edit(Faculty $faculty)
    {
        $title = 'Edit ' . $this->label;
        $label = $this->label;
        $route = route('back.' . $this->prefix . '.update', $faculty->id);
        return view($this->prefix . '.edit', compact(['route', 'label', 'title', 'faculty']));
    }

    public function store()
    {
        request()->validate([
            'name' => 'required'
        ]);

        Faculty::create([
            'name' => request('name')
        ]);

        return redirect(route('back.' . $this->prefix . '.index'))->with('success', 'Berhasil Menambahkan ' . $this->label . ' Baru');
    }

    public function update(Faculty $faculty)
    {
        request()->validate([
            'name' => 'required'
        ]);

        $faculty->update([
            'name' => request('name')
        ]);

        return redirect(route('back.' . $this->prefix . '.index'))->with('success', 'Berhasil Mengubah ' . $this->label);
    }

    public function destroy(Faculty $faculty)
    {
        $faculty->delete();
    }
}
