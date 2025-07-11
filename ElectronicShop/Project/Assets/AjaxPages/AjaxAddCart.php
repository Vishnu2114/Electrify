<?php
include("../Connection/Connection.php");
session_start();
$selqry="select * from tbl_purchase where user_id='".$_SESSION["uid"]."' and purchase_status='0'";
$result=$con->query($selqry);
if($result->num_rows>0)
{
	
	if($row=$result->fetch_assoc())
	{
		$pid = $row["purchase_id"];
		
		
			
		$selqry="select * from tbl_cart where purchase_id='".$pid."'and product_id='".$_GET["id"]."' and cart_status='0'";
		$result=$con->query($selqry);
		if($result->num_rows>0)
		{
			 echo "Already Added to Cart";
			
		}
		else
		{
			 $selqry1="select * from tbl_purchase where user_id='".$_SESSION["uid"]."' and purchase_status='0'";
			$result1=$con->query($selqry1);
			if($result1->num_rows>0)
			{
				$selqry="select MAX(purchase_id) as id from tbl_purchase";
				$res=$con->query($selqry);
				if($row=$res->fetch_assoc())
				{
		 			$insQry1="insert into tbl_cart(product_id,purchase_id)values('".$_GET["id"]."','".$row["id"]."')";
         			if($con->query($insQry1))
					  { 
						 echo "Added to Cart";
					  }
         			else
          			{
	    			 echo"Failed";
          			}
				}
			}
			else
			{
			$insqry="insert into tbl_purchase(user_id) value('".$_SESSION['uid']."')";
			if ($con->query($insqry))
			{
				$selqry="select MAX(purchase_id) as id from tbl_purchase";
				$res=$con->query($selqry);
				if($row=$res->fetch_assoc())
				{
		 			$insQry1="insert into tbl_cart(product_id,purchase_id)values('".$_GET["id"]."','".$row["id"]."')";
         			if($con->query($insQry1))
					  { 
						 echo "Added to Cart";
					  }
         			else
          			{
	    			 echo"Failed";
          			}
				}
		
			}
			}
		}	
	}
}
else
{
	$insqry="insert into tbl_purchase(user_id) value('".$_SESSION['uid']."')";
	if ($con->query($insqry))
	{
		 $selqry="select MAX(purchase_id) as id from tbl_purchase";
		$res=$con->query($selqry);
		if($row=$res->fetch_assoc())
		{
			$insqry1="insert into tbl_cart(product_id,purchase_id)values('".$_GET['id']."','".$row["id"]."')";
				if($con->query($insqry1))
				{
					echo "Added to Cart";
				}
				else
				{
					echo "Failed";
				}
		}
	}
}

?>