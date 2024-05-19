<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200 font-sans">
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
        <form method="POST" action="{{ route('songs.store') }}" class="max-w-md mx-auto bg-white p-8 rounded-md shadow-md mt-8">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title:</label>
                <input type="text" id="title" name="title" required
                    class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>
            <div class="mb-4">
                <label for="singer" class="block text-sm font-medium text-gray-700">Singer:</label>
                <input type="text" id="singer" name="singer" required
                    class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>
            <div>
                <button type="submit"
                    class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">Create
                    Song</button>
            </div>
        </form>
    </div>

    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Voeg songs toe via de API</h2>

        <form method="GET" action="{{ route('songs.create') }}" class="mb-4">
            <div class="flex space-x-2">
                <input type="text" name="title" placeholder="Search" class="px-4 py-2 border rounded-l focus:outline-none focus:border-blue-500">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-r focus:outline-none hover:bg-blue-600">Search</button>
            </div>
        </form>

        <ul>
            @foreach($songsFromAPI as $song)
                <form method="POST" action="{{ route('songs.store') }}" class="flex items-center mb-2">
                    @csrf
                    <input type="hidden" name="title" value="{{ $song['name'] }}">
                    <input type="hidden" name="singer" value="{{ $song['artist'] }}">
                    <li class="flex-grow">{{ $song['name'] }} - {{ $song['artist'] }}</li>
                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded focus:outline-none hover:bg-green-600">+</button>
                </form>
            @endforeach
        </ul>
    </div>

</body>

</html>
