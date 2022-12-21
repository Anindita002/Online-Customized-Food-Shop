<?php

namespace Tests\Unit;
use Tests\TestCase;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Order;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\RefreshDatabase;
class AdminControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function testFoodDatabaseColumns()
    {
        $this->assertTrue( 
          Schema::hasColumns('food', [
            'id', 'title', 'price','image', 'created_at', 'updated_at'
        ]), 1);
    }

    public function test_admin_login_with_email_and_password()
    {
        $user = User::factory()->create(); 
         $this->post('login',[
            'email' => $user->email,
            'password' => 'password'
         ]);
         $this ->assertAuthenticated();
    }
    
    public function testAdminCreation()
    { 
    $user = new User([
        'name' => "Test Admin",
        'email' => "admin@mail.com",
        'password' => bcrypt("testpassword")
    ]);   

    $this->assertEquals('Test Admin', $user->name);
    }
}
