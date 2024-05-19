<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Song Details</title>
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

    <div class="container mx-auto mt-8 max-w-md">
        <h1 class="text-3xl font-semibold mb-4">Song Details</h1>
        <p class="mb-2"><strong class="font-semibold">Title:</strong> {{ $song->title }}</p>
        <p><strong class="font-semibold">Zanger:</strong> {{ $song->singer }}</p>
       
     
            <h2><strong class="font-semibold"><h2>Albums:</h2></strong>
            @forelse ($song->albums as $album)
                <p>{{ $album->name }}</p>
            @empty
                <p>No associated albums.</p>
            @endforelse
     
    </div>

</body>

</html>
