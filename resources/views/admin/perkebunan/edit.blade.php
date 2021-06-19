@extends('layouts.backend')

@section('content')

<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
        <h3 class="card-title">Edit Data</h3>
        </div>
        <form action="/jenjang/update/{{ $jenjang->id_jenjang }}" method="POST" enctype="multipart/form-data">
            @csrf  
        <div class="card-body">                        
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Kecamatan</label>
                            <input name="jenjang" value="{{ $jenjang->jenjang }}" class="form-control" placeholder="Jenjang">
                            <div class="text-danger">
                                @error('jenjang')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Ganti Icon</label>                            
                                <input type="file" name="icon" class="form-control" accept="image/png">
                            <div class="text-danger">
                                @error('icon')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Icon</label>                            
                            <img src="{{ asset('icon') }}/{{ $jenjang->icon }}" width="100px">
                        </div>
                    </div>
                    
                </div>        
           
        </div>        
    
    <div class="card-footer">
        <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
        <a href="/jenjang" class="btn btn-warning float-right">Cancel</a>
    </div>
</form>
</div>
</div>


@endsection


