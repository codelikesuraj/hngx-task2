<?php

namespace App\Http\Controllers;

use App\Http\Resources\PersonCollection;
use App\Http\Resources\PersonResource;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PersonController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->input(), [
            'name' => 'required|string|min:2|max:64|unique:people,name'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first('name')
            ], 422);
        }

        $person = Person::create([
            'name' => strval(strtolower($request->name))
        ]);

        return response()->json([
            'data' => new PersonResource($person)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($user_id)
    {
        $person = Person::where('id', $user_id)->orWhere('name', $user_id)->first();
        if (!$person) {
            return $this->personNotFound();
        }

        return response()->json([
            'data' => new PersonResource($person),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user_id)
    {
        $person = Person::where('id', $user_id)->orWhere('name', $user_id)->first();
        if (!$person) {
            return $this->personNotFound();
        }

        $validator = Validator::make($request->input(), [
            'name' => ['required', 'string', 'min:2', 'max:64', Rule::unique('people', 'name')->ignore($person)]
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first('name')
            ], 422);
        }

        $person->update([
            'name' => strval(strtolower($request->name))
        ]);

        return response()->json([
            'data' => new PersonResource($person)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user_id)
    {
        $person = Person::where('id', $user_id)->orWhere('name', $user_id)->first();
        if (!$person) {
            return $this->personNotFound();
        }

        $person->delete();

        return response()->json(status: 204);
    }

    protected function personNotFound(): mixed
    {
        return response()->json([
            'error' => 'person not found'
        ], 404);
    }
}
