@extends('layouts.app')

@section('template_title')
    Create Ciclo
@endsection

@section('content')
@vite(['resources/css/styles.css', 'resources/js/app.js']);

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>The Easiest Way to Add Input Masks to Your Forms</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    </head>
    <body>
        <div class="registration-form">
            <form method="POST" action="{{ route('ciclos.store') }}"  role="form" enctype="multipart/form-data">
                    @csrf
                @includeif('partials.errors')
                <div class="form-icon">
                    <span><i class="icon bi bi-tv-fill"></i></span>
                </div>
                @csrf
    
                @include('ciclo.form')
             
            </form>
            <div class="social-media">
                <h5>Sign up with social media</h5>
              
            </div>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
        <script src="assets/js/script.js"></script>
    </body>
@endsection
