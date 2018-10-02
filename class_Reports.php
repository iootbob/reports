<?php 
require_once("./DB.php");

$w = new Reports(DB::getInstance());
$w->getSalesDistribution();

class Reports{

    public static $array = [
        ["id" => 1, "name" => "Philip", "lname", "lname" => "Rosales"],
        ["id" => 2, "name" => "John", "lname" => "Doe"]
    ];

    private $_dbConn;

    public function __construct($db){
        $this->_dbConn = $db;
    }

    public function getNewClients(){

        $query = "SELECT _created_at,client_name,nbr_seats,contract_type,mrr,contract_expire_date, DATEDIFF(contract_expire_date,_created_at) AS date_diff 
        FROM clients 
        WHERE _created_at >= :first_day
        AND _created_at <= :last_day 
        AND active = 1 
        ORDER BY contract_type ASC";

        $stmnt = $this->_dbConn->prepare($query);
        $stmnt->bindValue(":first_day",date("Y-m-01"));
        $stmnt->bindValue(":last_day",date("Y-m-t"));
        $stmnt->execute();
        
        return $this->_renderNewClientsToHtml($stmnt);

    }

    public function _renderNewClientsToHtml($data){

        $html = "<tbody>";
        $mrr_total = 0;
        $years = [
            "one"   => 365,
            "two"   => 730,
            "three" => 1095
        ];
      

        if($data->rowCount() > 0){
        
            while($row = $data->fetch(PDO::FETCH_ASSOC)){
                $mrr_total += (int)$row['mrr'];            
                $date_diff = $row['date_diff'] !== NULL ? $row['date_diff']." "."days" : 0;

                // $years = $date_diff != 0 ? intval((int)$date_diff / 365) : 0;
                

                // if($row['date_diff'] <  $years["one"]){
                //     $months = ((int)$date_diff % $years["one"]) / 30.5;
                // }
                // else if($row['date_diff'] >=  $years["one"] && $row['date_diff'] <  $years["two"] ){
                //     $months = ((int)$date_diff %  $years["two"]) / 30.5;
                // }
                // else if($row['date_diff'] >=  $years["two"] && $row['date_diff'] <  $years["three"] ){
                //     $months = ((int)$date_diff %  $years["three"]) / 30.5;
                // }
                $months = (int)$row['date_diff'] / 30.5;

                $months = round($months);

                $html .= '<tr class="table_cell_tr">
                        
                            <td class="table_cell" >'. date("Y-m-d",strtotime($row['_created_at'])).'</td>
                            <td class="table_cell" >'. $row['client_name'] .'</td>
                            <td class="table_cell" >'. $row['nbr_seats'] .'</td>
                            <td class="table_cell" >'. $row['contract_type'] .'</td>
                            <td class="table_cell" >'. $months." "."Months"  .'</td>
                            <td class="table_cell" >'. $row['contract_expire_date'] .'</td>
                            <td class="currency table_cell" style="border: 1px solid #c8c8c8;text-align: center;text-align:right">'. number_format($row['mrr']) .'</td>
                        </tr>';
            }
            $html .= "</tbody>";

            $html .= '<tfoot>
                        <tr class="darkened-row">
                            <th class="table_cell" colspan="6">Total in Php</th>
                            <th class="table_cell">'. number_format($mrr_total) .'</th>
                        </tr>
                    </tfoot>';
                    
            
    
        }else{
            $html .= '<tr>
                        <td colspan="7" style="border: 1px solid #c8c8c8;border-top: 0;padding: 20px 0px 20px 0px;">                       
                                <center><h1>Empty</h1></center>    
                        </td>
                    </tr>';
                
            $html .= "</tbody>";
        }

        
        

        return $html;

    }

    public function getLostClients(){

        // $return_array = self::$array;

        $query = "SELECT client_name,_modified_at,contract_type,mrr
        FROM clients
        WHERE active = 0
        AND _modified_at >= :first_day
        AND _modified_at <= :last_day
        ORDER BY _modified_at DESC
        ";

        $stmnt = $this->_dbConn->prepare($query);
        $stmnt->bindValue(":first_day",date("Y-m-01"));
        $stmnt->bindValue(":last_day",date("Y-m-t"));
        $stmnt->execute();

        // echo "<pre>",print_r($stmnt->fetchAll()),"</pre>";

        return $this->_renderLostClientsToHtml($stmnt);

    }

