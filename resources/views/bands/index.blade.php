<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bands</title>

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

        <h1 class="text-3xl font-semibold mb-4">Bands</h1>

        <ul class="list-disc pl-8">
            @foreach ($bands as $band)
                <li class="mb-4">
                    <strong class="text-xl">{{ $band->name }}</strong> - {{ $band->genre }} (Founded: {{ $band->founded }})
                    <a href="{{ route('bands.show', ['band' => $band->id]) }}" class="text-blue-500 ml-2">Details</a>
                    <a href="{{ route('bands.edit', ['band' => $band->id]) }}" class="text-green-500 ml-2">Edit</a>

                    @auth
                    <form method="POST" action="{{ route('bands.destroy', ['band' => $band->id]) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 ml-2">Delete</button>
                    </form>
                    @endauth
                </li>
            @endforeach
        </ul>
@auth
        <a href="{{ route('bands.create') }}" class="text-blue-500 mt-4 block">Add New Band</a>
@endauth
    </div>

</body>
</html>
