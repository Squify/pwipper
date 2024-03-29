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
    public function index($pseudo)
    {
        $user = User::where('pseudo', $pseudo)->firstOrFail();
        $currentUser = User::findOrFail(Auth::id());
        $pweeps = Pweep::where('author_id', $user->id)
            ->orderBy('updated_at', 'DESC')
            ->where('is_deleted', false)
            ->get()
            ->all();

        return view('auth/profile/pweeps')->with([
            'user' => $user,
            'currentUser' => $currentUser,
            'pweeps' => $pweeps,
        ]);
    }

    public function media($pseudo)
    {
        $user = User::where('pseudo', $pseudo)->firstOrFail();
        $currentUser = User::findOrFail(Auth::id());
        $medias = Pweep::whereNotNull('image_path_1')
            ->orderBy('updated_at', 'DESC')
            ->where([
                'is_deleted' => false,
                'author_id' => $user->id,
                'initial_pweep_id' => null
            ])
            ->get()
            ->all();

        return view('auth/profile/media')->with([
            'user' => $user,
            'currentUser' => $currentUser,
            'medias' => $medias,
        ]);
    }

    public function likes($pseudo)
    {
        $user = User::where('pseudo', $pseudo)->firstOrFail();
        $currentUser = User::findOrFail(Auth::id());
        $likes = $user->like()
            ->orderByDesc('likes.updated_at')
            ->where('is_deleted', false)
            ->get();

        return view('auth/profile/likes')->with([
            'user' => $user,
            'currentUser' => $currentUser,
            'likes' => $likes,
        ]);
    }
}
