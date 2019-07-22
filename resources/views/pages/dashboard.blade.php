@extends('template')
@section('title','Dashboard')
@section('content')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            @foreach($data as $i)
            <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{count($i->calon_mahasiswas)}}</h3>
                        <p>Jumlah Pendaftar</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">{{$i->j_nama}} - {{$i->jurusan_kuota->jk_kuota}}</a>
                </div>
                <!--{{$total=$total+count($i->calon_mahasiswas)}}-->
                <!--{{$kuota=$kuota+($i->jurusan_kuota->jk_kuota)}}-->
            </div>

            @endforeach
            <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$total}}</h3>

                        <p>Total Pendaftar</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">Total Penerimaan {{$kuota}}</a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </div><!-- /.container-fluid -->
@endsection
