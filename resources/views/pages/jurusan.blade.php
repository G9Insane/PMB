@extends('template')
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
                            <th>Nama Singkatan</th>
                            <th>Nama Jurusan</th>
                            <th>Jenjang</th>
                            <th>Kuota</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data->jurusan as $i)
                            <tr>
                                <td>{{$data->no++}}</td>
                                <td>{{$i->j_singkatan}}</td>
                                <td>{{$i->j_nama}}</td>
                                <td>{{$i->j_jenjang}}</td>
                                <td>{{$i->jurusan_kuota->jk_kuota}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default"
                                                onclick="edit('{{route('admin.jurusan.edit',$i->j_id)}}')"><i
                                                class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-default"
                                                onclick="d('{{route('admin.jurusan.delete',$i->j_id)}}')"
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
                        <h4 class="modal-title">Extra Large Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="j_id" name="j_id">
                        <div class="form-group">
                            <input id="j_nama" name="j_nama" type="text" class="form-control"
                                   placeholder="Nama Jurusan">
                        </div>
                        <div class="form-group">
                            <input id="j_singkatan" name="j_singkatan" type="text" class="form-control"
                                   placeholder="Singkatan">
                        </div>
                        <div class="form-group">
                            <input id="j_jenjang" name="j_jenjang" type="text" class="form-control"
                                   placeholder="Jenjang">
                        </div>
                        <div class="form-group">
                            <input id="jk_kuota" name="jk_kuota" type="text" class="form-control" placeholder="Kuota">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="save('{{route('admin.jurusan.save')}}')">
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
@section('after_js')
    <script>
        
    </script>
@endsection
