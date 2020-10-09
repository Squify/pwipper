<?php


namespace App\Http\Controllers;

use App\Http\Requests\StorePweepRequest;
use App\Http\Requests\UpdatePweepRequest;
use App\Pweep;
use App\User;
use Illuminate\Support\Facades\Auth;

class PweepController
{

    /**
     * View of home with all posts
     */
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        $pweeps = Pweep::orderBy('created_at', 'DESC')
            ->orderBy('updated_at', 'DESC')
            ->where(['is_deleted' => false])
            ->get()
            ->all();
        return view('homepage')->with([
            'pweeps' => $pweeps,
            'user' => $user
        ]);
    }

    /**
     * Delete pweep
     */
    public function remove($id)
    {
        Pweep::where('id', $id)
            ->update(['is_deleted' => true]);
        return back();
    }

    /**
     * Add pweep
     */
    public function store(StorePweepRequest $request)
    {
        $data = $request->input();
        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {
                if (!empty($image)) {
                    $name = $image->getClientOriginalName();
                    $image->move(public_path() . '/img/pweep/', $name);
                    $listImage[] = $name;
                }
            }
        }
        for ($i = 0; $i < 4; $i++) {
            if (empty($listImage[$i])) {
                $listImage[$i] = null;
            }
        }
        Pweep::insert([
            'image_path_1' => $listImage[0] ? 'pweep/' . $listImage[0] : null,
            'image_path_2' => $listImage[1] ? 'pweep/' . $listImage[1] : null,
            'image_path_3' => $listImage[2] ? 'pweep/' . $listImage[2] : null,
            'image_path_4' => $listImage[3] ? 'pweep/' . $listImage[3] : null,
            'message' => $data['message'],
            'is_deleted' => false,
            'author_id' => Auth::id(),
            'created_at' => now(),
            'updated_at' => null,
        ]);
        return back();
    }

    /**
     * Update pweep
     */
    public function update(UpdatePweepRequest $request, $id)
    {
        $data = $request->input();
        Pweep::where('id', $id)
            ->update([
                'message' => $data['message'],
                'updated_at' => now(),
            ]);
        return back();
    }

    /**
     * Repweep a pweep
     */
    public function repweep($pweepId)
    {
        $initialPweep = Pweep::where('id', $pweepId)->firstOrFail();

        Pweep::where('author_id', Auth::id())
            ->where('initial_pweep_id', $initialPweep->id)
            ->where('is_deleted', true)
            ->update(['is_deleted' => false, 'created_at' => $initialPweep->created_at , 'updated_at' => now()]);

        $exists = Pweep::where('author_id', Auth::id())
            ->where('initial_pweep_id', $initialPweep->id)
            ->where('is_deleted', false)
            ->exists();

        if (!$exists) {
            Pweep::insert([
                'image_path_1' => $initialPweep->image_path_1 ? $initialPweep->image_path_1 : null,
                'image_path_2' => $initialPweep->image_path_2 ? $initialPweep->image_path_2 : null,
                'image_path_3' => $initialPweep->image_path_3 ? $initialPweep->image_path_3 : null,
                'image_path_4' => $initialPweep->image_path_4 ? $initialPweep->image_path_4 : null,
                'message' => $initialPweep->message,
                'is_deleted' => false,
                'author_id' => Auth::id(),
                'created_at' => $initialPweep->created_at,
                'updated_at' => now(),
                'initial_author_id' => $initialPweep->author->id,
                'initial_pweep_id' => $initialPweep->id,
//                'users_like' => $initialPweep->users_like
            ]);
        }

        return back();
    }

    /**
     * Dis/Like a pweep
     */
    public function like($pweepId) {

        $user = User::findOrFail(Auth::id());
        $pweep = Pweep::where('id', $pweepId)->firstOrFail();

        if ($user->like->contains($pweep))
            $user->like()->detach($pweep);
        else
            $user->like()->attach($pweep);

        $user->save();
        return back();
    }
}
