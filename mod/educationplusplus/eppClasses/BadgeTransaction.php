<?php
	require_once 'Transaction.php';

	class BadgeTransaction extends Transaction {

    	//CONSTRUCTOR
    	function __construct( $id, $name, $pointsInvolved, $dateOfTransaction ){
    		parent::__construct( $id, $name, $pointsInvolved, $dateOfTransaction );
   		}

  		// DESTRUCTOR
		function __destruct() {
		   // Nothing to do here
		}
		
		// GETTER
		public function __get($property) {
			if (property_exists($this, $property)) {
				return $this->$property;
			}
		}
		public function parentGetter($var) {
			return parent::__get($var);
		}

		// SETTER
		public function __set($property, $value) {
			if (property_exists($this, $property)) {
				$this->$property = $value;
			}
			return $this;
		}
			 		 
		// TOSTRING: Prints a row
		public function __toString() {
			$stringToReturn = 	"<tr>
									<td style='width:25%'>
										<span class='badgeDate'>" . parent::__get("dateOfTransaction")->format('F jS Y') . "</span>
									</td>
									<td style='width:50%' class='badgeIndent'>
										<span class='badgeName'><span style='font-weight:bold'>Spent:</span> " . parent::__get("name") . "</span>
									</td>
									<td style='width:25%' class='badgeIndent'>
										<span class='badgePoints'>" . parent::__get("pointsInvolved") . "</span>
									</td>
								</tr>";
							   
			return $stringToReturn;
		} 
	}
?>