    public function _renderLostClientsToHtml($data){

        $html = "<tbody>";

        if($data->rowCount() > 0){

            while($row = $data->fetch(PDO::FETCH_ASSOC)){
                
                $html .= '<tr class="table_cell_tr">
                            <td class="table_cell" >'. date("Y-m-d", strtotime($row['_modified_at']) ) .'</td>
                            <td class="table_cell" >'. $row['client_name'] .'</td>
                            <td class="table_cell" >'. $row['contract_type'] .'</td>
                            <td class="currency table_cell" style="border: 1px solid #c8c8c8;text-align: center;text-align:right">'. number_format($row['mrr']) .'</td>
                        </tr>';
            }

            $html .= '<tfoot>
                        <tr class="darkened-row">
                            <th class="table_cell" colspan="3">Total in Php</th>
                            <th class="currency table_cell" style="border: 1px solid #c8c8c8;text-align: center;text-align:right" ></th>
                        </tr>
                    </tfoot>';

            $html .= "</tbody>";

        }else{

            $html .= '<tr>
                        <td colspan="4" style="border: 1px solid #c8c8c8;border-top: 0;padding: 20px 0px 20px 0px;">                       
                                <center><h1>Empty</h1></center>    
                        </td>
                    </tr>';

            $html .= "</tbody>";
        }
        

        return $html;
        
    }

    public function getNewEmployeesNonPB(){

        // $return_array = self::$array;
        $query = "SELECT emp.first_name,emp.last_name,emp.current_position,emp.reporting_line,emp.hire_date,emp.employment_status,emp.current_salary,cli.client_name 
        FROM employees AS emp
        JOIN clients AS cli ON emp.client_id = cli.client_id
        WHERE emp.hire_date >= :first_day 
        AND emp.hire_date <= :last_day 
        AND emp.seat_contract_type = 'MSA' 
        AND NOT emp.employment_status = :emp_status 
        AND NOT emp.client_id = 1 ";

        $stmnt = $this->_dbConn->prepare($query);
        $stmnt->bindValue(":first_day",date("Y-m-01"));
        $stmnt->bindValue(":last_day",date("Y-m-t"));
        $stmnt->bindValue(":emp_status","RESIGNED");
        $stmnt->execute();
         
        return $this->_renderNewEmployeesNonPBToHtml($stmnt);

    }

    public function _renderNewEmployeesNonPBToHtml($data){

        $html = "<tbody>";

        if($data->rowCount() > 0){
            while($row = $data->fetch(PDO::FETCH_ASSOC)){
                
                $html .= '<tr class="table_cell_tr">
                            <td class="table_cell" >'.$row['first_name'].' '.$row['last_name'].'</td>
                            <td class="table_cell" >'. $row['current_position'] .'</td>
                            <td class="table_cell" >'. $row['client_name'] .'</td>
                            <td class="table_cell" >'. $row['reporting_line'] .'</td>
                            <td class="table_cell" >'. $row['employment_status'] .'</td>
                            <td class="table_cell" >'. number_format($row['current_salary']) .'</td>
                            <td class="table_cell" >'. date("Y-m-d",strtotime($row['hire_date'])) .'</td>
                            <td class="table_cell" ></td>
                        </tr>';
            }       

            $html .= "</tbody>";
        }else{
            $html .= '<tr>
                        <td colspan="8" style="border: 1px solid #c8c8c8;border-top: 0;padding: 20px 0px 20px 0px;">                       
                                <center><h1>Empty</h1></center>    
                        </td>
                    </tr>';

            $html .= "</tbody>";
        }

            

        return $html;
        
    }


