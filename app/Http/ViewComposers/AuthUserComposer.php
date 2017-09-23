<?php

namespace App\Http\ViewComposers;

use Auth;
use Illuminate\View\View;

class AuthUserComposer
{
    /**
     * 将数据绑定到视图。
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('auth', (object)[
            'check' => Auth::check(),
            'user' => Auth::user(),
        ]);
    }
}
