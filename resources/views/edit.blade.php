<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Song</title>
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

        <h1 class="text-3xl font-semibold mb-4">Edit {{ $song->title }}</h1>

        <form method="POST" action="{{ route('songs.update', ['song' => $song->id]) }}" class="mb-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title:</label>
                <input type="text" name="title" value="{{ $song->title }}" required
                    class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>
1
            <div class="mb-4">
                <label for="singer" class="block text-sm font-medium text-gray-700">Singer:</label>
                <input type="text" name="singer" value="{{ $song->singer }}"
                    class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>
            <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Update Song</button>
        </form>
            @foreach ($albums as $album)
                <div class="mb-4">
                    <label>{{ $album->name }}</label>
                    @if ($song->albums->contains($album))
                        <form action="{{ route('songs.detach-album', ['song' => $song->id, 'album' => $album->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white p-2 rounded-full" type="submit">Remove</button>
                        </form>
                    @else
                        <form action="{{ route('songs.attach-album', ['song' => $song->id, 'album' => $album->id]) }}" method="POST">
                            @csrf
                            <button class="bg-green-500 text-white p-2 rounded-full" type="submit">Add</button>
                        </form>
                    @endif
                </div>
            @endforeach


        <a href="{{ route('songs.show', ['song' => $song->id]) }}" class="text-blue-500">Cancel</a>

    </div>

</body>

</html>