    public function getNewEmployeesPB(){

        // $return_array = self::$array;
        $query = "SELECT emp.first_name,emp.last_name,emp.current_position,emp.reporting_line,emp.hire_date,emp.employment_status
        FROM employees AS emp
        JOIN clients AS cli ON emp.client_id = cli.client_id
        WHERE emp.hire_date >= :first_day 
        AND emp.hire_date <= :last_day 
       
        AND emp.client_id = 1 
        AND NOT emp.employment_status = :emp_status ";

        $stmnt = $this->_dbConn->prepare($query);
        $stmnt->bindValue(":first_day",date("Y-m-01"));
        $stmnt->bindValue(":last_day",date("Y-m-t"));
        $stmnt->bindValue(":emp_status","RESIGNED");
        $stmnt->execute();
         
        return $this->_renderNewEmployeesPBToHtml($stmnt);

    }


    public function _renderNewEmployeesPBToHtml($data){

        $html = "<tbody>";

        if($data->rowCount() > 0){
            while($row = $data->fetch(PDO::FETCH_ASSOC)){
                
                $html .= '<tr class="table_cell_tr">
                            <td class="table_cell" >'.$row['first_name'].' '.$row['last_name'].'</td>
                            <td class="table_cell" >'. $row['current_position'] .'</td>
                            <td class="table_cell" >'. $row['reporting_line'] .'</td>
                            <td class="table_cell" >'. $row['employment_status'] .'</td>
                            <td class="table_cell" >'. date("Y-m-d",strtotime($row['hire_date'])) .'</td>
                        </tr>';
            }       

            $html .= "</tbody>";
        }else{
            $html .= '<tr>
                        <td colspan="5" style="border: 1px solid #c8c8c8;border-top: 0;padding: 20px 0px 20px 0px;">                       
                                <center><h1>Empty</h1></center>    
                        </td>
                    </tr>';

            $html .= "</tbody>";
        }

            

        return $html;
        
    }

    public function getLostEmployees(){

        

        $query = "SELECT emp.first_name,emp.last_name,emp.current_position,emp.reporting_line,emp.separation_date,emp.billing_end_date,cli.client_name
        FROM employees as emp
        JOIN clients AS cli ON emp.client_id = cli.client_id
        WHERE emp.billing_end_date >= :first_day
        AND emp.billing_end_date <= :last_day
        AND emp.seat_contract_type = 'MSA'
        AND emp.employment_status = 'RESIGNED'";

        $stmnt = $this->_dbConn->prepare($query);
        $stmnt->bindValue(":first_day",date("Y-09-01"));
        $stmnt->bindValue(":last_day",date("Y-09-t"));

        $stmnt->execute();

        return $this->_renderLostEmployeesToHtml($stmnt);

    }

    public function _renderLostEmployeesToHtml($data){

        $html = "<tbody>";

        if($data->rowCount() > 0){
           

                while($row = $data->fetch(PDO::FETCH_ASSOC)){
                    
                    $html .= '<tr class="table_cell_tr">
                                <td class="table_cell" >'. $row['first_name'] . " " . $row['last_name'] .'</td>
                                <td class="table_cell" >'. $row['current_position'] .'</td>
                                <td class="table_cell" >'. $row['reporting_line'] .'</td>
                                <td class="table_cell" >'. $row['billing_end_date'] .'</td>
                                <td class="table_cell" >'. $row['client_name'] .'</td>
                                </tr>';
                }

                $html .= "</tbody>";
                                                  
        }else{
            $html .= '<tr>
                        <td colspan="5" style="border: 1px solid #c8c8c8;border-top: 0;padding: 20px 0px 20px 0px;">                       
                                <center><h1>Empty</h1></center>    
                        </td>
                    </tr>';

            $html .= "<tbody>";
        }

        return $html;
        
    }

    public function distribution($first_num,$second_num,$type){
    
        $query = "SELECT contract_type,count(*) AS count,sum(MRR) AS total
        FROM  clients
        WHERE mrr BETWEEN :first_num AND :second_num
        AND contract_type = :type
        AND active = 1";

        $stmnt = $this->_dbConn->prepare($query);
        $stmnt->bindParam(":first_num",$first_num);
        $stmnt->bindParam(":second_num",$second_num);
        $stmnt->bindParam(":type",$type);
        $stmnt->execute();

        return $stmnt;
        
    }

