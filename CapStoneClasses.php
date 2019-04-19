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
        function __construct($BannerId, $FirstName='Default', $LastName='Default', $HasParkingPass)
        {
            // Allow use of the mysqli connection
            global $conn;

            // Set member variables
            $this->BannerId = mysqli_real_escape_string($conn, $BannerId);
            $this->FirstName = mysqli_real_escape_string($conn, $FirstName);
            $this->LastName = mysqli_real_escape_string($conn, $LastName);
		    $this->HasParkingPass = mysqli_real_escape_string($conn, $HasParkingPass);
        }
		
		//MySql query of the database for BannerId
		function get_BannerId()
		{
			 // Allow use of the mysqli connection
            global $conn;
			
			$sql = "SELECT BannerId FROM People";
			$result = $conn->query($sql);

			//If statement checking to see if the number of rows queried is greater than 0
			if ($result->num_rows > 0) {
				$BannerId_array = array();
				// output data of each row
				while($row = $result->fetch_assoc($result)) {
					$BannerId_array[] = $row['BannerId'];
				}
				return $BannerId_array;
			} else {
				echo "0 results";
			}
		}
	

		//MySql query of the database for FirstName
		function get_FirstName()
		{
			 // Allow use of the mysqli connection
            global $conn;
			
			$sql = "SELECT FirstName FROM People";
			$result = $conn->query($sql);

			//If statement checking to see if the number of rows queried is greater than 0
			if ($result->num_rows > 0) {
				$FirstName_array = array();
				// output data of each row
				while($row = $result->fetch_assoc($result)) {
					$FirstName_array[] = $row['FirstName'];
				}
				return $FirstName_array;
			} else {
				echo "0 results";
			}
		}
		
		//MySql query of the database for LastName
		function get_LastName()
		{
			 // Allow use of the mysqli connection
            global $conn;
			
			$sql = "SELECT LastName FROM People";
			$result = $conn->query($sql);

			//If statement checking to see if the number of rows queried is greater than 0
			if ($result->num_rows > 0) {
				$LastName_array = array();
				// output data of each row
				while($row = $result->fetch_assoc($result)) {
					$LastName_array[] = $row['LastName'];
				}
				return $LastName_array;
			} else {
				echo "0 results";
			}
		}
		
		//MySql query of the database for HasParkingPass
		function get_HasParkingPass()
		{
			 // Allow use of the mysqli connection
            global $conn;
			
			$sql = "SELECT HasParkingPass FROM People";
			$result = $conn->query($sql);

			//If statement checking to see if the number of rows queried is greater than 0
			if ($result->num_rows > 0) {
				$HasParkingPass_array = array();
				// output data of each row
				while($row = $result->fetch_assoc($result)) {
					$HasParkingPass_array[] = $row['HasParkingPass'];
				}
				return $HasParkingPass_array;
			} else {
				echo "0 results";
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
        function __construct($MeterId, $Building = 'Default', $BuildingId, $Latitude, $Longitude, $Occupied)
        {
            // Allow use of the mysqli connection
            global $conn;

            // Set member variables
            $this->MeterId = mysqli_real_escape_string($conn, $MeterId);
            $this->Building = mysqli_real_escape_string($conn, $Building);
            $this->BuildingId = mysqli_real_escape_string($conn, $BuildingId);
			$this->Latitude = mysqli_real_escape_string($conn, $Latitude);
            $this->Longitude = mysqli_real_escape_string($conn, $Longitude);
            $this->Occupied = mysqli_real_escape_string($conn, $Occupied);
        }
		
		//MySql query of the database for MeterId
		function get_MeterId()
		{
			 // Allow use of the mysqli connection
            global $conn;
			
			$sql = "SELECT MeterId FROM Meter";
			$result = $conn->query($sql);

			//If statement checking to see if the number of rows queried is greater than 0
			if ($result->num_rows > 0) {
				$MeterId_array = array();
				// output data of each row
				while($row = $result->fetch_assoc($result)) {
					$MeterId_array[] = $row['MeterId'];
				}
				return $MeterId_array;
			} else {
				echo "0 results";
			}
		}
		
		//MySql query of the database for Building
		function get_Building()
		{
			 // Allow use of the mysqli connection
            global $conn;
			
			$sql = "SELECT Building FROM Meter";
			$result = $conn->query($sql);

			//If statement checking to see if the number of rows queried is greater than 0
			if ($result->num_rows > 0) {
				$Building_array = array();
				// output data of each row
				while($row = $result->fetch_assoc($result)) {
					$Building_array[] = $row['Building'];
				}
				return $Building_array;
			} else {
				echo "0 results";
			}
		}
		
		//MySql query of the database for BuildingId
		function get_BuildingId()
		{
			 // Allow use of the mysqli connection
            global $conn;
			
			$sql = "SELECT BuildingId FROM Meter";
			$result = $conn->query($sql);

			//If statement checking to see if the number of rows queried is greater than 0
			if ($result->num_rows > 0) {
				$BuildingId_array = array();
				// output data of each row
				while($row = $result->fetch_assoc($result)) {
					$BuildingId_array[] = $row['BuildingId'];
				}
				return $BuildingId_array;
			} else {
				echo "0 results";
			}
		}
		
		//MySql query of the database for Latitude
		function get_Latitude()
		{
			 // Allow use of the mysqli connection
            global $conn;
			
			$sql = "SELECT Latitude FROM Meter";
			$result = $conn->query($sql);

			//If statement checking to see if the number of rows queried is greater than 0
			if ($result->num_rows > 0) {
				$Latitude_array = array();
				// output data of each row
				while($row = $result->fetch_assoc($result)) {
					$Latitude_array[] = $row['Latitude'];
				}
				return $Latitude_array;
			} else {
				echo "0 results";
			}
		}
		
		//MySql query of the database for Longitude
		function get_Longitude()
		{
			 // Allow use of the mysqli connection
            global $conn;
			
			$sql = "SELECT Longitude FROM Meter";
			$result = $conn->query($sql);

			//If statement checking to see if the number of rows queried is greater than 0
			if ($result->num_rows > 0) {
				$Longitude_array = array();
				// output data of each row
				while($row = $result->fetch_assoc($result)) {
					$Longitude_array[] = $row['Longitude'];
				}
				return $Longitude_array;
			} else {
				echo "0 results";
			}
		}
		
		//MySql query of the database for Occupied
		function get_Occupied()
		{
			 // Allow use of the mysqli connection
            global $conn;
			
			$sql = "SELECT Occupied FROM Meter";
			$result = $conn->query($sql);

			//If statement checking to see if the number of rows queried is greater than 0
			if ($result->num_rows > 0) {
				$Occupied_array = array();
				// output data of each row
				while($row = $result->fetch_assoc($result)) {
					$Occupied_array[] = $row['Occupied'];
				}
				return $Occupied_array;
			} else {
				echo "0 results";
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
        function __construct($TransactionId, $BannerId, $MeterId, $StartTime, $EndTime,  $TotalTime)
        {
            // Allow use of the mysqli connection
            global $conn;

            // Set member variables
            $this->TransactionId = mysqli_real_escape_string($conn, $TransactionId);
            $this->BannerId = mysqli_real_escape_string($conn, $BannerId);
            $this->MeterId = mysqli_real_escape_string($conn, $MeterId);
            $this->StartTime = mysqli_real_escape_string($conn, $StartTime);
            $this->EndTime = mysqli_real_escape_string($conn, $EndTime);
			$this->TotalTime = mysqli_real_escape_string($conn, $TotalTime);
        }
		
		//MySql query of the database for TransactionId
		function get_TransactionId()
		{
			 // Allow use of the mysqli connection
            global $conn;
			
			$sql = "SELECT TransactionId FROM Useage";
			$result = $conn->query($sql);

			//If statement checking to see if the number of rows queried is greater than 0
			if ($result->num_rows > 0) {
				$TransactionId_array = array();
				// output data of each row
				while($row = $result->fetch_assoc($result)) {
					$TransactionId_array[] = $row['TransactionId'];
				}
				return $TransactionId_array;
			} else {
				echo "0 results";
			
    		}
		}
		
		//MySql query of the database for BannerId
		function get_BannerId()
		{
			 // Allow use of the mysqli connection
            global $conn;
			
			$sql = "SELECT BannerId FROM Useage";
			$result = $conn->query($sql);

			//If statement checking to see if the number of rows queried is greater than 0
			if ($result->num_rows > 0) {
				$BannerId_array = array();
				// output data of each row
				while($row = $result->fetch_assoc($result)) {
					$BannerId_array[] = $row['BannerId'];
				}
				return $BannerId_array;
			} else {
				echo "0 results";
			
    		}
		}
		
		//MySql query of the database for MeterId
		function get_MeterId()
		{
			 // Allow use of the mysqli connection
            global $conn;
			
			$sql = "SELECT MeterId FROM Useage";
			$result = $conn->query($sql);

			//If statement checking to see if the number of rows queried is greater than 0
			if ($result->num_rows > 0) {
				$MeterId_array = array();
				// output data of each row
				while($row = $result->fetch_assoc($result)) {
					$MeterId_array[] = $row['MeterId'];
				}
				return $MeterId_array;
			} else {
				echo "0 results";
			
    		}
		}
		
		//MySql query of the database for StartTime
		function get_StartTime()
		{
			 // Allow use of the mysqli connection
            global $conn;
			
			$sql = "SELECT StartTime FROM Useage";
			$result = $conn->query($sql);

			//If statement checking to see if the number of rows queried is greater than 0
			if ($result->num_rows > 0) {
				$StartTime_array = array();
				// output data of each row
				while($row = $result->fetch_assoc($result)) {
					$StartTime_array[] = $row['StartTime'];
				}
				return $StartTime_array;
			} else {
				echo "0 results";
			
    		}
		}
		
		//MySql query of the database for EndTime
		function get_EndTime()
		{
			 // Allow use of the mysqli connection
            global $conn;
			
			$sql = "SELECT EndTime FROM Useage";
			$result = $conn->query($sql);

			//If statement checking to see if the number of rows queried is greater than 0
			if ($result->num_rows > 0) {
				$EndTime_array = array();
				// output data of each row
				while($row = $result->fetch_assoc($result)) {
					$EndTime_array[] = $row['EndTime'];
				}
				return $EndTime_array;
			} else {
				echo "0 results";
			
    		}
		}
		
		//MySql query of the database for TotalTime
		function get_TotalTime()
		{
			 // Allow use of the mysqli connection
            global $conn;
			
			$sql = "SELECT TotalTime FROM Useage";
			$result = $conn->query($sql);

			//If statement checking to see if the number of rows queried is greater than 0
			if ($result->num_rows > 0) {
				$TotalTime_array = array();
				// output data of each row
				while($row = $result->fetch_assoc($result)) {
					$TotalTime_array[] = $row['TotalTime'];
				}
				return $TotalTime_array;
			} else {
				echo "0 results";
			
    		}
		}
	}

	//Building Object
    class Buildings {

        var $BuildingId;
        var $Building;
        var $Address;

        // Constructor
        function __construct($BuildingId, $Building = "Default", $Address = "Default")
        {
            // Allow use of the mysqli connection
            global $conn;

            // Set member variables
            $this->BuildingId = mysqli_real_escape_string($conn, $BuildingId);
            $this->Building = mysqli_real_escape_string($conn, $Building);
            $this->Address = mysqli_real_escape_string($conn, $Address);
        }
		
		//MySql query of the database for BuildingId
		function get_BuildingId()
		{
			 // Allow use of the mysqli connection
            global $conn;
			
			$sql = "SELECT BuildingId FROM Building";
			$result = $conn->query($sql);

			//If statement checking to see if the number of rows queried is greater than 0
			if ($result->num_rows > 0) {
				$BuildingId_array = array();
				// output data of each row
				while($row = $result->fetch_assoc($result)) {
					$BuildingId_array[] = $row['BuildingId'];
				}
				return $BuildingId_array;
			} else {
				echo "0 results";
			
    		}
		}
		
		//MySql query of the database for Building
		function get_Building()
		{
			 // Allow use of the mysqli connection
            global $conn;
			
			$sql = "SELECT Building FROM Building";
			$result = $conn->query($sql);

			//If statement checking to see if the number of rows queried is greater than 0
			if ($result->num_rows > 0) {
				$Building_array = array();
				// output data of each row
				while($row = $result->fetch_assoc($result)) {
					$Building_array[] = $row['Building'];
				}
				return $Building_array;
			} else {
				echo "0 results";
			
    		}
		}
		
		//MySql query of the database for Address
		function get_Address()
		{
			 // Allow use of the mysqli connection
            global $conn;
			
			$sql = "SELECT Address FROM Building";
			$result = $conn->query($sql);

			//If statement checking to see if the number of rows queried is greater than 0
			if ($result->num_rows > 0) {
				$Address_array = array();
				// output data of each row
				while($row = $result->fetch_assoc($result)) {
					$Address_array[] = $row['Address'];
				}
				return $Address_array;
			} else {
				echo "0 results";
			
    		}
		}

    } 

    class Json_conversion {

		var $Occupied;
        var $Building;
        var $Latitude;
        var $Longitude;
        var $Address;

        // Constructor
        function __construct($Building = "Default", $Address = "Default", $Occupied, $Latitude, $longitude)
        {
            // Allow use of the mysqli connection
            global $conn;

            // Set member variables
            $this->Occupied = mysqli_real_escape_string($conn, $Occupied);
            $this->Building = mysqli_real_escape_string($conn, $Building);
            $this->Address = mysqli_real_escape_string($conn, $Address);
			$this->Latitude = mysqli_real_escape_string($conn, $Latitude);
            $this->Longitude = mysqli_real_escape_string($conn, $Longitude);
        }
		
		//MySql query of the database for BuildingId
		function get_BuildingId()
		{
			 // Allow use of the mysqli connection
            global $conn;
			
			$sql = "SELECT Meter.Building, Meter.Occupied, Meter.Latitude, Meter.Longitude, Buildings.Address FROM Meter LEFT JOIN Buildings ON Buildings.Building=Meter.Building";
			$result = $conn->query($sql);

			//If statement checking to see if the number of rows queried is greater than 0
			if ($result->num_rows > 0) {
				$BuildingId_array = array();
				// output data of each row
				while($row = $result->fetch_assoc($result)) {
					$BuildingId_array[] = $row['BuildingId'];
				}
				return $BuildingId_array;
			} else {
				echo "0 results";
			
    		}
		}

    } 
?>