<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\PropertylistModel;
use DB;
use PhpParser\Node\Expr\Print_;

class PropertyFormController extends appController
{

    public function view () {
        return view('application.propertyForm', $this->viewVars);
    }

    
    public function Propertyinst () {
        // echo 111;exit;

        $this->viewVars = [];
        $propertyDropdown = DB::table('propertylist')
            ->select('housingProjectId','housingProject')
            ->get();
        $this->viewVars['propertyDropdown']     = $propertyDropdown;

       
        return view('application.propertyForm', $this->viewVars);
    }

    public function propertyType () {

        $requestData = request()->all();
        $housingProject = $requestData['housingProject'];
        $propertytype1 = $requestData['propertyType'];

        $propertyType = DB::table('incomegroup')->where('housingProjectId', $housingProject)->get();

        $html = '<option value=""> --Select Property Type-- </option>';
        foreach ($propertyType as $list) {
            $select = ($propertytype1 === $list->propertyTypeId) ? 'selected' : '';
            $html .= '<option value="' . $list->propertyTypeId . '"' . $select . '>' . $list->propertyType . '</option>';
        }
        echo json_encode(array('res'=>$html));
    }

    public function propertyCost () {
        
        $requestData = request()->all();
        $propertyType = $requestData['propertyType'];
        // echo $propertyType;exit;

        $propertyTypeQuery = DB::table('incomegroup')->where('propertyTypeId', $propertyType)->first();
        // echo'<pre>'; print_R($propertyTypeQuery);exit;

        
        $getCost = $propertyTypeQuery->propertyCost;
        // echo$getCost;exit;

        echo '₹' . $getCost;exit;
        
    }

    public function applicationForm () {
        // echo 111;exit;
        /* Insert */
        $success="";
        $responseCode="";
        /* try {
        
        } catch (\Exception $e) {
            $statusCode     = 422;
            $status         ="ERROR";
            $msg            = "Something went wrong, Please try again!";
        } */
        if(!empty(request()->all()) && request()->isMethod('post')) {

            $requestData = request()->all();
            // echo'<pre>';print_r($requestData);exit;
            $validator   = \Validator::make($requestData, 
            [
                'appName'           => 'bail|required',
                'appEmail'          => 'bail|required',
                'appMobile'         => 'bail|required',
                'appdob'            => 'bail|required',
                'gender'            => 'bail|required',
                'appIdproof'        => 'bail|required',
                'housingProject'    => 'bail|required',
                'propertyType'      => 'bail|required',
                'propertyCost'      => 'bail|required',
            ],
            [
                'appName'               => 'Please Select Your Name',
                'appEmail'              => 'Please enter your Email',
                'appMobile'             => 'Please enter your Mobile',
                'appdob'                => 'Please Select Date',
                'gender'                => 'Please Select Gender',
                'housingProject'        => 'Please Select Housing Project',
                'propertyType'          => 'Please Select Property Type',
                // 'propertyCost'          => 'Please Select Property Cost',
            ]);

            /* if($validator->fails()) {
                // return redirect('application.propertyForm')->withErrors($validator)->withInput();
                return response()->json(['status'=> 422, 'errors'=>$validator->errors()->all()]);
                
            }  */
            if($validator->fails()) {
                $errors = $validator->errors();
                $msg = array();
                foreach ($errors->all() as $message) {
                    $msg[] = $message;
                }
                $statusCode = 422;
                $status="ERROR";
                
            }
            else {
                try {
                    $propertyStore = new PropertylistModel;

                    $propertyStore->appName             = $requestData['appName'];
                    $propertyStore->appEmail            = $requestData['appEmail'];
                    $propertyStore->appMobile           = $requestData['appMobile'];
                    $propertyStore->dob                 = $requestData['appdob'];
                    $propertyStore->age                 = $requestData['hdnAge'];
                    $propertyStore->gender              = $requestData['gender'];
                    $propertyStore->housingProjectId    = $requestData['housingProject'];
                    $propertyStore->propertyTypeId      = $requestData['propertyType'];
                    $propertyStore->propertyCost        = $requestData['propertyCost'];

                    $propertyStore->created_On          = NOW();
                    
                    /* File Upload */
                    $appIdproof = request()->file('appIdproof');
                    // print_r($appIdproof);exit;
                    $propertyStores = time().'.'.$appIdproof->getClientOriginalExtension();
                    $destinationPath = "public/assets";
                    $res = request()->file('appIdproof')->move($destinationPath.'/',$propertyStores);

                    $propertyStore->appIdProof = $propertyStores;
                    // echo'<pre>';print_r($res);exit;
            
                    // $propertyStore-> save();

                    // return redirect()->back();


                        if($propertyStore-> save()){

                            $statusCode     = 200;
                            $status         = "SUCCESS";
                            $msg            = "Record is successfully added";

                        } else {

                            $statusCode     = 404;
                            $status         = "ERROR";
                            $msg            = "Something went wrong!"; 

                        }

                } catch (\Exception $e) {
                    $statusCode     = 422;
                    $status         ="ERROR";
                    $msg            = "Something went wrong, Please try again!";
                }

            }
            return response()->json([
                "status" => $status,
                "statusCode" => $statusCode,
                "msg" => $msg
            ]);
        }
        return view('application.propertyTable');
        

    }

    public function PropertyTable () {
        $res = '';
        // echo 111;exit;
        $requestData = request()->all();
        // echo'<pre>';print_r($requestData);exit;
        $propertyDropdown = DB::table('propertylist')
            ->select('housingProjectId','housingProject')
            ->get();
        // print_R($propertyDropdown);exit;
        $this->viewVars['propertyDropdown']     = $propertyDropdown;

        

        $selectQuery = DB::table('propertytaxdb.propertypre_bookingform AS PB')
            ->select('PB.appName','PB.appEmail','PB.appMobile','PB.age','PB.appIdProof','PB.housingProjectId','PB.propertyTypeId','PB.propertyCost','PB.created_On','IG.propertyType','PL.housingProject')
            ->leftjoin('incomegroup AS IG', 'IG.propertyTypeId', '=', 'PB.propertyTypeId')
            ->leftjoin('propertylist AS PL', 'PL.housingProjectId', '=', 'PB.housingProjectId')
            ->orderBy('PB.created_On','DESC');
            
            /* Dropdown Search */
            $this->viewVars['housingProject'] = $housingProject = (trim(isset($requestData['housingProject'])) && $requestData['housingProject'] != '') ? $requestData['housingProject'] : 0;

            $this->viewVars['propertyType'] = $propertyType = (trim(isset($requestData['propertyType'])) && $requestData['propertyType'] != '') ? $requestData['propertyType'] : 0;

            
            /* Dependency Dropdown Search */
            if ($housingProject > 0) {
                $selectQuery->where('PB.housingProjectId', $requestData['housingProject']);
                $res = "a";
            }
            $this->viewVars['res'] = $res;

            if (!empty($requestData['propertyType'])) {
                $selectQuery->where('PB.propertyTypeId', $requestData['propertyType']);
            }

            $responseData= $selectQuery->get();
            // echo'<pre>';print_r($responseData);exit;
            $this->viewVars['selectQuery'] = $responseData;
        

        return view('application.propertyTable', $this->viewVars);
    }

    /* File Download */
    function getFile($filename){
        $path = public_path('assets/'.$filename);
        return response()->download($path);
    }
    
}
