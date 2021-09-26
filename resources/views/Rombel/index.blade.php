@extends('adminlte::page')

@section('content')
 <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Rombongan Belajar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Rombongan Belajar</li>
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
          <h3 class="card-title">Data Rombongan Belajar</h3>
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
            <button type="button" class="btn btn-primary btn" data-toggle="modal" data-target="#modalTambah">Tambah</button>
            <!--button><a href="{{ route ('mapel.create') }}">Button Text</a></button-->
            <!-- Modal -->

                         

            <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambah" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Tambah Data Rombongan Belajar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>

                    </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH Rombongan Belajar-->
                         <form action="{{ route('rombel.store') }}" method="POST">
                            @csrf
                                  <div class="form-group">
                                    <label for="">Nama Siswa</label>
                                      <select id="siswa_id" name="siswa_id" class="select2bs4 form-control @error('siswa_id') is-invalid @enderror">
                                              <option value="">-- Pilih Siswa --</option>
                                                  @foreach ($siswa as $data)
                                              <option value="{{ $data->id }}">{{ $data->nama_siswa }}</option>
                                                @endforeach
                                              </select>
                                           </div>

                                      <div class="form-group">
                                        <label for="">Kelas</label>
                                          <select id="kelas_id" name="kelas_id" class="select2bs4 form-control @error('kelas_id') is-invalid @enderror">
                                              <option value="">-- Pilih Kelas --</option>
                                                  @foreach ($kelas as $data)
                                              <option value="{{ $data->id }}">{{ $data->nama_kelas }}</option>
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
            <th width="280px" class="text-center">Nama Siswa</th>
            <th width="280px" class="text-center">Kelas</th>
      
       
            <th width="200px"class="text-center">Action</th>
        </tr>
        @foreach ($rombel as $data)
        <tr>
            <td width="20px" class="text-center">{{ ++$i }}</td>
            <td width="280x">{{ $data->siswa->nama_siswa }}</div></td>
            <td width="280px">{{ $data->kelas->nama_kelas }}</div></td>
          


            <td width="100px">


                  

                  <!--modal edit-->
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modaledit{{ $data->id }}">Edit</button>
                  <div class="modal fade" id="modaledit{{ $data->id }}" tabindex="-1" aria-labelledby="modaledit" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                                <h5 class="modal-title">Edit Data Rombongan Belajar</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                      </button>
                          </div>
                          <div class="modal-body">
                                <form action="{{ route('rombel.update',$data->id) }}" method="POST">
                                  @csrf
                                  @method('put')
                                        <div class="form-group">
                                          <label for="">Nama Siswa</label>
                                          <input type="text" class="form-control" id="siswa_id" name="nama_siswa" aria-describedby="emailHelp" value="{{ $data->siswa->nama_siswa  }}" disabled>
                                        
                                          </div>
                                        <div class="form-group">
                                            <label for="">kelas</label>
                                            <select id="kelas_id" name="kelas_id" class="select2bs4 form-control @error('kelas_id') is-invalid @enderror">
                                              <option value="{{ $data->nama_kelas}}">-- Pilih Kelas --</option>
                                                @foreach ($kelas as $data)
                                                <option value="{{ $data->id }}">{{ $data->nama_kelas }}</option>
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
                                    <form action="{{ route('rombel.destroy',$data->id) }}" method="POST">
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
          {{ $rombel->links() }}
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



