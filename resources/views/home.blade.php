<?php
//create home page view
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - ToDoList</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-green-400 via-blue-500 to-purple-600 flex items-center justify-center p-4">
    <div class="text-center">
        <h1 class="text-4xl font-bold text-white mb-4">Welcome to ToDoList</h1>
        <p class="text-white/80 text-lg mb-4">Manage your tasks efficiently and stay organized!</p>
        @if(session('message'))
            <p class="text-green-200 bg-green-800 px-4 py-2 rounded">{{ session('message') }}</p>
        @endif
    </div>
</body>
</html> 