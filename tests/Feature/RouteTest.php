<?php

namespace Tests\Feature;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RouteTest extends TestCase
{
    use RefreshDatabase;

    static private $register = [
        'name' => 'MyName',
        'username' => 'myname',
        'email' => 'myname@mail.com',
        'password' => 'admin',
    ];

    public function test_register_a_user_and_redirect_to_home()
    {
        $response = $this->post('/register', self::$register);

        $response->assertRedirect('/home');
    }

    public function test_login_with_username()
    {
        User::create(self::$register);

        $response = $this->post('/login', [
            'username' => 'myname',
            'password' => 'admin'
        ]);

        $response->assertRedirect('/home');
    }

    public function test_login_with_email()
    {
        User::create(self::$register);

        $response = $this->post('/login', [
            'username' => 'myname@mail.com',
            'password' => 'admin'
        ]);

        $response->assertRedirect('/home');
    }

    public function test_home_only_for_logged_users()
    {
        $response = $this->get('/home');

        $response->assertRedirect('/login');
    }

    public function test_logout_redirect()
    {
        User::create(self::$register);

        $this->post('/login', [
            'username' => 'myname',
            'password' => 'admin'
        ]);

        $response = $this->post('/logout');

        $response->assertRedirect('/');
    }

    public function test_create_a_tweet()
    {
        User::create(self::$register);

        $this->post('/login', [
            'username' => 'myname',
            'password' => 'admin'
        ]);
        
        $tweet = [
            'message' => 'This is a tweet',
            'user_id' => 1
        ];

        $this->post('/home', $tweet);

        $this->assertCount(1, Tweet::all());
    }

    public function test_create_an_invalid_tweet()
    {
        User::create(self::$register);

        $this->post('/login', [
            'username' => 'myname',
            'password' => 'admin'
        ]);
        
        $tweet = [
            'message' => Str::random(251),
            'user_id' => 1
        ];

        $this->post('/home', $tweet);

        $this->assertCount(0, Tweet::all());
    }
}
