<?php

it('returns a successful response', function (): void {
    $response = $this->get('/');

    $response->assertStatus(200);
});

it('tests that the .env key are same across all .env files.', function (): void {
    $this->artisan('env:keys-check --auto-add=none')->assertExitCode(0);
});
