<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Route;

class RouteTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
   
    public function test_login()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function test_register()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    public function test_dashboard()
    {
        $response = $this->get('/dashboard');
        $response->assertStatus(302);
    }
    
}
