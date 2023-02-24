<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
</head>
    <body>
        <h1>Image uploaded successfully!</h1>
        {{-- <img src="{{ asset('images/'.$imageName) }}" alt="Uploaded Image"> --}}

        <form method="POST" action="{{ route('') }}" enctype="multipart/form-data"> {{-- When upload finish where do i want it to redirect to --}}
            @method('POST')
            @csrf
            <input type="file" name="image">
            <button type="submit">Upload</button>
        </form>
    </body>
</html>
