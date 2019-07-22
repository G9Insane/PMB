@extends('template')
@section('title','Data Calon Mahasiswa')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <button type="button" class="btn btn-primary" onclick="showModal()">Tambah</button>
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>JK</th>
                            <th>Tanggal Lahir</th>
                            <th>No .Telp</th>
                            <th>Jurusan Pilihan</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data->mhs as $i)
                            <tr>
                                <td>{{$data->no++}}</td>
                                <td>{{$i->cm_nisn}}</td>
                                <td>{{$i->cm_nama}}</td>
                                <td>{{$i->cm_jk}}</td>
                                <td>{{date('d-m-Y', strtotime($i->cm_tanggal_lahir))}}</td>
                                <td>{{$i->cm_no_telp}}</td>
                                <td>{{$i->jurusan->j_nama}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default"
                                                onclick="edit('{{route('admin.calonmahasiswa.edit',$i->cm_id)}}')"
                                                ><i
                                                class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-default"
                                                onclick="d('{{route('admin.calonmahasiswa.delete',$i->cm_id)}}')"
                                        ><i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>

    <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Form Calon Mahasiswa</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <input id="name" name="name" type="text" class="form-control"
                                   placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <input id="email" name="email" type="email" class="form-control"
                                   placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input id="password" name="password" type="password" class="form-control"
                                   placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input id="cm_nisn" name="cm_nisn" type="text" class="form-control" placeholder="NISN">
                        </div>
                        <div class="form-group">
                            <select id="cm_jk" name="cm_jk" type="text" class="form-control">
                                <option>Jenis Kelamin</option>
                                <option value="L">Laki - laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <input id="cm_tanggal_lahir" name="cm_tanggal_lahir" type="date" class="form-control" placeholder="Tanggal Lahir">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <input id="cm_no_telp" name="cm_no_telp" type="number" class="form-control" placeholder="No. Telp">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <input id="cm_alamat" name="cm_alamat" type="text" class="form-control" placeholder="Alamat">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <input id="cm_sekolah_asal" name="cm_sekolah_asal" type="text" class="form-control" placeholder="Sekolah Asal">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <input id="cm_jurusan_sma" name="cm_jurusan_sma" type="text" class="form-control" placeholder="Jurusan SMA">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <input id="cm_tahun_lulus" name="cm_tahun_lulus" type="number" class="form-control" placeholder="Tahun Lulus">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <input id="cm_pendidikan_terakhir" name="cm_pendidikan_terakhir" type="text" class="form-control" placeholder="Pendidikan Terakhir">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <input id="cm_nama_ibu" name="cm_nama_ibu" type="text" class="form-control" placeholder="Nama Ibu">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <select id="cm_jurusan_id" name="cm_jurusan_id" type="text" class="form-control">
                                    <option>Jurusan Yang Dipilih</option>
                                    @foreach($data->jurusan as $i)
                                        <option value="{{$i->j_id}}">{{$i->j_nama}} - {{$i->jurusan_kuota->jk_kuota}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="save('{{route('admin.calonmahasiswa.save')}}')">
                            Save changes
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
