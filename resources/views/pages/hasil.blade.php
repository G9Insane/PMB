@extends('template')
@section('title','Hasil Seleksi Jurusan '.$data->hasil->first()->jurusan->j_nama)
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        @foreach($data->jurusan as $i)
                            <a href="{{route('admin.hasil.list',$i->j_id)}}" type="button" class="btn btn-primary">{{$i->j_nama}} - {{$i->jurusan_kuota->jk_kuota}}</a>
                        @endforeach
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th class="align-middle text-center text-bold" rowspan="2">No.</th>
                            <th class="align-middle text-center text-bold" rowspan="2">NISN</th>
                            <th class="align-middle text-center text-bold" rowspan="2">Nama</th>
                            <th class="align-middle text-center text-bold" rowspan="2">JK</th>
                            <th class="align-middle text-center text-bold" colspan="6">Nilai</th>
                            <th class="align-middle text-center text-bold" rowspan="2">Lulus/Tidak</th>
                        </tr>
                        <tr>
                            <th class="align-middle text-center text-bold">MTK</th>
                            <th class="align-middle text-center text-bold">B.Ind</th>
                            <th class="align-middle text-center text-bold">B.Ing</th>
                            <th class="align-middle text-center text-bold">Kejuruan</th>
                            <th class="align-middle text-center text-bold">Total</th>
                            <th class="align-middle text-center text-bold">Rata-rata</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data->hasil as $i)
                            <tr>
                                <td>{{$data->no}}</td>
                                <td>{{$i->cm_nisn}}</td>
                                <td>{{$i->cm_nama}}</td>
                                <td>{{$i->cm_jk}}</td>
                                <td>{{$i->hs_matematika}}</td>
                                <td>{{$i->hs_b_indonesia}}</td>
                                <td>{{$i->hs_b_inggris}}</td>
                                <td>{{$i->hs_kejuruan}}</td>
                                <td>{{$i->hs_total}}</td>
                                <td>{{$i->hs_rata}}</td>
                                @if($i->jurusan->jurusan_kuota->jk_kuota>=$data->no++)
                                    <td>Lulus</td>
                                @else
                                    <td>Tidak Lulus</td>
                                @endif
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
@endsection
@section('after_js')
    <script>

    </script>
@endsection
