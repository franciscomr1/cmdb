<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Hash;
use Laravel\Jetstream\Jetstream;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);

        Fortify::authenticateUsing(function (Request $request) {
            if(Fortify::username() === 'email'){
                $user = User::where('email', $request->email)->first();
            } else {
                $user = User::join('employees','users.employee_id','=','employees.id')
                ->where('users.username',$request->username)
                ->where('users.is_active',true)
                ->where('employees.is_active',true)->first();
            }
            if ($user &&
            Hash::check($request->password, $user->password)) {
            return $user;
        }

        });
    }

    /**
     * Configure the permissions that are available within the application.
     */
    protected function configurePermissions(): void
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
