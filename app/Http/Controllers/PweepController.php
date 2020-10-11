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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = User::where('id', Auth::id())->first();
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
        $pweep = Pweep::where('id', $id)->firstOrFail();
        if ($pweep->initial_pweep_id)
            $initialPweep = Pweep::where('id', $pweep->initial_pweep_id)->first();
        else $initialPweep = null;

        $pweep->is_deleted = true;
        $pweep->repweep_counter -= 1;
        $pweep->timestamps = false;
        $pweep->save();

        if ($initialPweep) {
            $initialPweep->repweep_counter = $pweep->repweep_counter;
            $initialPweep->timestamps = false;
            $initialPweep->save();
        }

        $repweeps = Pweep::where(['initial_pweep_id' => $initialPweep ? $initialPweep->id : $pweep->id])->get()->all();
        foreach ($repweeps as $repweep) {
            $repweep->repweep_counter = $pweep->repweep_counter;
            $repweep->timestamps = false;
            $repweep->save();
        }
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
        $sendPweepToRepweep = Pweep::where('id', $pweepId)->firstOrFail();
        if ($sendPweepToRepweep->initial_pweep_id)
            $initialPweep = Pweep::where('id', $sendPweepToRepweep->initial_pweep_id)->first();
        else $initialPweep = null;

        $exists = Pweep::where('author_id', Auth::id())
            ->where('initial_pweep_id', $initialPweep ? $initialPweep->id : $sendPweepToRepweep->id)
            ->exists();

        if ($exists) {
            $deletedPweep = Pweep::where('author_id', Auth::id())
                ->where('initial_pweep_id', $initialPweep ? $initialPweep->id : $sendPweepToRepweep->id)
                ->where('is_deleted', true)
                ->first();
            if ($deletedPweep) {
                $sendPweepToRepweep->repweep_counter += 1;
                $sendPweepToRepweep->timestamps = false;
                $sendPweepToRepweep->save();
                if ($initialPweep) {
                    $initialPweep->repweep_counter += 1;
                    $initialPweep->timestamps = false;
                    $initialPweep->save();
                }

                $deletedPweep->is_deleted = false;
                $deletedPweep->created_at = $sendPweepToRepweep->created_at;
                $deletedPweep->updated_at = now();
                $deletedPweep->users_like()->detach();
                foreach ($sendPweepToRepweep->users_like as $like) {
                    $deletedPweep->users_like()->attach($like);
                }
                $deletedPweep->repweep_counter = $sendPweepToRepweep->repweep_counter;
                $deletedPweep->timestamps = false;
                $deletedPweep->save();
            }
        } else {
            $sendPweepToRepweep->repweep_counter += 1;
            $sendPweepToRepweep->timestamps = false;
            $sendPweepToRepweep->save();
            if ($initialPweep) {
                $initialPweep->repweep_counter += 1;
                $initialPweep->timestamps = false;
                $initialPweep->save();
            }

            Pweep::insert([
                'image_path_1' => $sendPweepToRepweep->image_path_1 ? $sendPweepToRepweep->image_path_1 : null,
                'image_path_2' => $sendPweepToRepweep->image_path_2 ? $sendPweepToRepweep->image_path_2 : null,
                'image_path_3' => $sendPweepToRepweep->image_path_3 ? $sendPweepToRepweep->image_path_3 : null,
                'image_path_4' => $sendPweepToRepweep->image_path_4 ? $sendPweepToRepweep->image_path_4 : null,
                'message' => $sendPweepToRepweep->message,
                'is_deleted' => false,
                'author_id' => Auth::id(),
                'created_at' => $sendPweepToRepweep->created_at,
                'updated_at' => now(),
                'initial_author_id' => $sendPweepToRepweep->initial_author_id ? $sendPweepToRepweep->initial_author_id : $sendPweepToRepweep->author->id,
                'initial_pweep_id' => $sendPweepToRepweep->initial_pweep_id ? $sendPweepToRepweep->initial_pweep_id : $sendPweepToRepweep->id,
                'repweep_counter' => $sendPweepToRepweep->repweep_counter,
            ]);
            $pweep = Pweep::where('author_id', Auth::id())->latest('updated_at')->first();
            foreach ($sendPweepToRepweep->users_like as $like) {
                $pweep->users_like()->attach($like);
            }
            $pweep->timestamps = false;
            $pweep->save();
        }

        return back();
    }

    /**
     * Dis/Like a pweep
     */
    public function like($pweepId)
    {
        $user = User::findOrFail(Auth::id());
        $pweep = Pweep::where('id', $pweepId)->firstOrFail();
        if ($pweep->initial_pweep_id)
            $initialPweep = Pweep::where('id', $pweep->initial_pweep_id)->first();
        else $initialPweep = null;

        $repweeps = Pweep::where(['initial_pweep_id' => $initialPweep ? $initialPweep->id : $pweep->id])
            ->get()
            ->all();

        if ($user->like->contains($pweep)) {
            $user->like()->detach($pweep);
            $pweep->like_counter -= 1;
            $pweep->timestamps = false;
            $pweep->save();
            foreach ($repweeps as $repweep) {
                $repweep->like_counter -= 1;
                $repweep->timestamps = false;
                $repweep->save();
            }
        } else {
            $user->like()->attach($pweep);
            $pweep->like_counter += 1;
            $pweep->timestamps = false;
            $pweep->save();
            foreach ($repweeps as $repweep) {
                $repweep->like_counter += 1;
                $repweep->timestamps = false;
                $repweep->save();
            }
        }

        $user->save();
        return back();
    }
}
