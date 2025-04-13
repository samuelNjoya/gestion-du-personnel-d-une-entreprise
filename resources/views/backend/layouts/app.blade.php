
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"> --}}
    <title> {{ !empty($meta_title) ? $meta_title : '' }} - GPersonnel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets/styles/styles.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/animejs@3.2.1/lib/anime.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
    <div class="app-container">
        <!-- Header -->
        @include('backend.layouts.header')

        <!-- Sidebar -->
        @include('backend.layouts.sidebar')

        <!-- Overlay for mobile -->
        <div class="overlay" id="overlay"></div>

        <!-- Main Content -->
        <main class="main-content">
          
        


             @yield('content')   


        </main>
    </div>

   
   <script src="{{asset('assets/scripts/script.js')}}"></script>
</body>
</html>