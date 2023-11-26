<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testUserRelations()
    {
        $user = User::factory()->create();
        // dd($user);

        $this->assertInstanceOf(BelongsToMany::class, $user->followers());
        $this->assertInstanceOf(BelongsToMany::class, $user->followings());
        // 他のリレーションも同様にテスト可能
    }
}