    public function getSalesDistribution(){

        $data[0]["range"] = "0 - 10,000";
        $data[0]["osa"] = $this->distribution($first_num = 0,$second_num = 10000,$type = 'OSA')->fetchAll(PDO::FETCH_ASSOC);
        $data[0]["msa"] = $this->distribution($first_num = 0,$second_num = 10000,$type = "MSA")->fetchAll(PDO::FETCH_ASSOC);
        $data[0]["total"] = $data[0]["osa"][0]["total"] + $data[0]["msa"][0]["total"];

        $data[1]["range"] = "10,000 - 20,000";
        $data[1]["osa"] = $this->distribution($first_num = 10000,$second_num = 20000,$type = 'OSA')->fetchAll(PDO::FETCH_ASSOC);
        $data[1]["msa"] = $this->distribution($first_num = 10000,$second_num = 20000,$type = "MSA")->fetchAll(PDO::FETCH_ASSOC);
        $data[1]["total"] = $data[1]["osa"][0]["total"] + $data[1]["msa"][0]["total"];

        $data[2]["range"] = "20,000 - 30,000";
        $data[2]["osa"] = $this->distribution($first_num = 20000,$second_num = 30000,$type = 'OSA')->fetchAll(PDO::FETCH_ASSOC);
        $data[2]["msa"] = $this->distribution($first_num = 20000,$second_num = 30000,$type = "MSA")->fetchAll(PDO::FETCH_ASSOC);
        $data[2]["total"] = $data[2]["osa"][0]["total"] + $data[2]["msa"][0]["total"];

        $data[3]["range"] = "30,000 - 40,000";
        $data[3]["osa"] = $this->distribution($first_num = 30000,$second_num = 40000,$type = 'OSA')->fetchAll(PDO::FETCH_ASSOC);
        $data[3]["msa"] = $this->distribution($first_num = 30000,$second_num = 40000,$type = "MSA")->fetchAll(PDO::FETCH_ASSOC);
        $data[3]["total"] = $data[3]["osa"][0]["total"] + $data[3]["msa"][0]["total"];

        $data[4]["range"] = "40,000 - 50,000";
        $data[4]["osa"] = $this->distribution($first_num = 40000,$second_num = 50000,$type = 'OSA')->fetchAll(PDO::FETCH_ASSOC);
        $data[4]["msa"] = $this->distribution($first_num = 40000,$second_num = 50000,$type = "MSA")->fetchAll(PDO::FETCH_ASSOC);
        $data[4]["total"] = $data[4]["osa"][0]["total"] + $data[4]["msa"][0]["total"];

        $data[5]["range"] = "50,000 - 60,000";
        $data[5]["osa"] = $this->distribution($first_num = 50000,$second_num = 60000,$type = 'OSA')->fetchAll(PDO::FETCH_ASSOC);
        $data[5]["msa"] = $this->distribution($first_num = 50000,$second_num = 60000,$type = "MSA")->fetchAll(PDO::FETCH_ASSOC);
        $data[5]["total"] = $data[5]["osa"][0]["total"] + $data[5]["msa"][0]["total"];

        $data[6]["range"] = "60,000 - 70,000";
        $data[6]["osa"] = $this->distribution($first_num = 60000,$second_num = 70000,$type = 'OSA')->fetchAll(PDO::FETCH_ASSOC);
        $data[6]["msa"] = $this->distribution($first_num = 60000,$second_num = 70000,$type = "MSA")->fetchAll(PDO::FETCH_ASSOC);
        $data[6]["total"] = $data[6]["osa"][0]["total"] + $data[6]["msa"][0]["total"];

        $data[7]["range"] = "70,000 - 80,000";
        $data[7]["osa"] = $this->distribution($first_num = 70000,$second_num = 80000,$type = 'OSA')->fetchAll(PDO::FETCH_ASSOC);
        $data[7]["msa"] = $this->distribution($first_num = 70000,$second_num = 80000,$type = "MSA")->fetchAll(PDO::FETCH_ASSOC);
        $data[7]["total"] = $data[7]["osa"][0]["total"] + $data[7]["msa"][0]["total"];

        $data[8]["range"] = "80,000 - 90,000";
        $data[8]["osa"] = $this->distribution($first_num = 80000,$second_num = 90000,$type = 'OSA')->fetchAll(PDO::FETCH_ASSOC);
        $data[8]["msa"] = $this->distribution($first_num = 80000,$second_num = 90000,$type = "MSA")->fetchAll(PDO::FETCH_ASSOC);
        $data[8]["total"] = $data[8]["osa"][0]["total"] + $data[8]["msa"][0]["total"];

        $data[9]["range"] = "90,000 + ";
        $data[9]["osa"] = $this->distribution($first_num = 90000,$second_num = 500000,$type = 'OSA')->fetchAll(PDO::FETCH_ASSOC);
        $data[9]["msa"] = $this->distribution($first_num = 90000,$second_num = 500000,$type = "MSA")->fetchAll(PDO::FETCH_ASSOC);
        $data[9]["total"] = $data[9]["osa"][0]["total"] + $data[9]["msa"][0]["total"];

        // $data["ten_twenty_osa"] = $this->distribution($first_num = 10000,$second_num = 20000,$type = 'OSA');
        // $data["ten_twenty_msa"] = $this->distribution($first_num = 10000,$second_num = 20000,$type = "MSA");

         
        

        // $sum = $data['zero_ten_osa'] + $data['zero_ten_msa']
        
        


        // $return_array = self::$array;

        return $this->_renderSalesDistributionToHtml($data);

    }

