<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserCompanyTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_have_multiple_companies()
    {
        $user = User::factory()->create();
        $companies = Company::factory()->count(3)->create(['user_id' => $user->id]);

        $this->assertCount(3, $user->companies);
        $this->assertInstanceOf(Company::class, $user->companies->first());
    }

    public function test_only_logged_in_user_companies_are_returned()
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();

        Company::factory()->count(2)->create(['user_id' => $user1->id]);
        Company::factory()->count(3)->create(['user_id' => $user2->id]);

        $this->actingAs($user1);

        $companies = $user1->companies;

        $this->assertCount(2, $companies);
        $this->assertTrue($companies->every(fn ($company) => $company->user_id === $user1->id));
    }
}