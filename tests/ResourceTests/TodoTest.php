<?php

use Shibomb\FilamentTodo\Models\Todo;
use Shibomb\FilamentTodo\Resources\TodoResource;

it('can render todo list table', function () {
    $this->get(TodoResource::getUrl('index'))->assertSuccessful();
});

it('can render todo create form', function () {
    $this->get(TodoResource::getUrl('create'))->assertSuccessful();
});

// it('can render todo edit form', function () {
//     $this->get(TodoResource::getUrl('edit', [
//         'record' => Todo::factory()->create(),
//     ]))->assertSuccessful();
// });