    public function _renderSalesDistributionToHtml($data){

        $msa_count = 0; //Number of clients that are MSA
        $osa_count = 0; //Number of clients that are OSA
        
        $msa_total = 0;  // TOTAL MRR for MSA
        $osa_total = 0;  // TOTAL MRR for OSA

        $mrr_sum = 0;   // Total MRR for both

        $html = "<tbody>";

        if(count($data) > 0){
            for($i = 0; $i <= 9; $i++){

            $msa_count += (int)$data[$i]["msa"][0]["count"];
            $osa_count += (int)$data[$i]["osa"][0]["count"];

            $msa_total += (int)$data[$i]["msa"][0]["total"];
            $osa_total += (int)$data[$i]["osa"][0]["total"];

            $mrr_sum += (int)$data[$i]['total'];


                $html .= '<tr class="table_cell_tr">
                            <td class="table_cell" >'. $data[$i]["range"] .'</td>
                            <td class="table_cell" >'. $data[$i]["msa"][0]["count"] .' / '. number_format($data[$i]["msa"][0]["total"]) .'</td>
                            <td class="table_cell" >'. $data[$i]["osa"][0]["count"] .' / '. number_format($data[$i]["osa"][0]["total"]) .'</td>
                            <td class="table_cell" >'. number_format($data[$i]['total']) .'</td>
                         </tr>';
            }
    
            $html .= "</tbody>";

            $html .= '<tfoot>
                        <tr class="darkened-row">
                            <th class="table_cell">Total in Php</th>
                            <th class="table_cell" >'. $msa_count .' / '. number_format($msa_total) .'</th>
                            <th class="table_cell" >'. $osa_count .' / '. number_format($osa_total) .'</th>
                            <th class="currency table_cell" style="border: 1px solid #c8c8c8;text-align: center;text-align:right" >'. number_format($mrr_sum) .'</th>
                        </tr>
                    </tfoot>';
        }else{
            $html .= '<tr>
                        <td colspan="4" style="border: 1px solid #c8c8c8;border-top: 0;padding: 20px 0px 20px 0px;">                       
                                <center><h1>Empty</h1></center>    
                        </td>
                    </tr>';
        }


        return $html;
        
    }

    public function getIndustry(){

        // $return_array = self::$array;

        $query = 'SELECT business_nature,count(*) AS count
        FROM clients
        WHERE business_nature IS NOT NULL
        AND business_nature != ""
        AND business_nature != "-"
        AND active = 1
        GROUP BY business_nature';

        $stmnt = $this->_dbConn->prepare($query);
        // $stmnt->bindValue(":first_day",date("Y-m-01"));
        // $stmnt->bindvalue(":last_day",date("Y-m-t"));
        $stmnt->execute();

        // echo "<pre>",print_r($stmnt->fetchAll(PDO::FETCH_ASSOC)),"</pre>";
        return $this->_renderIndustryToHtml($stmnt);

    }

