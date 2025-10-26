@extends('dashboard.dashMaster')

@section('title', 'Dashboard')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    </nav>
</div>

<section class="section dashboard" style="background-image: url('{{asset('assets/img/slides-1.jpg')}}');">
    <div class="col-lg-8">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Welcome Dear <strong>{{ Auth::user()->name }}</strong></h4>
                        <p>I hope you had a nice time.</p>
                        <p>This is <strong>Vice Chancellory of Research</strong> Kandahar University Dashboard.</p>
                        <p>Check the left side menus and what changes you want to bring. <strong>Enjoy!</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('footer')
    @include('dashboard.dashFooter')
@endsection