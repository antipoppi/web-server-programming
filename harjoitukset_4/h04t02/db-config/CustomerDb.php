<?php

class CustomersDb {
  private $dbConnection;

  public function __construct() {
    try {
        /*  KOMMENTTI: Tällä komennolla saan toimimaan sekä livenä/että paikallisesti UTF-8:n!
            Materiaaleissa ollut komento ei toiminut, pitkällisen googlettamisen jälkeen selvisi,
            että materiaaleissa oleva komento toimii v5.3.6 eteenpäin ja sitä vanhemmissa charset
            pitää asettaa erikseen näin.
        */
        //$this->dbConnection = new PDO('mysql:host=mysql.labranet.jamk.fi;dbname=N4927;charset=utf8',
        //          'N4927', 'DIc5AZVz0j65vZecRNxrAZI3dtwsMQAz');
        $this->dbConnection = new PDO('mysql:host=mysql.labranet.jamk.fi;dbname=N4927',  'N4927', 'DIc5AZVz0j65vZecRNxrAZI3dtwsMQAz');
        $this->dbConnection->exec('set names utf8');
        //$this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
        //$this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $ex) {
        echo "ErrMsg to enduser!<hr>";
        echo "CatchErrMsg: " . $ex->getMessage() . "<hr>";
        //logError($ex->getMessage());
    }
  }


  /******************************************  getCustomers   ******************************** *****/
  public function getCustomers($searchterm) {
    $customers = array();
    $sql = <<<EndOfSQL
      SELECT
        id,
        name,
        birth_date,
        DATE_FORMAT(created_at, "%d.%m.%Y %H:%i:%s") AS created_at
    FROM customer WHERE name
    LIKE :searchterm 
EndOfSQL;

    $resultObj = $this->dbConnection->prepare($sql);
    $resultObj->bindValue(':searchterm', "%$searchterm%", PDO::PARAM_STR);
    $resultObj->execute();

    while ($obj = $resultObj->fetch(PDO::FETCH_OBJ)) {
      $customers[] = $obj;
    }

    return $customers;
  }


  /******************************************  addCustomer   ***********************************/

  public function addCustomer($name, $birth_date) {
    $addResult = 0;


    $sql = <<<EndOfSQL
      INSERT INTO customer (name, birth_date, created_at)  VALUES
      (:name, :birth_date, (select now()))
EndOfSQL;


    $result = $this->dbConnection->prepare($sql);
    $result->bindValue(':name', $name, PDO::PARAM_STR);
    $result->bindValue(':birth_date', $birth_date, PDO::PARAM_STR);
    $result->execute(); 

    if ($result->rowCount() == 1) {
      $addResult = $this->dbConnection->lastInsertId();
    } else {
      $addResult = 0; // voi katsoa myös echo $this->dbConnection->error;
    }

    return $addResult;
  }
  
  /******************************************  editCustomer   ***********************************/
  
  public function editCustomer($id, $name, $birth_date) {
    $editResult = 0;


    $sql = <<<EOSql
      UPDATE customer 
      SET name = :name, birth_date = :birth_date 
      WHERE id = :id
EOSql;

    $result = $this->dbConnection->prepare($sql);
    $result->bindValue(':name', $name, PDO::PARAM_STR);
    $result->bindValue(':birth_date', $birth_date, PDO::PARAM_STR);
    $result->bindValue(':id', $id, PDO::PARAM_INT);
    $result->execute();

    if ($result->rowCount() == 1) {
        $editResult = true;
      } else {
        $editResult = 0; // voi katsoa myös echo $this->dbConnection->error;
      }
  
      return $editResult;
  }
  
  /******************************************  editCustomer   ***********************************/
  
  public function deleteCustomer($id) {
    $editResult = 0;

    $sql = <<<EOSql
      DELETE FROM customer  
      WHERE id = :id
EOSql;

    $result = $this->dbConnection->prepare($sql);
    $result->bindValue(':id', $id, PDO::PARAM_INT);
    $result->execute();

    if ($result->rowCount() == 1) {
        $editResult = true;
      } else {
        $editResult = 0; // voi katsoa myös echo $this->dbConnection->error;
      }
  
      return $editResult;
  }
}
