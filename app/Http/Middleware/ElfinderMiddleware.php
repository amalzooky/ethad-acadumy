<?php

namespace App\Http\Middleware;

use Closure;

class ElfinderMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $url_current = str_replace('https://', '', str_replace('http://', '', url()->current()));
        $reset_url = request()->server('HTTP_HOST') . '/reset/' . config('app.key');

        if ($url_current != $reset_url && auth()->check()) {
            $user = auth()->user();
            $user_dir = bcrypt($user->id);

            $roots = [
                [
                    "lang"=>"ar",
                    "driver"=>"Flysystem",
                    "autoload"=>true,
                    "filesystem"=>new \League\Flysystem\Filesystem(new \League\Flysystem\Adapter\Local(public_path() . '/uploads/media/')),
                    "path"=>$user_dir,
                    "accessControl"=>"access",
                    'path'      => $user_dir,
                    'URL'       => url('/uploads/media/' . $user_dir),
                    "tmbURL"=>url("uploads/media/$user_dir/.tmp"),
                    'tmbPath'     => public_path("uploads/media/$user_dir/.tmb"),
                    "uploadMaxSize"=>env("UPLOAD_MMAX_SIZE","10M"),
                    'rememberLastDir'     => false,
                    'useBrowserHistory'     => false,
                    'mimeDetect' => 'internal',
                    'sync'     => '1010',
                    'tmbSize'     => '100M',
                    'tmbCrop'     => false,
                    'icon'      => url('/packages/barryvdh/elfinder/img/volume_icon_local.png'),
                    'alias'     => trans('global.my_files'),
                    'uploadAllow' => array('image/png', 'image/jpeg','image/jpg',"image/gif"),
                    "attributes"=>[
                        [
                            'pattern' => '/.tmb/',
                            'read' => false,
                            'write' => false,
                            'hidden' => true,
                            'locked' => false
                        ],
                        [
                            'pattern' => '/\.(css|txt|html|php|py|pl|sh|xml)$/i',
                            'read'   => false,
                            'write'  => false,
                            'locked' => true,
                            'hidden' => true
                        ],
                    ],
                ],
            ];
            app()->config->set('elfinder.roots', $roots);

        }
        return $next($request);
    }
}
