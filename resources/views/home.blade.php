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
            <label class="label" for="tags">Tags:</label>
                <div class="control">
                    <div class="select">
                        <select multiple id="tags" name="tags[]">
                            <option value="1">Tag 1</option>
                            <option value="2">Tag 2</option>
                            <option value="3">Tag 3</option>
                        </select>
                    </div>
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
        <form class="box cell" action="{{ route('api.pets.delete', [ 'id' => 1 ]) }}" method="get">
            <h1 class="title">Delete Pet</h1>
            <input type="hidden" name="id" value="1">

            <div class="field">
                <label class="label" for="pet_id">Pet id:</label>
                <div class="controll">
                    <input class="input" type="number" id="pet_id" name="pet_id" required>
                </div>
            </div>
            <button class="button" type="submit">Submit</button>
        </form>
        <form class="box cell" action="{{ route('api.pets.update', [ 'id' => 1 ]) }}" method="post" enctype="multipart/form-data">
            <h1 class="title">Edit Pet</h1>
            <input type="hidden" name="id" value="1">

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
            <label class="label" for="tags">Tags:</label>
                <div class="control">
                    <div class="select">
                        <select multiple id="tags" name="tags[]">
                            <option value="1">Tag 1</option>
                            <option value="2">Tag 2</option>
                            <option value="3">Tag 3</option>
                        </select>
                    </div>
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
        <form class="box cell" action="{{ route('api.pets.query', [ 'status' => 'available' ]) }}" method="post">
            <h1 class="title">Browse Pets</h1>

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
        </section>
    </body>
</html>
