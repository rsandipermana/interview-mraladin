<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator, DB;
use App\Direct;

class DirectController extends Controller
{
    public function get($short)
    {
        $direct = Direct::where('shorturl', $short)->first();
        if (!empty($direct)) {
            return redirect($direct->longurl);
        }else{
            return response()->json([
                'message'   => 'Short URL not exist'
            ], 500);
        }
    }
    public function create(Request $request)
    {
        DB::beginTransaction();
        try {
            //CREATE UNIQE CODE START WITH MA-*
            do {
                $short = 'MA-'. Str::random(5);
                $direct = Direct::where('shorturl', $short)->first();
            } while(!empty($direct));
            
            //ADD HTTP IF NOT SET
            if(strtolower(substr($request->input('longurl'),0,4))!=='http'){
                $long = 'http://'.($request->input('longurl'));
            }else{
                $long = $request->input('longurl');
            }

            //INSERT INTO TABLE
            $results    = Direct::create([
                'shorturl'  => $short,
                'longurl'   => $long
            ]);
            DB::commit();

            //RESPONSE COMMIT
            return response()->json([
                'message'   => 'data successfully created',
                'data'      => $results
            ],200);
            
        } catch (\Exception $e) {
            //RESPONSE ERROR
            DB::rollback();
            return response()->json([
                'message'   => 'something wrong'
            ], 500);
        }
    }
    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $input = $request->all();

            //ADD HTTP IF NOT SET
            if(strtolower(substr($request->input('longurl'),0,4))!=='http'){
                $input['longurl'] = 'http://'.($request->input('longurl'));
            }else{
                $input['longurl'] = $request->input('longurl');
            }

            //UPDATE TABLE
            $results    = Direct::where('id', $request->id)->update($input);
            DB::commit();

            //RESPONSE COMMIT
            return response()->json([
                'message'   => 'data successfully updated'
            ],200);
            
        } catch (\Exception $e) {
            //RESPONSE ERROR
            DB::rollback();
            return response()->json([
                'message'   => 'something wrong'
            ], 500);
        }
    }
    public function delete($id)
    {
        DB::beginTransaction();
        try {
            //DELETE
            $results      = Direct::find($id)->delete();
            DB::commit();
            //RESPONSE COMMIT
            return response()->json([
                'message'   => 'data successfully deleted'
            ],200);
        } catch (\Exception $e) {
            //RESPONSE ERROR
            DB::rollback();
            return response()->json([
                'message'   => 'something wrong'
            ], 500);
        } 
    }
}
