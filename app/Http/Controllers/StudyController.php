<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Study;
use Illuminate\Http\Request;

class StudyController extends Controller
{

    private $label = 'Program Studi';
    private $prefix = 'study';
    function __construct()
    {
        $this->middleware('panitia');
    }

    public function index()
    {
        $route      = route('back.' . $this->prefix . '.create');
        $title      = 'Data ' . $this->label;
        $data       = Study::latest()->paginate(5);
        return view($this->prefix . '.index', compact(['route', 'data', 'title']));
    }

    public function create()
    {
        $faculties = Faculty::latest()->get();
        $title = 'Tambah ' . $this->label;
        $label = $this->label;
        $route = route('back.' . $this->prefix . '.store');
        return view($this->prefix . '.create', compact(['faculties', 'route', 'label', 'title']));
    }

    public function edit(Study $study)
    {
        $faculties = Faculty::latest()->get();
        $title = 'Edit ' . $this->label;
        $label = $this->label;
        $route = route('back.' . $this->prefix . '.update', $study->id);
        return view($this->prefix . '.edit', compact(['faculties', 'route', 'label', 'title', 'study']));
    }

    public function setKouta(Study $study)
    {
        if(auth()->user()->akses === 'superadmin'){
            if (request()->isMethod('get')) {
                $data       = Study::latest()->get();
                return view('study.kouta', compact('data'));
            } elseif (request()->method('patch')) {
                $kouta = request('kouta');
                $study->update(['kouta' =>  $kouta]);
                return redirect()->back()->with('success', 'Berhasil Mengubah Kouta');
            }
        }else{
            return redirect()->back();
        }

       
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'faculty_id' => 'required'
        ]);

        Study::create([
            'name' => request('name'),
            'faculty_id' => request('faculty_id'),
        ]);

        return redirect(route('back.' . $this->prefix . '.index'))->with('success', 'Berhasil Menambahkan ' . $this->label . ' Baru');
    }

    public function update(Study $study)
    {
        request()->validate([
            'name' => 'required',
            'faculty_id' => 'required'
        ]);

        $study->update([
            'name' => request('name'),
            'faculty_id' => request('faculty_id'),
        ]);

        return redirect(route('back.' . $this->prefix . '.index'))->with('success', 'Berhasil Mengubah ' . $this->label);
    }

    public function destroy(Study $study)
    {
        $study->delete();
    }
}
