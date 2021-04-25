@extends('data_laptop.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Laptop</h2>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('data_laptop.update',$data_laptop->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Merk Laptop</strong>
                    <input type="text" name="merk_laptop" value="{{ $data_laptop->merk_laptop }}" class="form-control" placeholder="Merk Laptop">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Seri Laptop</strong>
                    <input type="text" name="seri_laptop" value="{{ $data_laptop->seri_laptop }}" class="form-control" placeholder="Seri Laptop">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tahun Produksi</strong>
                    <input type="number" name="thn_produksi" value="{{ $data_laptop->thn_produksi }}" class="form-control" placeholder="Tahun Produksi">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <a class="btn btn-dark" href="{{ route('data_laptop.index') }}">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
   
    </form>
@endsection