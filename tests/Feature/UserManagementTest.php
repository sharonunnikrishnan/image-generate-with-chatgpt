<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can view users page', function () {

    $admin = User::factory()->create([
        'role' => 'admin',
    ]);

    $this->actingAs($admin);

    $this->get(route('users.index'))
        ->assertStatus(200);
});

it('can create a user', function () {

    $admin = User::factory()->create([
        'role' => 'admin',
    ]);

    $this->actingAs($admin);

    $response = $this->post(route('users.store'), [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => 'password',
        'gender' => 'male',
    ]);

    $this->assertDatabaseHas('users', [
        'email' => 'john@example.com',
    ]);
});

it('validates required fields while creating user', function () {

    $admin = User::factory()->create([
        'role' => 'admin',
    ]);

    $this->actingAs($admin);

    $this->post(route('users.store'), [])
        ->assertSessionHasErrors([
            'name',
            'email',
            'password',
            'gender',
        ]);
});

it('can update a user', function () {

    $admin = User::factory()->create([
        'role' => 'admin',
    ]);

    $user = User::factory()->create();

    $this->actingAs($admin);

    $response = $this->put(route('users.update', $user), [
        'name' => 'Updated User',
        'email' => $user->email,
        'gender' => 'male',
    ]);

    $this->assertDatabaseHas('users', [
        'id' => $user->id,
        'name' => 'Updated User',
    ]);
});

it('can update a user via ajax', function () {

    $admin = User::factory()->create([
        'role' => 'admin',
    ]);

    $user = User::factory()->create();

    $this->actingAs($admin);

    $response = $this->post(route('users.update', $user), [
        '_method' => 'PUT',
        'name' => 'Updated User via AJAX',
        'email' => $user->email,
        'gender' => 'male',
    ], [
        'Accept' => 'application/json',
    ]);

    $response->assertStatus(200)
        ->assertJson([
            'status' => true,
            'message' => 'User updated successfully.',
        ]);

    $this->assertDatabaseHas('users', [
        'id' => $user->id,
        'name' => 'Updated User via AJAX',
    ]);
});

it('returns validation errors as json when updating user via ajax', function () {

    $admin = User::factory()->create([
        'role' => 'admin',
    ]);

    $user = User::factory()->create();

    $this->actingAs($admin);

    $response = $this->post(route('users.update', $user), [
        '_method' => 'PUT',
        'name' => '',
        'email' => $user->email,
        'gender' => 'male',
    ], [
        'Accept' => 'application/json',
    ]);

    $response->assertStatus(422)
        ->assertJsonStructure([
            'message',
            'errors' => [
                'name',
            ],
        ]);
});

it('can delete a user', function () {

    $admin = User::factory()->create([
        'role' => 'admin',
    ]);

    $user = User::factory()->create();

    $this->actingAs($admin);

    $this->delete(route('users.destroy', $user));

    $this->assertDatabaseMissing('users', [
        'id' => $user->id,
    ]);
});
