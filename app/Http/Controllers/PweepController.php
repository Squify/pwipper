<?php


namespace App\Http\Controllers;

use App\Http\Requests\StorePweepRequest;
use App\Http\Requests\UpdatePweepRequest;
use App\Pweep;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PweepController
{

    /**
     * View of home with all posts
     * @return \Illuminate\Contracts\View\Factory\Illuminate\View\View
     */
    public function index()
    {
        $pweeps = Pweep::orderBy('created_at', 'DESC')
            ->where(['is_deleted' => false])
            ->get()
            ->all();
        return view('homepage')->with('pweeps', $pweeps);
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
}
