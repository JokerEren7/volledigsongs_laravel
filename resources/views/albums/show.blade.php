<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $album->name }}</title>

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

        <h1 class="text-3xl font-semibold mb-4">{{ $album->name }}</h1>

        <p class="mb-2"><strong class="font-semibold">Year:</strong> {{ $album->year ? $album->year : 'N/A' }}</p>
        <p class="mb-4"><strong class="font-semibold">Times Sold:</strong> {{ $album->times_sold ? $album->times_sold : 'N/A' }}</p>
        <p class="mb-4"><strong class="font-semibold">Band:</strong> {{ $album->band ? $album->band->name : 'N/A' }}</p>


        <h2 class="text-2xl font-semibold mb-2">Songs on this Album:</h2>
                <h2>Songs:</h2>
                <ul>
    @forelse ($songs as $song)
        <li>
            <strong>Title:</strong> {{ $song->title }}, 
            <strong>Singer:</strong> {{ $song->singer }}
        </li>
    @empty
        <p>No songs found for this album.</p>
    @endforelse
</ul>

        <a href="{{ route('albums.index') }}" class="text-blue-500">Back to Albums</a>

    </div>

</body>
</html>
