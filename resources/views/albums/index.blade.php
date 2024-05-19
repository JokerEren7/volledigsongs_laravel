<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albums</title>

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

        <h1 class="text-3xl font-semibold mb-4">Albums</h1>

        <ul>
            @foreach ($albums as $album)
                <li class="mb-4 border-t pt-4">
                    <strong class="text-xl">{{ $album->name }}</strong> - {{ $album->year ? $album->year : 'N/A' }}
                    <a href="{{ route('albums.show', ['album' => $album->id]) }}" class="text-blue-500 ml-2">Details</a>
                    <a href="{{ route('albums.edit', ['album' => $album->id]) }}" class="text-green-500 ml-2">Edit</a>

                    @auth
                    <form method="POST" action="{{ route('albums.destroy', ['album' => $album->id]) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 ml-2">Delete</button>
                    </form>
                    @endauth
                </li>
            @endforeach
        </ul>
        @auth
        <a href="{{ route('albums.create') }}" class="text-blue-500 mt-4 block">Add New Album</a>
@endauth
    </div>

</body>
</html>
