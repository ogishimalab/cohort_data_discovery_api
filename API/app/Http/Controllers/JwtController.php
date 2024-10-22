<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\DataCollections;
use App\Models\CohortLevelMetaData;
use Cookie;

class JwtController extends Controller
{

    // jwt token
    private $token = '';


    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = [
            'email' => 'karouji@sria.co.jp',
            'password' =>  'test1234'
        ];

        if ($this->token = auth()->attempt($credentials)) {
            $res = [
                'access_token' => $this->token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 52560000
            ];
            
            return $this->json_response($res);
        } else {
            return $this->json_response(null, false,  401, 'login failed.');
        }
    }




    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }



    /**
     * DataCollection
     * @param n/a
     * @return \Illuminate\Http\JsonResponse
     */
    public function dataCollection()
    {
        $res = array();


        $dataCollection = DataCollections::where('releaseFlag', '1')->where('deleteFlag', '0')->orderBy('dataCollectionID', 'desc')->get();

        if ($dataCollection) 
        {
            foreach ($dataCollection as $key => $item) 
            {
                $ats = explode("-", $item->releaseDate);
                $releaseDate = $ats[0] . '年' . $ats[1] . '月' . $ats[2] . '日';
                if($item->dataCollectionID === 'all')
                {
                    $base = '';

                    // すべてのリリースが先頭に来るように調整
                    array_unshift($res, array(
                            "dataCollectionID" => $item->dataCollectionID, 
                            "releaseDate" => $releaseDate, 
                            "dataCollectionName" =>  $item->dataCollectionName, 
                            "base_items" => $base )
                        );
                }
                else
                {
                    $no = str_replace('.', '_', $item->dataCollectionID);
                    $res[] = array("dataCollectionID" => $item->dataCollectionID, "releaseDate" => $releaseDate, "dataCollectionName" =>  $item->dataCollectionName );
                }
            }
        }

        return $this->json_response($res);
    }


    /**
     * searchAllItems
     * @param string $data_collection_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchAllItems($data_collection_id)
    {
        $res = array();
        $collection_id = str_replace('.', '_', $data_collection_id);

        if($collection_id === 'all')
        {
            $res = \DB::table( config( 'app.name' ) .'_'. $collection_id. '_hierarchy')->where('parentGroupId', '<>', 0)->orderBy('sortOrder', 'asc')->get();
        }
        else
        {
            $searchAllItems = \DB::table( config( 'app.name' ) .'_'. $collection_id. '_item_hierarchies')->where('parentGroupId', '<>', 0)->orderBy('sortOrder', 'asc')->get();

            if($searchAllItems){
                foreach ($searchAllItems as $key => $item) {
                    array_unshift($res, array(
                        "itemID" =>  $item->itemID,  
                        "id" => $item->id, 
                        "dataCollectionID" =>  $data_collection_id,  
                        "itemName" =>  $item->itemName,
                        "parentGroupId" => $item->parentGroupId, 
                        )
                    );
                }
            }
    
            return $this->json_response($res);
        }
        return $this->json_response($res);
    }


    /**
     * searchItemsHierarchy
     * @param sttring $data_collection_id
     * @param sttring $parent_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchItemsHierarchy($data_collection_id, $parent_id = 0)
    {
        $collection_id = str_replace('.', '_', $data_collection_id);
        $res = \DB::table( config( 'app.name' ) .'_'. $collection_id . '_item_hierarchies')->where('parentGroupId', '=', $parent_id)->orderBy('sortOrder', 'asc')->get();

        return $this->json_response($res);
    }


    /**
     * itemId
     * @param sttring $data_collection_id
     * @param sttring $item_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function itemId( $data_collection_id, $item_id )
    {
        if( config( 'app.is_gender_exist' ) )
        {
            return $this->itemLevelMetadata($data_collection_id, $item_id, 0);
        }

        $collection_id = str_replace('.', '_', $data_collection_id);
        $res = \DB::table( config( 'app.name' ) .'_'. $collection_id . '_item_level_meta_data')
            ->where('itemID', '=', $item_id)->get();

        return $this->json_response($res->first());
    }

    
    /**
     * graph
     * @param sttring $data_collection_id
     * @param sttring $itemcode
     * @param int stratification_type
     * @return \Illuminate\Http\JsonResponse
     */
    public function itemLevelMetadata($data_collection_id, $item_id, $stratification_type = 0)
    {
        $collection_id = str_replace('.', '_', $data_collection_id);
        $res = \DB::table( config( 'app.name' ) .'_'. $collection_id . '_item_level_meta_data')
            ->where('itemID', '=', $item_id)
            ->where('stratificationType', '=', $stratification_type)->get();

        return $this->json_response($res->first());
    }

    public function statisticalData($data_collection_id, $item_id, $stratification_type = 0)
    {
        $collection_id = str_replace('.', '_', $data_collection_id);
        $res = \DB::table( config( 'app.name' ) .'_'. $collection_id . '_statistical_data')
            ->where('itemID', '=', $item_id)
            ->where('stratificationType', '=', $stratification_type)->get();

        return $this->json_response($res->first());
    }


    /**
     * stratificationType
     * @param sttring $data_collection_id
     * @param sttring $item_id
     * @param int stratification_type
     * @return \Illuminate\Http\JsonResponse
     */
     public function stratificationType($data_collection_id, $item_id, $stratification_type)
     {
         $collection_id = str_replace('.', '_', $data_collection_id);
         $res = \DB::table( config( 'app.name' ) .'_'. $collection_id . '_item_level_meta_data')
             ->where('itemID', '=', $item_id)
             ->where('stratificationType', '=', $stratification_type)->get();
  
         return $this->json_response($res->first());
     }

    /**
     * path
     * @param sttring $data_collection_id
     * @param sttring $item_id
     * @return \Illuminate\Http\JsonResponse
     */
     public function path($data_collection_id, $item_id = false)
     {
        $res = array();

        $collection_id = $data_collection_id;

        $dataCollection = DataCollections::where('dataCollectionID' , $collection_id)->first();

        // リリース名の作成
        if($collection_id === 'all') $collectionName = $dataCollection->dataCollectionName;
        else $collectionName = $collection_id . " " . $dataCollection->dataCollectionName;
        
        $i = 0;
        
        if( $item_id )
        {
            $no = str_replace('.', '_', $collection_id);
            $item = \DB::table( config( 'app.name' ) .'_'. $no . '_item_hierarchies')->where('itemID', $item_id)->first();

            $pageUrl = $this->urlAlias . '/' . $collection_id . '/' . $item_id;
            $res[] = [
                'url' => $pageUrl,
                'name' => $item->itemName,
                'type' => 'last'
            ];
    
            do
            {
                if($i++ >= 100) break;
                $item = \DB::table(config( 'app.name' ) .'_'. $no . '_item_hierarchies')->find($item->parentGroupId);
                $res[] = [
                    'url' => false,
                    'name' => $item->itemName,
                    'type' => 'hierarchy'
                ];
            }
            while( $item->parentGroupId !== 0 );
        }

        $collectionUrl = $this->urlAlias . '/' . $collection_id;
        $res[] = [
            'url' => $collectionUrl,
            'name' => $collectionName,
            'type' => 'dataCollection'
        ];
        $res = array_reverse($res);
 
        return $this->json_response($res);
     }


    /**
     * cohortLevelMetaData
     * @param sttring $data_collection_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function cohortLevelMetadata( $data_collection_id = "" )
    {
        $res = array();

        $cohortLevelMetaData = CohortLevelMetaData::get();

        if($cohortLevelMetaData){
            foreach ($cohortLevelMetaData as $key => $item) {
                array_unshift($res, array(
                    "cohortLevelMetadataKey" =>  $item->cohortLevelMetadataKey,  
                    "cohortLevelMetadataValue" =>  $item->cohortLevelMetadataValue,
                    )
                );
            }
        }

        return $this->json_response($res);
    }

    /**
     * json_response
     * @param object $res
     * @param bool $status
     * @param int $code
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    private function json_response($res, $status = true,  $code = 200, $message = '')
    {
        if (!empty($this->token)) {
            return response()
                ->json([
                    'tokenId' => (int)date('YmdHis'),
                    'status' => $status,
                    'result' => $res,
                    'errorMessage' => $message,
                ], $code)
                ->header('Content-Type', 'application/json')
                ->cookie('AUTH-TOKEN', $this->token, 60, null, null, true, false);
        }

        return response()->json([
            'tokenId' => (int)date('YmdHis'),
            'status' => $status,
            'result' => $res,
            'errorMessage' => $message,
        ], $code)
            ->header('Content-Type', 'application/json');
    }
}
