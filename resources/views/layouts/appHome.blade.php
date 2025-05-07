<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-purple-950 text-white">

    @include('includes.sidebar')

<script>
    document.querySelector('[data-drawer-toggle="separator-sidebar"]').addEventListener('click', () => {
        const sidebar = document.getElementById('separator-sidebar');
        sidebar.classList.toggle('-translate-x-full');
    });
</script>

</body>
</html>