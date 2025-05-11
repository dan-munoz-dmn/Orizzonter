<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="overflow-y-scroll scrollbar-hide h-screen" style="font-family: Poppins, sans-serif;">
    
    <div class="flex flex-col min-h-screen h-[1100px] bg-[url('/public/images/heroImage.jpg')] bg-no-repeat bg-cover bg-[position:center_-190px] relative">
        @include('includes.header')
        @include('includes.hero')
    </div>

    @include('includes.whatIs')
    @include('includes.objetives')
    @include('includes.features')
    @include('includes.city')
    @include('includes.download')
    @include('includes.footer')

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>