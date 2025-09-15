<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
// その他
use Illuminate\Support\Facades\Auth;

class SystemAdminOrAdminCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 権限が「system_admin」or「admin」以外の場合はトップページへ遷移
        if(!in_array($user->role_id, ['system_admin', 'admin'])){
            return redirect()->route('dashboard.index')->with([
                'alert_type' => 'error',
                'alert_message' => 'アクセスできません。',
            ]);
        }
        return $next($request);
    }
}
