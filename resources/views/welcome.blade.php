<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body>
        <form action="{{ route('api.pets.store') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="1">
            
            <label for="category_name">Category:</label>
            <input type="text" id="category_name" name="category_name" required>
            <input type="hidden" name="category_id" value="1">

            
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>


            
            <label for="file">Upload Image:</label>
            <input type="file" id="file" name="file" accept="image/*" required>


            
            <label for="tags">Tags:</label>
            <select multiple id="tags" name="tags[]">
                <option value="1">Tag 1</option>
                <option value="2">Tag 2</option>
                <option value="3">Tag 3</option>
                <!-- Add more options as needed -->
            </select>


            
            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="available">Available</option>
                <option value="pending">Pending</option>
                <option value="sold">Sold</option>
                <!-- Add more options as needed -->
            </select>


            
            <button type="submit">Submit</button>
        </form>
    </body>
</html>
