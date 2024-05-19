<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Album</title>

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
                <a href="{{ route('albums.index') }}" class="text-white">Albums</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-4">

        <h1 class="text-3xl font-semibold mb-4">Create Album</h1>

        <form method="POST" action="{{ route('albums.store') }}" class="mb-4">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                <input type="text" name="name" required
                    class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="year" class="block text-sm font-medium text-gray-700">Year:</label>
                <input type="number" name="year"
                    class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="times_sold" class="block text-sm font-medium text-gray-700">Times Sold:</label>
                <input type="number" name="times_sold"
                    class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Create Album</button>
        </form>

    </div>

</body>
</html>
