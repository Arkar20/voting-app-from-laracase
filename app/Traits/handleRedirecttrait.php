<?php
namespace App\Traits;
trait handleRedirecttrait
{
    public function redirectToLogin()
    {
        if (auth()->guest()) {
            redirect()->intended(url()->previous());

            return redirect('login');
        }
    }
}
