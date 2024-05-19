<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Songs</title>
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

    <ul class="mt-8 max-w-md mx-auto">
        @forelse ($songs as $song)
            <li class="bg-white mb-4 p-4 rounded-md shadow-md">
                <a href="{{ route('songs.show', ['song' => $song->id]) }}"
                    class="text-blue-500 font-bold">{{ $song->title }} {{ $song->singer }}</a>
                
                    @auth
    <a href="{{ route('songs.edit', $song->id) }}"
        class="bg-yellow-500 text-white p-2 rounded-md hover:bg-yellow-600 focus:outline-none focus:shadow-outline-yellow active:bg-yellow-800">Edit</a>
    <form method="POST" action="{{ route('songs.destroy', $song->id) }}" class="inline-block">
        @csrf
        @method('DELETE')
        <button type="submit"
            class="bg-red-500 text-white p-2 rounded-md hover:bg-red-600 focus:outline-none focus:shadow-outline-red active:bg-red-800">Verwijder</button>
    </form>
@endauth

            </li>
        @empty
            <p>No songs found.</p>
        @endforelse
        @auth
        <button class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
            <a href="{{ route('songs.create') }}">Nieuwe Song Toevoegen</a>
        </button>
        @endauth
    </ul>

</body>

</html>
