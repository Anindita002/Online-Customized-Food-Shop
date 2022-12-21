<?php

namespace Tests\Unit;
use Tests\TestCase;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Cart;
use App\Models\Order;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeControllerTest extends TestCase
{
       use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
     public function testCartsDatabaseColumns()
     {
        $this->assertTrue( 
           Schema::hasColumns('carts', [
            'id', 'user_id', 'food_id','quantity', 'created_at', 'updated_at'
        ]), 1);
     }
    
}