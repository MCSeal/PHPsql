<?php 

    class crud{
        //private database object
        private $db;
        //constructor to intialize private variable to DB connection
        function __construct($conn){
            $this->db = $conn;
    
    
        }
        //function to create a new record
        //accesses data from success to 
        public function insert($fname, $lname, $dob, $email, $special){
            try {
                // sql insert statement into db
                $sql = "INSERT INTO attendee  VALUES (:fname, :lname, :dob, :email, :special)";
                //pdo statement will be passed to this, and will be executed... stmt and this will reference this.db which is assigned from the pdo
                //prepare takes the sql and prepares it for execution

                $stmt = $this->db->prepare($sql);
                //this binds the prameters to the statement, a type of sql injection prevention
                $stmt->bindParam(':fname', $fname);
                $stmt->bindParam(':lname', $lname);
                $stmt->bindParam(':dob', $dob);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':special', $special);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }



    }

?>