@extends('adminlte::page')

@section('content')
 <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kelas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Kelas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Kelas</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>                                                
        <div class="card-body">
          

          <!-- Tombol untuk menampilkan modal-->
            <button type="button" class="btn btn-primary btn" data-toggle="modal" data-target="#modalTambahmhs">Tambah</button>



           
            <!-- Modal -->

            <div class="modal fade" id="modalTambahmhs" tabindex="-1" aria-labelledby="modalTambahmhs" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Tambah Data Kelas</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH Kelas-->
                          <form action="{{ route('kelas.store') }}" method="POST">
                            @csrf
                                  <div class="form-group">
                                    <label>Nama Kelas</label>
                                    <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" aria-describedby="emailHelp">
                                    </div>
                                  <div class="form-group">
                                      <label>Wali Kelas</label>
                                      <select id="guru_id" name="guru_id" class="select2bs4 form-control @error('guru_id') is-invalid @enderror">
                                              <option value="">-- Pilih Guru Mapel --</option>
                                                  @foreach ($guru as $data)
                                              <option value="{{ $data->id }}">{{ $data->nama_guru }}</option>
                                                @endforeach
                                              </select>
                                  </div>
                          <button type="submit" class="btn btn-primary">Simpan Data</button>
                          </form>
                    <!--END FORM TAMBAH BARANG-->
                    </div>
                    </div>
                  </div>
                </div>

            
        </div>


    <div class="card-body">

    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th width="280px" class="text-center">Nama Kelas</th>
            <th width="280px" class="text-center">Wali kelas</th>
            <th width="200px"class="text-center">Action</th>
        </tr>
        @foreach ($kelas as $data)
        <tr>
            <td width="20px" class="text-center">{{ ++$i }}</td>
            <td width="280x">{{ $data->nama_kelas }}</div></td>
            <td width="280px">{{ $data->guru->nama_guru }}</div></td>
            <td width="100px">
              

                  <!--modal Show-->
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalshowKelas{{ $data->id }}">Detail</button>
                  <div class="modal fade" id="modalshowKelas{{ $data->id }}" tabindex="-1" aria-labelledby="modalTambahmhs1" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                                <h5 class="modal-title">Detail Data Kelas</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                      </button>
                          </div>
                          <div class="modal-body">
                              <table class="table">
                                <tbody>
                                  <tr>
                                      <td>Nama</td>
                                      <td width="5px">:</td>
                                      <td>{{ $data->nama_kelas }}</td>
                                    </tr>
                                    <tr>
                                      <td>Wali Kelas</td>
                                      <td width="5px">:</td>
                                      <td>{{ $data->guru->nama_guru }}</td>
                                    </tr>

                                    <tr>
                                </tbody>
                              </table>
                             


                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
                              <!--button type="button" class="btn btn-primary">Save changes</button-->
                            </div>
                          </div>
                        </div>
                      </div>

                      </div>


                  <!--modal hapus-->
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modaledit{{ $data->id }}">Edit</button>
                  <div class="modal fade" id="modaledit{{ $data->id }}" tabindex="-1" aria-labelledby="modaledit" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                                <h5 class="modal-title">Edit Data Kelas</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                      </button>
                          </div>
                          <div class="modal-body">
                                <form action="{{ route('kelas.update',$data->id) }}" method="POST">
                                  @csrf
                                  @method('put')
                                        <div class="form-group">
                                          <label for="">Nama Kelas</label>
                                          <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" aria-describedby="emailHelp" value="{{ $data->nama_kelas }}">
                                          </div>
                                        <div class="form-group">
                                            <label for="">Wali Kelas</label>
                                            <select id="guru_id" name="guru_id" class="select2bs4 form-control @error('guru_id') is-invalid @enderror">
                                              <option value="">-- Pilih Guru Mapel --</option>
                                                  @foreach ($guru as $data)
                                              <option value="{{ $data->id }}">{{ $data->nama_guru }}</option>
                                                @endforeach
                                              </select>
                                        </div>
                                <button type="submit" class="btn btn-primary">Simpan Data</button>
                                </form>
                      
                          </div>
                          </div>
                        </div>
                      </div>
                    
                    <!--modal hapus-->
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalhapus{{ $data->id }}">Delete</button>
                    <div class="modal fade" id="modalhapus{{ $data->id }}" tabindex="-1" aria-labelledby="modalhapus" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-body">
                                  <h4 class="text-center">PERHATIAN !</h4>
                                  <h4 class="text-center">Apakah anda yakin ingin menghapus Data ini?</h4>
                                  </div>
                                  <div class="modal-footer">
                                    <form action="{{ route('kelas.destroy',$data->id) }}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-primary">Hapus Data!</button>
                                    </form>
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                            </div>
                          </div>
                        </div>
                    </div>

                      
                  
                  
          
            </td>
        </tr>
        @endforeach
    </table>
    <br>
        <div class="pull-right">
               {{ $kelas->links() }}
        </div>
    

     </div>

        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
   @stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop



