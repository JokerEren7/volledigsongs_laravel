<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Band</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<nav class="bg-gray-800 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ route('bands.index') }}" class="text-white text-lg font-semibold">Bands</a>
        <div class="space-x-4">
            <a href="{{ route('songs.index') }}" class="text-white">Songs</a>
        </div>      
        <div class="space-x-4">
        <a href="{{ route('albums.index') }}" class="text-white">Albums</a></div>
    </div>
</nav>
    <h1>Create a New Band</h1>

    <form method="POST" action="{{ route('bands.store') }}" class="mt-8">
        @csrf
        <label for="name" class="block text-sm font-medium text-gray-700">Band Name:</label>
        <input type="text" id="name" name="name" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">

        <label for="genre" class="block mt-4 text-sm font-medium text-gray-700">Genre:</label>
        <input type="text" id="genre" name="genre" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">

        <label for="founded" class="block mt-4 text-sm font-medium text-gray-700">Founded Year:</label>
        <input type="text" id="founded" name="founded" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">

        <button type="submit" class="mt-4 bg-blue-500 text-white p-2 rounded-md">Create Band</button>
    </form>

    <a href="{{ route('bands.index') }}" class="mt-4 text-blue-500">Back to Bands List</a>
</body>
</html>
