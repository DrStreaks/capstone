<?php
// This file will hold the different object definitions that will allow us to query the database and pull information we need
    
    // Include the database connection
    require_once("New folder/DatabaseConn.php"); 

    // People object
    class People {

        var $BannerId;
        var $FirstName;
        var $LastName;
		var $HasParkingPass;

        // Constructor
        function __construct($ID, $Name='Default', $Description='Default')
        {
            // Allow use of the mysqli connection
            global $conn;

            // Set member variables
            $this->ID = mysqli_real_escape_string($conn, $ID);
            $this->Name = mysqli_real_escape_string($conn, $Name);
            $this->Description = mysqli_real_escape_string($conn, $Description);
        }

        // Overloaded toString function
        public function __toString() {
            return "ID: $this->ID  Name: $this->Name  Description: $this->Description<br><br>";
        }

        // Function to create a service.
        function create_service()
        {
            // Allow use of the mysqli connection
            global $conn;

            // Build the SQL
            $sql = "INSERT INTO SERVICES (Name, Description) VALUES ('$this->Name', '$this->Description')";

            // Make the query
            if ($conn->query($sql) === TRUE) 
            {
                $this->ID = $conn->insert_id; // Set the ID of the record we just created
                return $this; // Return the record
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // Function to get a service.
        function get_service_by_id($ID)
        {
            // Allow use of the mysqli connection
            global $conn;

            // Escape user input
            $Escaped_ID = mysqli_real_escape_string($conn, $ID);

            // Build sql query
            $sql = "SELECT * FROM SERVICES WHERE ID='$Escaped_ID'";

            // Make the query
            $result = $conn->query($sql);

            // Output object
            $output = NULL;

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $output = new Services($row["ID"], $row["Name"], $row["Description"]); // Since ID is primary key, there will only be 1 or 0
                }
            }

            // Return the output
            return $output;
        }

        // Function to delete a service.
        function delete_service_by_id($ID)
        {
            global $conn;
            $Escaped_ID = mysqli_real_escape_string($conn, $ID);
            $sql = "DELETE FROM SERVICES WHERE ID='$Escaped_ID'";

            if ($conn->query($sql) === TRUE) 
            {
                return 1;
            } else {
                return 0;
            }
        }
    } 

	//Meter Object
    class Meter {

        var $MeterId;
        var $Building;
        var $BuildingId;
		var $Latitude;
		var $Longitude;
		var $Occupied;

        // Constructor
        function __construct($ID, $Name = 'Default', $Description = 'Default')
        {
            // Allow use of the mysqli connection
            global $conn;

            // Set member variables
            $this->ID = mysqli_real_escape_string($conn, $ID);
            $this->Name = mysqli_real_escape_string($conn, $Name);
            $this->Description = mysqli_real_escape_string($conn, $Description);
        }

        // Overloaded toString function
        public function __toString() {
            return "ID: $this->ID  Name: $this->Name  Description: $this->Description<br><br>";
        }

        // Function to create a service.
        function create_role()
        {
            // Allow use of the mysqli connection
            global $conn;

            // Build the SQL
            $sql = "INSERT INTO ROLES (Name, Description) VALUES ('$this->Name', '$this->Description')";

            // Make the query
            if ($conn->query($sql) === TRUE)
            {
                $this->ID = $conn->insert_id; // Set the ID of the record we just created
                return $this; // Return the record
            }
            else {
                echo "Error: ".$sql . "<br>".$conn->error;
            }
        }

        // Function to get a service.
        function get_role_by_id($ID)
        {
            // Allow use of the mysqli connection
            global $conn;

            // Escape user input
            $Escaped_ID = mysqli_real_escape_string($conn, $ID);

            // Build sql query
            $sql = "SELECT * FROM ROLES WHERE ID='$Escaped_ID'";

            // Make the query
            $result = $conn->query($sql);

            // Output object
            $output = NULL;

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $output = new Roles($row["ID"], $row["Name"], $row["Description"]); // Since ID is primary key, there will only be 1 or 0
                }
            }

            // Return the output
            return $output;
        }

        // Function to delete a role.
        function delete_role_by_id($ID)
        {
            global $conn;
            $Escaped_ID = mysqli_real_escape_string($conn, $ID);
            $sql = "DELETE FROM ROLES WHERE ID='$Escaped_ID'";

            if ($conn->query($sql) === TRUE) 
            {
                return 1;
            } else {
                return 0;
            }
        }
    }
    

	//Usage Object
    class Useage {
        
        var $TransactionId;
        var $BannerId;
        var $MeterId;
        var $StartTime;
        var $EndTime;
		var $TotalTime;

        // Constructor
        function __construct($ID, $AccountID = 'Default', $ServiceId = 'Default', $AppointmentDate = 'Default', $Status = 'Default' )
        {
            // Allow use of the mysqli connection
            global $conn;

         // Set member variables
            $this->ID = mysqli_real_escape_string($conn, $ID);
            $this->AccountID = mysqli_real_escape_string($conn, $AccountID);
            $this->ServiceId = mysqli_real_escape_string($conn, $ServiceId);
            $this->AppointmentDate = mysqli_real_escape_string($conn, $AppointmentDate);
            $this->Status = mysqli_real_escape_string($conn, $Status);
        }

        // Overload toString function
        public function __toString()
        {
            return "ID: $this->ID AccountID: $this->AccountID ServiceId: $this->ServiceId
            AppointmentDate: $this->AppointmentDate Status: $this->Status";
        }

        // Function to create a service
        function create_job()
        {
            // Allow use of the mysqli connection
            global $conn;

         // Build the SQL
            $sql = "INSERT INTO JOBS (AccountID, ServiceId, AppointmentDate, Status) VALUES ('$this->AccountID', 
            '$this->ServiceId', '$this->AppointmentDate', '$this->Status')";
        
        // Make the query
            if ($conn->query($sql) === TRUE)
            {
                $this->ID = $conn->insert_id; // Set the ID of the record we just created
                return $this; // Return the record
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // Function to get a service.
	    function get_job_by_id($ID)
	    {
		    // Allow use of the mysqli connection
	    	global $conn;

	    	// Escape user input
	    	$Escaped_ID = mysqli_real_escape_string($conn, $ID);

	    	// Build sql query
	    	$sql = "SELECT * FROM JOBS WHERE ID='$Escaped_ID'";

		    // Make the query
		    $result = $conn->query($sql);

		    // Output object
		    $output = NULL;

		    if ($result->num_rows > 0) {
		    	// output data of each row
		    	while ($row = $result->fetch_assoc()) {
		    		$output = new Jobs($row["ID"], $row["AccountID"], $row["ServiceId"], $row["AppointmentDate"], $row["Status"]); // Since ID is primary key, there will only be 1 or 0
		    	}
		    }

		    // Return the output
		    return $output;
        }

        // Function to delete a job.
        function delete_job_by_id($ID)
        {
            global $conn;
            $Escaped_ID = mysqli_real_escape_string($conn, $ID);
            $sql = "DELETE FROM JOBS WHERE ID='$Escaped_ID'";

            if ($conn->query($sql) === TRUE) 
            {
                return 1;
            } else {
                return 0;
            }
        }
    }

	//Building Object
    class Building {

        var $BuildingId;
        var $Building;
        var $Address;

        // Constructor
        function __construct($ID, $JobId, $Price, $MoneyReceived)
        {
            // Allow use of the mysqli connection
            global $conn;

            // Set member variables
            $this->ID = mysqli_real_escape_string($conn, $ID);
            $this->JobId = mysqli_real_escape_string($conn, $JobId);
            $this->Price = mysqli_real_escape_string($conn, $Price);
            $this->MoneyReceived = mysqli_real_escape_string($conn, $MoneyReceived);
        }

        // Overloaded toString function
        public function __toString() {
            return "ID: $this->ID  JobId: $this->JobId  Price: $this->Price  MoneyReceived: $this->MoneyReceived<br><br>";
        }

        // Function to create a service.
        function create_transaction()
        {
            // Allow use of the mysqli connection
            global $conn;

            // Build the SQL
            $sql = "INSERT INTO TRANSACTIONS (JobId, Price, MoneyReceived) VALUES ('$this->JobId', '$this->Price', '$this->MoneyReceived')";

            // Make the query
            if ($conn->query($sql) === TRUE) 
            {
                $this->ID = $conn->insert_id; // Set the ID of the record we just created
                return $this; // Return the record
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // Function to get a service.
        function get_transaction_by_id($ID)
        {
            // Allow use of the mysqli connection
            global $conn;

            // Escape user input
            $Escaped_ID = mysqli_real_escape_string($conn, $ID);

            // Build sql query
            $sql = "SELECT * FROM TRANSACTIONS WHERE ID='$Escaped_ID'";

            // Make the query
            $result = $conn->query($sql);

            // Output object
            $output = NULL;

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $output = new Services($row["ID"], $row["JobId"], $row["Price"], $row["MoneyReceived"]); // Since ID is primary key, there will only be 1 or 0
                }
            }

            // Return the output
            return $output;
        }

        // Function to delete a service.
        function delete_transaction_by_id($ID)
        {
            global $conn;
            $Escaped_ID = mysqli_real_escape_string($conn, $ID);
            $sql = "DELETE FROM TRANSACTIONS WHERE ID='$Escaped_ID'";

            if ($conn->query($sql) === TRUE) 
            {
                return 1;
            } else {
                return 0;
            }
        }
    } 
?>