    public function _renderIndustryToHtml($data){

        $html = "<tbody>";
        $count = 0;

        if($data->rowCount() > 0){
            while($row = $data->fetch(PDO::FETCH_ASSOC)){
                $count += $row['count'];
                $html .= '<tr class="table_cell_tr">
                            <td class="table_cell" >'. $row['business_nature'] .'</td>
                            <td class="table_cell" >'. $row['count'] .'</td>
                            <td class="table_cell" ></td>     
                        </tr>';
            }

            $html .= '<tfoot>
                        <tr class="darkened-row">
                            <th class="table_cell">Total/th>
                            <th class="table_cell">'. $count .'</th>
                            <th class="table_cell"></th>
                        </tr>
                      </tfoot>';
    
            $html .= "</tbody>";
        }else{
            $html .= '<tr>
                        <td colspan="3" style="border: 1px solid #c8c8c8;border-top: 0;padding: 20px 0px 20px 0px;">                       
                                <center><h1>Empty</h1></center>    
                        </td>
                    </tr>';
        }
        

        return $html;
        
    }

    public function getCountry(){

        // $return_array = self::$array;

        // $query = "SELECT country, mrr , client_name
        // FROM clients
        // WHERE country LIKE '%PH%'
        // ORDER BY mrr DESC
        
        // ";

        $query = "SELECT LOWER(country) AS country, COUNT(country) AS country_count, SUM(mrr) AS MRR, COUNT(mrr) AS client_count ,client_name
        FROM clients
        WHERE active = 1
        GROUP BY SOUNDEX(country)
        ORDER BY country_count DESC";
        // $query 

        

        $stmnt = $this->_dbConn->prepare($query);
        // $stmnt->bindValue(":first_day",date("Y-m-01"));
        // $stmnt->bindValue(":last_day",date("Y-m-t"));
        $stmnt->execute();

        // echo "<pre>",print_r($stmnt->fetchAll(PDO::FETCH_ASSOC)),"</pre>";
        
       
        return $this->_renderCountryToHtml($stmnt);

    }

    public function _renderCountryToHtml($data){
        $country_count = 0;
        $client_count = 0;
        $mrr_total = 0;
        $html = "<tbody>";

        if($data->rowCount() > 0){

            while($row = $data->fetch(PDO::FETCH_ASSOC)){
                $country_count += (int)$row['country_count'];
                $client_count += (int)$row['client_count'];
                $mrr_total += (int)$row['MRR'];

                $html .= '<tr class="table_cell_tr">
                            <td class="table_cell" >'. ucwords($row['country']) .'</td>
                            <td class="table_cell" >'. $row['client_count'] .' of '. $row['country_count'] .'</td>
                            <td class="currency table_cell" style="border: 1px solid #c8c8c8;text-align: center;text-align:right" >'. number_format($row['MRR']) . '</td>
                        </tr>';
            }

                $html.='</tbody>';

                $html .= '<tfoot>
                            <tr class="darkened-row">
                                <th class="table_cell" colspan="1">Total in Php</th>
                                <th class="table_cell" colspan="1">'. $client_count .' of '. $country_count .'</th>
                                <th class="currency table_cell" style="border: 1px solid #c8c8c8;text-align: center;text-align:right" >'. number_format($mrr_total) .'</th>
                            </tr>
                        </tfoot>';

        }else{
            $html .= '<tr>
                        <td colspan="3" style="border: 1px solid #c8c8c8;border-top: 0;padding: 20px 0px 20px 0px;">                       
                                <center><h1>Empty</h1></center>    
                        </td>
                    </tr>';

            $html .= "</tbody>";
        }


        return $html;
        
    }

    public function getCollection_one(){

        $return_array = self::$array;
        return $this->_renderCollection_oneToHtml($return_array);

    }

