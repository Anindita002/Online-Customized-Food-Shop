<?php
namespace Tests\Unit;
use Tests\TestCase;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\RefreshDatabase;
class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testUsersDatabaseColumns()
    {
        $this->assertTrue( 
          Schema::hasColumns('users', [
            'id', 'name', 'email','usertype', 'email_verified_at', 'password','two_factor_secret','two_factor_recovery_codes','two_factor_confirmed_at', 'remember_token','current_team_id','profile_photo_path', 'created_at', 'updated_at'
        ]), 1);
    }

    public function test_user_login_with_email_and_password()
     {
         $user = User::factory()->create(); 
         $this->post('login',[
            'email' => $user->email,
            'password' => 'password'
         ]);
         $this ->assertAuthenticated();
     }

    public function testUserCreation()
    { 
    $user = new User([
        'name' => "Test User",
        'email' => "test@mail.com",
        'password' => bcrypt("testpassword")
    ]);   

    $this->assertEquals('Test User', $user->name);
    }
}

