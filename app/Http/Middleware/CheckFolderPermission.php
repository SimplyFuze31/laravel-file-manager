<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckFolderPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       // Отримання ID папки з URL або іншими засобами
       $folderId = $request->route('folderId');

       // Отримання авторизованого користувача
       $user = Auth::user();

       // Перевірка дозволу користувача на доступ до папки
       if (! $user->hasPermissionTo('Acsess to teacher folder', $folderId)) {
           abort(403, 'Access denied');
       }

       return $next($request);
    }
}
