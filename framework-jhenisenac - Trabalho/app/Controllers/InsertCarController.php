<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;



class InsertCarController extends AbstractControllers{
    private $params;
    private $attrName;

    public function execute(){
        
        try{
            $response = ['success' => true];
            $this->params = $this->processServerElements->getInputJSONData();
            $this->verificationInputVar();
       
            $query = "INSERT INTO car(carName,model) VALUES(:carName,:model)";
            $statement = $this->pdo->prepare($query);

            $statement->execute([
                ':carName'=> $this->params["carName"],
                ':model'=> $this->params["model"]

            ]);

        } catch(\Exception $e){
            $response = [
                'success' => false,
                'message' => $e->getMessage(),
                'missingAttribute' => $this->attrName
            ];
        }

        view($response);
        
    }
    private function verificationInputVar(){
        if(!$this->params['carName']){
            $this->attrName = 'carName';
            throw new \Exception('the car name has to be send in the request');
        }

        if(!$this->params['model']){
            $this->attrName = 'model';
            throw new \Exception('the model has to be send in the request');
        }

    }
}   