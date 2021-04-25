<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use Illuminate\Http\Request;

class LaptopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Laptop::latest()->paginate(5);
    
        return view('data_laptop.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data_laptop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'merk_laptop' => 'required',
            'seri_laptop' => 'required',
            'thn_produksi' => 'required',
        ]);
    
        Laptop::create($request->all());
     
        return redirect()->route('data_laptop.index')
                        ->with('success','Data Berhasil Disimpan.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laptop  $laptop
     * @return \Illuminate\Http\Response
     */
    public function edit(laptop $data_laptop)
    {
        return view('data_laptop.edit',compact('data_laptop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laptop  $laptop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laptop $data_laptop)
    {
        $request->validate([
            'merk_laptop' => 'required',
            'seri_laptop' => 'required',
            'thn_produksi' => 'required',
        ]);
    
        $data_laptop->update($request->all());
    
        return redirect()->route('data_laptop.index')
                        ->with('success','Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laptop  $laptop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laptop $data_laptop)
    {
        $data_laptop->delete();
    
        return redirect()->route('data_laptop.index')
                        ->with('success','Data Berhasil Dihapus');
    }
}
