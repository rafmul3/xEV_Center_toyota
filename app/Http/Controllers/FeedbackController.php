<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\feedback;
use App\Models\pengunjung;
use App\Models\group_member;
use Illuminate\Support\Facades\Crypt;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cryptID)
    {

        $id = Crypt::decryptString($cryptID);

        $pengunjung = group_member::where('pengunjung_id', $id)->first();

        if ($pengunjung->feedback == null) {

            return view('pengunjung.feedback', compact('id'));
        }

        return redirect()->to('/pengunjung')->with('success', 'Maaf anda sudah mengisi feedback sebelumnya');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('pengunjung.feedback');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pengunjung = group_member::where('pengunjung_id', $request->id)->first();
        
        if ($pengunjung->feedback != null) {

            return redirect()->to('/pengunjung')->with('success', 'Maaf anda sudah mengisi feedback sebelumnya');
        }

        $request->validate([
            'id' => 'required',
            'how_they_know' =>'required',
            
            'knowledge_before_xev' =>'required',
            'knowledge_after_xev' =>'required',
            'knowledge_increases' =>'required',
            'knowledge_other' =>'',
            
            'content_opinion' =>'required',
            'reason_opinion' =>'required',
            'presenter_score' =>'required',
            'reason_score' =>'required',
            'xev_center_facility' =>'required',
            'reason_xev_center_facility' =>'required',
            'interested_to_buy' =>'required',

            'car_series' => '',
            'car_type' => '',

            'reason_xev_center_is_worth' =>'required',
            'testimoni' =>'required',
            'advice' =>'required',
        ]);
        $data = [
            'pengunjung_id' => $request->id,
            'how_they_know' => $request->how_they_know,
            'how_they_know_other' => $request->how_they_know_other,
            'knowledge_before_xev' => $request->knowledge_before_xev,
            'knowledge_after_xev' => $request->knowledge_after_xev,
            'knowledge_increases' => $request->knowledge_increases,
            'knowledge_other' => $request->knowledge_other,
            'content_opinion' => $request->content_opinion,
            'reason_opinion' => $request->reason_opinion,
            'presenter_score' => $request->presenter_score,
            'reason_score' => $request->reason_score,
            'xev_center_facility' => $request->xev_center_facility,
            'reason_xev_center_facility' => $request->reason_xev_center_facility,
            'interested_to_buy' => $request->interested_to_buy,
            'car_series' => $request->car_series,
            'car_type' => $request->car_type,
            'reason_xev_center_is_worth' => $request->reason_xev_center_is_worth,
            'testimoni' => $request->testimoni,
            'advice' => $request->advice,
        ];
        $data['knowledge_increases'] = implode(' , ', $data['knowledge_increases']);

        feedback::create($data);

        group_member::where('pengunjung_id', $data['pengunjung_id'])->update([
            'feedback' => 1,
        ]);

        return redirect()->to('/pengunjung')->with('success', 'Terimakasih Sudah Mengisi Feedback! :)');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
