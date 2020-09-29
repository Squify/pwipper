<?php


namespace App\Http\Controllers;

use App\Pweep;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePweepRequest;
use App\Http\Requests\UpdatePweepRequest;

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
        $pweep = Pweep::findOrFail($id);
        $pweep
            ->where('id', $id)
            ->update(['is_deleted' => true]);
        return back();
    }

    /**
     * Add pweep
     */
    public function store(StorePweepRequest $request)
    {
        $params = $request->validated();

        /* wtf
        $pweep = Pweep::findOrFail($id);
        $test = Pweep::create($params)
            ->where('id', $id)
            ->update([
                'is_deleted' => false,
                'author_id' => 1,
                'updated_at' => null,
            ]);
        Pweep::create($test);
        */

        Pweep::create($params);
        return back();
    }

    /**
     * Update pweep
     */
    public function update(UpdatePweepRequest $request, $id)
    {
        $params = $request->validated();
        $pweep = Pweep::findOrFail($id);
        $pweep
            ->where('id', $id)
            ->update([
                'is_deleted' => false,
                'author_id' => 1,
                'updated_at' => null,
        ]);

        $params = $request->validated();
        $pweep->update($params);
        return back();
    }
}
