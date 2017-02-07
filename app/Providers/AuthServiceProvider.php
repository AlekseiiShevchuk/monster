<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Monster parts
        Gate::define('monster_part_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Hair
        Gate::define('hair_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('hair_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('hair_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('hair_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('hair_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Mask
        Gate::define('mask_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('mask_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('mask_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('mask_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('mask_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Body
        Gate::define('body_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('body_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('body_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('body_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('body_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Suit
        Gate::define('suit_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('suit_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('suit_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('suit_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('suit_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Tests
        Gate::define('test_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('test_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('test_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('test_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('test_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Results
        Gate::define('result_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('result_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('result_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('result_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('result_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

    }
}
