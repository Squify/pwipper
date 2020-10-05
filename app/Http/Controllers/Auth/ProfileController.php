<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Pweep;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        $pweeps = Pweep::where('author_id', $user->id)
            ->orderBy('created_at', 'DESC')
            ->where(['is_deleted' => false])
            ->get()
            ->all();
        $medias = Pweep::whereNotNull('image_path_1')
            ->where('author_id', $user->id)
            ->orderBy('created_at', 'DESC')
            ->where(['is_deleted' => false])
            ->get()
            ->all();
        return view('auth/profile')->with([
            'user' => $user,
            'pweeps' => $pweeps,
            'medias' => $medias,
        ]);
    }
}
