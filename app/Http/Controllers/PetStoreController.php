<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\PetApiLib\Model\Pet;
use App\PetApiLib\Model\Category;
use App\PetApiLib\Model\Tag;
use App\PetApiLib\PetStatusEnum;
use App\PetApiLib\Api\PetApi;

class PetStoreController extends Controller
{
    /**
     * Store a new pet.
     *
     * @param Request $request
     * @return Response
     */
    public function storePet(Request $request)
    {

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'category_name' => 'required',
            'name' => 'required|max:255',
            'file' => 'required|file|mimes:jpg,png,jpeg,gif',
            'tags' => 'nullable|array',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        // Retrieve the validated data
        $data = $validator->validated();
        

        // Create a new pet
        $pet = new Pet();
        // Categories can't be retreived from the api, so here is just a hardcoded one
        $category = new Category(['id' => $data['category_id'], 'name' => $data['category_name']]);
        // Likewise, tags can't be retreived, so here are some hardcoded ones
        $tags = array_map(function ($x){
            return new Tag(['id' => $x, 'name' => 'some name']);
        }, $data['tags']);
        // Retrieve the uploaded file
        $file = $request->file('file');
        $filename = uniqid() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('public', $filename);

        $pet->setId(1); // in case of a real api, id would be autogenerated
        $pet->setCategory($category);
        $pet->setName($data['name']);
        $pet->setPhotoUrls([asset('storage/' . $path)]); // can be expanded to handle multiple files easily
        $pet->setTags($tags);
        $pet->setStatus($data['status']);

        $pet_store_client = app(PetApi::class);

        $pet_store_client->addPet($pet);

        // Return a success response
        return response()->json([
            'message' => 'Pet created successfully',
            'pet' => $pet,
        ], Response::HTTP_CREATED);
    }
    
}
