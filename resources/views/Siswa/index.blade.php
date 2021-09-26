@extends('adminlte::page')

@section('content')
 <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Siswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Data Siswa</li>
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
          <h3 class="card-title">Data Siswa</h3>
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

          <a class="btn btn-success" href="{{ route('siswaexport') }}" role="button">Export</a>

          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Import
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Import Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

  <form action="{{ route('siswaimport') }}" method="post" enctype="multipart/form-data">>

      <div class="modal-body">
        Perhatian! <br>
        Pastikan data yg diimport sudah sesuai dengan format yang sudah ditentukan.<br>
        <br>   

          {{ csrf_field() }}
          <div class="form-group">
            <input type="file" name="file" required="required"> 
          </div>
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Selesai</button>
            <button type="submit" class="btn btn-primary">Import</button>
        </div>
      </div>
    </form>
  </div>
</div>


          <button type="button" class="btn btn-primary btn" data-toggle="modal" data-target="#modalTambah">Tambah</button>
            <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambah" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Tambah Data Data Siswa</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>

                    </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH Data Siswa-->
                         <form action="{{ route('siswa.store') }}" method="POST">
                            @csrf
                                  <div class="form-group">
                                    <label for="">Nama Siswa</label>
                                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" aria-describedby="emailHelp">
                                    </div>
                                  <div class="form-group">
                                      <label for="">Tempat Tanggal Lahir</label>
                                      <input type="text" class="form-control" id="ttl" name="ttl">
                                  </div>
                                   <div class="form-group">
                                      <label for="">Asal Sekolah</label>
                                      <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah">
                                  </div>
                                   <div class="form-group">
                                      <label for="">nama orang tua</label>
                                      <input type="text" class="form-control" id="nama_ortu" name="nama_ortu">
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
            <th width="280px" class="text-center">Nama Siswa</th>
            <th width="280px" class="text-center">Asal Sekolah</th>
            <th width="280px" class="text-center">Nama Ortu</th>

            <th width="200px"class="text-center">Action</th>
        </tr>
        @foreach ($siswa as $data)
        <tr>
            <td width="20px" class="text-center">{{ ++$i }}</td>
            <td width="280x">{{ $data->nama_siswa }}</div></td>
            <td width="280px">{{ $data->asal_sekolah }}</div></td>
            <td width="280px">{{ $data->nama_ortu }}</div></td-->
            <td width="100px">


                  <!--modal Show-->
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalshow{{ $data->id }}">Detail</button>
                  <div class="modal fade" id="modalshow{{ $data->id }}" tabindex="-1" aria-labelledby="modalTambahmhs1" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                                <h5 class="modal-title">Detail Data Data Siswa</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                      </button>
                          </div>
                          <div class="modal-body">
                              <table class="table">
                                <tbody>
                                  <tr>
                                      <td>Nama Siswa</td>
                                      <td width="5px">:</td>
                                      <td>{{ $data->nama_siswa }}</td>
                                    </tr>
                                  <tr>
                                      <td>Tempat tanggal lahir</td>
                                      <td width="5px">:</td>
                                      <td>{{ $data->ttl }}</td>
                                    </tr>
                                    <tr>
                                      <td>Asal Sekolah</td>
                                      <td width="5px">:</td>
                                      <td>{{ $data->asal_sekolah }}</td>
                                    </tr>
                                     <tr>
                                      <td>Nama Orang Tua</td>
                                      <td width="5px">:</td>
                                      <td>{{ $data->nama_ortu }}</td>
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


                  <!--modal edit-->
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modaledit{{ $data->id }}">Edit</button>
                  <div class="modal fade" id="modaledit{{ $data->id }}" tabindex="-1" aria-labelledby="modaledit" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                                <h5 class="modal-title">Edit Data Data Siswa</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                      </button>
                          </div>
                          <div class="modal-body">
                                <form action="{{ route('siswa.update',$data->id) }}" method="POST">
                                  @csrf
                                  @method('put')
                                        <div class="form-group">
                                          <label for="">Nama Siswa</label>
                                          <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" aria-describedby="emailHelp" value="{{ $data->nama_siswa }}">
                                          </div>
                                        <div class="form-group">
                                            <label for="">Tempat tanggal lahir</label>
                                            <input type="text" class="form-control" id="ttl" name="ttl" value="{{ $data->ttl }}">
                                        </div>
                                          <div class="form-group">
                                            <label for="">Asal Sekolah</label>
                                            <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" value="{{ $data->asal_sekolah }}">
                                        </div>
                                         <div class="form-group">
                                            <label for="">Nama Orang Tua</label>
                                            <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" value="{{ $data->nama_ortu }}">
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
                                    <form action="{{ route('siswa.destroy',$data->id) }}" method="POST">
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
          {{ $siswa->links() }}
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