    public function _renderCollection_oneToHtml($data){

        if(count($data) > 0){

            $html = '<tbody>';

        foreach($data as $ar){
            
            $html .= '<tr class="table_cell_tr">
                        <td class="table_cell" >OPL 4</td>
                        <td class="table_cell" >Client 1</td>
                        <td class="table_cell currency">200,000.00</td>
                        <td class="table_cell" >Paid</td>
                        <td class="table_cell" >10%</td>
                    </tr>';
        }

            $html.='</tbody>';
        }else{
            $html = '<table align="center" border="0" cellpadding="10" cellspacing="0" class="table_container">
                    <thead>
                        <tr class="darkened-row">
                            <th class="table_cell">Office</th>
                            <th class="table_cell">Client Name</th>
                            <th class="table_cell">Invoice Amount</th>      
                            <th class="table_cell">Status</th>
                            <th class="table_cell">Pct</th>
                        </tr>
                    </thead>
                    <tbody>';

            $html .= '<tr>
                        <td colspan="5" style="border: 1px solid #c8c8c8;border-top: 0;padding: 20px 0px 20px 0px;">                       
                                <center><h1>Empty</h1></center>    
                        </td>
                    </tr>';

            $html .= "</tbody>";
        }

        return $html;
        
    }
    public function getCollection_two(){
        $return_array = self::$array;
        return $this->_renderCollection_twoToHtml($return_array);
    }

    public function _renderCollection_twoToHtml($data){
        if(count($data) > 0){

            $html = '<tbody>';

        foreach($data as $ar){
            
            $html .= '<tr class="table_cell_tr">
                        <td class="table_cell" >OPL 4</td>
                        <td class="currency table_cell" style="border: 1px solid #c8c8c8;text-align: center;text-align:right">600,000.00</td>
                        <td class="currency table_cell" style="border: 1px solid #c8c8c8;text-align: center;text-align:right">400,000.00</td>
                        <td class="currency table_cell" style="border: 1px solid #c8c8c8;text-align: center;text-align:right">200,000.00</td>
                    </tr>
                    <tr>
                        <td class="table_cell" >OPL 5</td>
                        <td class="currency table_cell" style="border: 1px solid #c8c8c8;text-align: center;text-align:right">600,000.00</td>
                        <td class="currency table_cell" style="border: 1px solid #c8c8c8;text-align: center;text-align:right">400,000.00</td>
                        <td class="currency table_cell" style="border: 1px solid #c8c8c8;text-align: center;text-align:right">200,000.00</td>
                    </tr>
                    <tr>
                        <td class="table_cell" >OPL 6</td>
                        <td class="currency table_cell" style="border: 1px solid #c8c8c8;text-align: center;text-align:right">600,000.00</td>
                        <td class="currency table_cell" style="border: 1px solid #c8c8c8;text-align: center;text-align:right">400,000.00</td>
                        <td class="currency table_cell" style="border: 1px solid #c8c8c8;text-align: center;text-align:right">200,000.00</td>
                    </tr>';
        }

            $html.='</tbody>';

            $html .= '<tfoot>
                        <tr class="darkened-row">
                            <th class="table_cell">Total in Php</th>
                            <th class="currency table_cell" style="border: 1px solid #c8c8c8;text-align: center;text-align:right" >1,800,000.00</th>
                            <th class="currency table_cell" style="border: 1px solid #c8c8c8;text-align: center;text-align:right" >1,200,000.00</th>
                            <th class="currency table_cell" style="border: 1px solid #c8c8c8;text-align: center;text-align:right" >600,000.00</th>
                        </tr>    
                    </tfoot>';
        }else{
            $html = '<table align="center" border="0" cellpadding="10" cellspacing="0" class="table_container">
                    <thead>
                        <tr class="darkened-row">
                            <th class="table_cell">Office</th>
                            <th class="table_cell">Client Name</th>
                            <th class="table_cell">Invoice Amount</th>      
                            <th class="table_cell">Status</th>
                            <th class="table_cell">Pct</th>
                        </tr>
                    </thead>
                    <tbody>';

            $html .= '<tr>
                        <td colspan="5" style="border: 1px solid #c8c8c8;border-top: 0;padding: 20px 0px 20px 0px;">                       
                                <center><h1>Empty</h1></center>    
                        </td>
                    </tr>';

            $html .= "</tbody>";
        }

        return $html;
    }
    
                            
                       
                        


}