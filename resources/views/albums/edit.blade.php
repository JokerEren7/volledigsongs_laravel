<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit {{ $album->name }}</title>

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

        <h1 class="text-3xl font-semibold mb-4">Edit {{ $album->name }}</h1>

        <form method="POST" action="{{ route('albums.update', ['album' => $album->id]) }}" class="mb-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                <input type="text" name="name" value="{{ $album->name }}" required
                    class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="year" class="block text-sm font-medium text-gray-700">Year:</label>
                <input type="number" name="year" value="{{ $album->year }}"
                    class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="times_sold" class="block text-sm font-medium text-gray-700">Times Sold:</label>
                <input type="number" name="times_sold" value="{{ $album->times_sold }}"
                    class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>
</form>

            <h2>Songs</h2>
                @foreach ($songs as $song)
                    <div class="mb-4">
                        <label>{{ $song->title }}</label>

                        @if ($album->songs->contains($song))
                            <form action="{{ route('albums.detach-song', ['album' => $album->id, 'song' => $song->id]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 text-white p-2 rounded-full" type="submit">Remove</button>
                            </form>
                        @else
                            <form action="{{ route('albums.attach-song', ['album' => $album->id, 'song' => $song->id]) }}"
                                method="POST">
                                @csrf
                                <button class="bg-green-500 text-white p-2 rounded-full" type="submit">Add</button>
                            </form>
                        @endif
                    </div>
                @endforeach

        <a href="{{ route('albums.show', ['album' => $album->id]) }}" class="text-blue-500">Cancel</a>

    </div>

</body>

</html>
