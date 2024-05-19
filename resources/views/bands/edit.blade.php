<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Band: {{ $band->name }}</title>

    <!-- Include Tailwind CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans bg-gray-100">
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
    <div class="container mx-auto p-4">
@auth
        <h1 class="text-3xl font-semibold mb-4">Edit Band: {{ $band->name }}</h1>
        <form method="POST" action="{{ route('bands.update', ['band' => $band->id]) }}" class="mb-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Band Name:</label>
                <input type="text" id="name" name="name" value="{{ $band->name }}" required
                    class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="genre" class="block text-sm font-medium text-gray-700">Genre:</label>
                <input type="text" id="genre" name="genre" value="{{ $band->genre }}" required
                    class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="founded" class="block text-sm font-medium text-gray-700">Founded:</label>
                <input type="text" id="founded" name="founded" value="{{ $band->founded }}" required
                    class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="active_till" class="block text-sm font-medium text-gray-700">Active Till:</label>
                <input type="text" id="active_till" name="active_till" value="{{ $band->active_till }}" required
                    class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Update Band</button>
        </form>

        <a href="{{ route('bands.index') }}" class="text-blue-500">Back to Bands List</a>
@endauth
    </div>

</body>
</html>
