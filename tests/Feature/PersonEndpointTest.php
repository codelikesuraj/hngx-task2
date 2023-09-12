<?php

namespace Tests\Feature;

use App\Models\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class PersonEndpointTest extends TestCase
{
    use RefreshDatabase;

    public function test_person_can_be_created(): void
    {
        $person = ['name' => 'john doe'];
        
        $response = $this->postJson('/api', $person);
        
        $response->assertStatus(201);
        $response->assertJson(function (AssertableJson $json) use ($person) {
            $json->hasAll('data.id', 'data.name');
            $json->where('data.name', $person['name']);
        });
        $this->assertDatabaseHas('people', $person);
    }

    public function test_person_can_be_retrieved_by_id(): void
    {
        $person = Person::factory()->create();

        $response = $this->getJson('/api/' . $person->id);

        $response->assertStatus(200);
        $response->assertJson(function (AssertableJson $json) {
            $json->hasAll('data.id', 'data.name');
        });
        $response->assertJsonFragment([
            'id' => $person->id,
            'name' => $person->name
        ]);
    }

    public function test_person_can_be_retrieved_by_name(): void
    {
        $person = Person::factory()->create();

        $response = $this->getJson('/api/' . $person->name);

        $response->assertStatus(200);
        $response->assertJson(function (AssertableJson $json) {
            $json->hasAll('data.id', 'data.name');
        });
        $response->assertJsonFragment([
            'id' => $person->id,
            'name' => $person->name
        ]);
    }

    public function test_person_can_be_updated_by_id(): void
    {
        $person = Person::factory()->create();
        $updated = ["name" => "updated name"];

        $response = $this->putJson('/api/' . $person->id, $updated);
        
        $response->assertStatus(200);
        $response->assertJson(function (AssertableJson $json) use ($updated) {
            $json->hasAll('data.id', 'data.name');
            $json->where('data.name', $updated['name']);
        });
        $this->assertDatabaseHas('people', $updated);
        $this->assertDatabaseMissing('people', ['name' => $person->name]);
    }

    public function test_person_can_be_updated_by_name(): void
    {
        $person = Person::factory()->create();
        $updated = ["name" => "updated name"];

        $response = $this->putJson('/api/' . $person->name, $updated);
        
        $response->assertStatus(200);
        $response->assertJson(function (AssertableJson $json) use ($updated) {
            $json->hasAll('data.id', 'data.name');
            $json->where('data.name', $updated['name']);
        });
        $this->assertDatabaseHas('people', $updated);
        $this->assertDatabaseMissing('people', ['name' => $person->name]);
    }

    public function test_person_can_be_deleted_by_id(): void
    {
        $person = Person::factory()->create();

        $response = $this->deleteJson('/api/' . $person->id);
        
        $response->assertStatus(204);
        $this->assertDatabaseMissing('people', ['name' => $person->name]);
    }

    public function test_person_can_be_deleted_by_name(): void
    {
        $person = Person::factory()->create();

        $response = $this->deleteJson('/api/' . $person->name);
        
        $response->assertStatus(204);
        $this->assertDatabaseMissing('people', ['name' => $person->name]);
    }
}
