<?php
namespace backend\modules\circulation\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use backend\modules\circulation\models\AgencyBillBook;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\base\DynamicModel;
use backend\modules\circulation\models\Agency;
use yii\data\ActiveDataProvider;
use kartik\mpdf\Pdf;


Class BillingController extends Controller{
     /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }
    
    public function actionIndex(){
        return $this->render('welcome');
    }
    
    public function actionCreate(){
        $model = new AgencyBillBook();  
        $model->scenario = AgencyBillBook::SCENARIO_CREATE;
        $request=Yii::$app->request;
       // echo $request['time'];
        $dates=$request->post('date1');
        $dd=$request->post('date');
        $prices=$request->post('price');
     //   print_r($prices);echo '<br/>';
     //  print_r($dates);exit;
        $record=$model->get_records($dd);
        if($record=='0'){
        $alldate=Yii::$app->mycomponent->calsunday($dd);
    //  print_r($alldate);  exit;
        //
        
        foreach ($alldate as $date){
            $agency=$model->get_all_agencies($date);
                //echo count($agency);exit;
//                echo'<pre>';
//                print_r($agency);exit;
//                echo '</pre>';
            $i=1;
                foreach ($agency as $key=> $val) {
                   // echo $i;
                    $model->id=NULL;
                    $model->isNewRecord = TRUE; 
                    $model->agency_id=$val['agency_id'];
                    $model->issue_date=$date;
                    $model->pjy=$val['panchjanya'];
                    $model->org=$val['organiser'];
                    $model->total_copies=$val['panchjanya']+$val['organiser'];
                    //echo $date;
                   //print_r($dates);
                    //$k=array_search($date, $dates,TRUE);
                    
                    //echo $k;exit;
                   // $r=in_array($date, $dates);
                    //echo $r;exit;
                    $dts = array_map(function($piece){
                            return (string) $piece;
                        }, $dates);
                       // print_r($dts);exit;
                    if(in_array($date, $dts)){
                    $key = array_search($date, $dts); 
                    $model->price_per_piece=$prices[$key];
                    $price=$prices[$key];
                    }
                    else 
                    {
                        $price='15';
                      $model->price_per_piece='15'; 
                    }
                    //echo $model->price_per_piece;exit;
                    $tot=$val['panchjanya']+$val['organiser'];
                    $price=($val['panchjanya']+$val['organiser'])*$price;
                    $model->total_price=$price;
                    $dsc=$model->get_discount($tot);
                    $per=($price*$dsc)/100;
                    $model->discount=$dsc;
                    $discounted=$price-$per;
                    $model->discounted_amt=$per;
                    $model->final_total=$discounted;
                    $model->created_on=  date('Y-m-d H:i:s');
                    $model->save(false);
                    
                    
        } }
     return  $this->render('show',['month'=>$dd]);
        }
        else{
            return $this->render('msgfile',['error'=>'Bill is Already Generated']);
        }
    }
     
    public function actionSearch(){
     
            $model = new DynamicModel([
                'name', 'billing_id', 'mail_pincode','month'
            ]);
            $model->addRule('name', 'string',['max'=>90]);
            $model->addRule('billing_id', 'string',['max'=>90]);
            $model->addRule('mail_pincode', 'string',['max'=>90]);
            $model->addRule('month', 'string',['max'=>90]);
            $model->addRule('month', 'required');

            if($model->load(Yii::$app->request->post())){
                        // do somenthing with model
                            $params=Yii::$app->request->post();
                           // print_r($params);exit;
                            $query = Agency::find();
                            $dataProvider = new ActiveDataProvider([
                                'query' => $query,
                            ]);
                            $model->load($params);
                           
                                
                $query->andFilterWhere(['like', 'name', $model->name]);
                $query->andFilterWhere(['like', 'billing_id', $model->billing_id]);
                $query->andFilterWhere(['like', 'mail_pincode', $model->mail_pincode]);
                $month=$model->month;
            return $this->render('detail',
                            [
                             'list'=>$dataProvider,
                             'model'=>$model,
                             'monthdata'=>$month,  
                             'data'=>$this->actionReferencesList()
                            ]);
        }
        return $this->render('search', ['model'=>$model,
            'data'=>$this->actionReferencesList(),
            ]);
        
    }
    public function actionPrint(){
     
            $model = new DynamicModel([
                'month'
            ]);
            $model->addRule('month', 'string',['max'=>90]);
            $model->addRule('month', 'required');

            if($model->load(Yii::$app->request->post())){
                        // do somenthing with model
                            $params=Yii::$app->request->post();
                           // print_r($params);exit;
                        $model->load($params);
                       // echo $model->month;exit;
                        $pdf = new Pdf([
                        'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
                        'orientation'=>'P',
                        'destination' => Pdf::DEST_BROWSER,
                        'filename' => 'bill.pdf',
                         

                        'content' =>$this->renderPartial('printall',[
                            'month'=>$model->month
                        ]),
                        'options' => [
                            'title' => 'Bill',
                            'subject' => 'Generating Bills',
                            'fileame' => 'bill.pdf'
                        ],
                        // 'methods' => [
                        //     'SetHeader' => ['Generated By: Ritesh Singh PDF Component||Generated On: ' . date("r")],
                        //     'SetFooter' => ['|Page {PAGENO}|'],
                        // ]
                    ]);

                    return $pdf->render();

        }
        return $this->render('printallpage', ['model'=>$model,
            'data'=>$this->actionReferencesList(),
            ]);
        
    }
    
    public function actionView($id,$month){
        $model= new AgencyBillBook();
//            $model = AgencyBillBook::find()
//                    ->innerJoinWith('agency', 'agency_bill_book.agency_id = agency.id')
//                    ->andWhere(['agency.id' => $id])
//                    ->one();
        
          $data=$model->getSinglebill($month,$id);
         // print_r();
        return $this->render('bill', [
                'rs' => $data,
                'month'=>$month,
            ]);
        
        
        
    }
    

    public function actionReferencesList() {
    $query = new \yii\db\Query;
    
    $query->select('name')
        ->from('agency')->orderBy('name');
    $command = $query->createCommand();
    $data = $command->queryAll();
    $out = [];
    foreach ($data as $d) {
        $out[] = $d['name'];
    }
    return $out;
}
    
   /**
     * Finds the AgencyReceipt model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AgencyReceipt the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Agency::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }  
    
    
  
}
