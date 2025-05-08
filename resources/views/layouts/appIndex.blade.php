<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    @include('includes.header')
      <div class="flex items-center justify-center bg-sky-500 text-3xl font-bold h-[750px]"><span class="border-black border-4 p-6 rounded-xl bg-sky-700 text-white">Hi CodeSolutions Team</span></div>
    @include('includes.footer')
</body>
</html>