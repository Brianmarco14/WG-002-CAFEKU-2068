<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Login extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_beranda()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_register()
    {
        $response = $this->post('/register',[
            'name'=>'test',
            'email'=>'test@123',
            'password'=>'test1234',
            'password_confirmation'=>'test1234',
            'role'=>'ADMIN',
        ]);

        $response->assertRedirect('/home');

    }

    public function test_login()
    {
        $response = $this->post('/login',[
            'email'=>'test@123',
            'password'=>'test1234',
        ]);

        $response->assertRedirect('/home');

    }
}
