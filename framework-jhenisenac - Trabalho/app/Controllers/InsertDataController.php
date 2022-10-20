<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;



class InsertDataController extends AbstractControllers{
    private $params;
    private $attrName;

    public function execute(){
        
        try{
            $response = ['success' => true];
            $this->params = $this->processServerElements->getInputJSONData();
            $this->verificationInputVar();
       
            $this->params = $this->processServerElements->getInputJSONData();

            $query = "INSERT INTO user(name,last_name,age) VALUES(:name,:last_name,:age)";
            $statement = $this->pdo->prepare($query);

            $statement->execute([
                ':name'=> $this->params["name"],
                ':last_name'=> $this->params["last_name"],
                ':age'=> $this->params["age"]

            ]);

        } catch(\Exception $e){
            $response = [
                'success' => false,
                'message' => $e->getMessage(),
                'attrThatIsWithOut' => $this->attrName
            ];
        }

        view($response);
        
    }
    private function verificationInputVar(){
        if(!$this->params['name']){
            $this->attrName = 'name';
            throw new \Exception('the name has to be send in the request');
        }

        if(!$this->params['last_name']){
            $this->attrName = 'last_name';
            throw new \Exception('the last name has to be send in the request');
        }

        if(!$this->params['age']){
            $this->attrName = 'age';
            throw new \Exception('the age has to be send in the request');
        }

        if(!$this->params['age'] < 0){
            $this->attrName = 'age';
            throw new \Exception('the age has to be send in the zero');
        }
        if(!$this->params['age'] > 200){
            $this->attrName = 'age';
            throw new \Exception('the age has to be send in the thow hndred');
        }
        
        
        

    }
}   