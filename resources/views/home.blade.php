<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.1/css/bulma.min.css">
    </head>
    <body>
        <section class="container grid">

        <form class="box cell" action="{{ route('api.pets.store') }}" method="post" enctype="multipart/form-data">
            <h1 class="title">Create Pet</h1>
            <input type="hidden" name="id" value="1">
            @csrf
            <div class="field">
                <label class="label" for="category_name">Category:</label>
                <div class="controll">
                    <input class="input" type="text" id="category_name" name="category_name" required>
                    <input type="hidden" name="category_id" value="1">
                </div>
            </div>

            <div class="field">
                <label class="label" for="name">Name:</label>
                <div class="controll">
                    <input class="input" type="text" id="name" name="name" required>
                </div>
            </div>


            <div class="field">
                <label class="label" for="file">Upload Image:</label>
                <div class="controll">
                    <input class="input" type="file" id="file" name="file" accept="image/*" required>
                </div>
            </div>

            <div class="field">
            <label class="label" for="tags">Tags (comma separated):</label>
                <div class="control">
                    <input class="input" type="text" id="tags" name="tags" required>
                </div>
            </div>

            <div class="field">
            <label class="label" for="status">Status:</label>
                <div class="control">
                    <div class="select">
                    <select id="status" name="status">
                        <option value="available">Available</option>
                        <option value="pending">Pending</option>
                        <option value="sold">Sold</option>
                    </select>
                    </div>
                </div>
            </div>

            
            <button class="button" type="submit">Submit</button>
        </form>
        <form class="box cell" action="{{ route('api.pets.delete') }}" method="post">
            <h1 class="title">Delete Pet</h1>
            <input type="hidden" name="id" value="1">
            @csrf
            <div class="field">
                <label class="label" for="pet_id">Pet id:</label>
                <div class="controll">
                    <input class="input" type="number" id="pet_id" name="pet_id" required>
                </div>
            </div>
            <button class="button" type="submit">Submit</button>
        </form>
        <form class="box cell" action="{{ route('api.pets.update') }}" method="post" enctype="multipart/form-data">
            <h1 class="title">Edit Pet</h1>
            @csrf
            <div class="field">
                <label class="label" for="pet_id">ID:</label>
                <div class="controll">
                    <input class="input" type="text" id="pet_id" name="pet_id" required>
                </div>
            </div>
            <div class="field">
                <label class="label" for="category_name">Category:</label>
                <div class="controll">
                    <input class="input" type="text" id="category_name" name="category_name" required>
                    <input type="hidden" name="category_id" value="1">
                </div>
            </div>

            <div class="field">
                <label class="label" for="name">Name:</label>
                <div class="controll">
                    <input class="input" type="text" id="name" name="name" required>
                </div>
            </div>


            <div class="field">
                <label class="label" for="file">Upload Image:</label>
                <div class="controll">
                    <input class="input" type="file" id="file" name="file" accept="image/*" required>
                </div>
            </div>

            <div class="field">
            <label class="label" for="tags">Tags (comma separated):</label>
                <div class="control">
                    <input class="input" type="text" id="tags" name="tags" required>
                </div>
            </div>

            <div class="field">
            <label class="label" for="status">Status:</label>
                <div class="control">
                    <div class="select">
                    <select id="status" name="status">
                        <option value="available">Available</option>
                        <option value="pending">Pending</option>
                        <option value="sold">Sold</option>
                    </select>
                    </div>
                </div>
            </div>

            
            <button class="button" type="submit">Submit</button>
        </form>

        </section>
        <section class="container">
            <div class="box cell">
            <form action="{{ route('api.pets.query') }}" method="post">
            <h1 class="title">Browse Pets</h1>
            @csrf
            <div class="field">
            <label class="label" for="status">Status:</label>
                <div class="control">
                    <div class="select">
                    <select id="status" name="status">
                        <option value="available">Available</option>
                        <option value="pending">Pending</option>
                        <option value="sold">Sold</option>
                    </select>
                    </div>
                </div>
            </div>
    
            <button class="button" type="submit">Search</button>
        </form>
        <p>Displaying {{ sizeof($pets) }} pets</p>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($pets as $pet)
            <tr>
                <th>{{ $pet->getId() }}</th>
                <th>{{ $pet->getName() }}</th>
                <th>
                @if(null !== $pet->getCategory())
                    {{ $pet->getCategory()->getName() }}
                @endif
                </th>
            </tr>
            @endforeach
            </tbody>
        </table>
            </div>

        </section>
    </body>
</html>
