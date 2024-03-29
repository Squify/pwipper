<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Mail\DeleteMail;
use App\Pweep;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class UpdateProfileController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($pseudo)
    {
        $user = User::where('pseudo', $pseudo)->firstOrFail();
        return view('auth/update-profile')->with('user', $user);
    }

    /**
     * Update current user from database
     * @param UpdateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(UpdateUserRequest $request, $pseudo)
    {
        $params = $request->validated();
        $user = User::where('pseudo', $pseudo)->firstOrFail();

        if (isset($params['image_path'])) {
            if (($params['image_path'] !== null) && ($params['image_path'] !== $user->image_path)) {
                Storage::delete('public/' . $user->image_path);
                Storage::put('public/users/profile_pics', $params['image_path']);
                $params['image_path'] = 'users/profile_pics/' . $params['image_path']->hashName();
            }
        } else {
            $params['image_path'] = $user->image_path;
        }

        if (isset($params['banner_path'])) {
            if (($params['banner_path'] !== null) && ($params['banner_path'] !== $user->banner_path)) {
                Storage::delete('public/' . $user->banner_path);
                Storage::put('public/users/banners/', $params['banner_path']);
                $params['banner_path'] = 'users/banners/' . $params['banner_path']->hashName();
            }
        } else {
            $params['banner_path'] = $user->banner_path;
        }

        $user->update($params);
        return redirect()->route('homepage');
    }

    /**
     * Delete user from database and set his pweeps as deleted
     */
    public function remove($pseudo)
    {
        $user = User::where('pseudo', $pseudo)->firstOrFail();
        $pweeps = Pweep::where('author_id', $user->id)->get();
        foreach ($pweeps as $pweep) {
            $pweep->is_deleted = true;
            $pweep->update();
        }

        if ($user->image_path)
            Storage::delete('public/' . $user->image_path);
        if ($user->banner_path)
            Storage::delete('public/' . $user->banner_path);

        Mail::to($user->email)->send(new DeleteMail($user));

        $user->delete();
        return redirect()->route('homepage');
    }
}
