@extends('layouts.app')

@section('content')

<section class="container mt-4">
<div class="hero-section d-flex align-items-center">
    <div class="container text-center text-white">
        <h1 class="display-6 fw-bold m-0">{{ $title }}</h1>
    </div>
</div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        @if($visimisis)
                        <!-- Visi Quote -->
                        <div class="text-center mb-4">
                            <blockquote class="blockquote mb-0">
                                <p class="h4 fw-bold text-primary font-italic">
                                   {!! $visimisis->visi !!}
                                </p>
                            </blockquote>
                        </div>

                        <hr class="my-4">

                        <!-- Misi -->
                        <div class="text-center">
                            <h3 class="h5 fw-bold text-primary mb-3">MISI</h3>
                            <div class="bg-primary bg-opacity-10 rounded p-3 text-start">
                                <p class="mb-0 text-dark">
                                    {!! $visimisis->misi !!}
                                </p>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection