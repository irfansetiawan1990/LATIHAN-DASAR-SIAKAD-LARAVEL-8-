@extends('adminlte::page')

@section('content')
 <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Test</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Test </li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">


@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Wadooo</strong> Ada masalah dalam inputan.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('mapel.store') }}" method="POST">
                   @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Kode Mapel</label>
                    <input type="text" class="form-control" id="kode_mapel" name="kode_mapel" placeholder="masukan nama">
                  </div>
                  <div class="form-group">
                    <label for="nim">Nama Mapel</label>
                    <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" placeholder="masukan nim">
                  </div>
                  <div class="form-group">
                      <label for="prodi">Guru Mapel</label>
             <select id="guru_id" name="guru_id" class="select2bs4 form-control @error('guru_id') is-invalid @enderror">
                            <option value="">-- Pilih Guru Mapel --</option>
                            @foreach ($guru as $data)
                                <option value="{{ $data->id }}">{{ $data->nama_guru }}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
              
      
@endsection
