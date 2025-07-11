<?php 
include("../Assets/Connection/Connection.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Electrify - Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport"/>

    <link rel="icon" href="../Assets/Template/Admin/assets/img/kaiadmin/favicon.ico" type="image/x-icon"/>

    <!--Layer symbol -->
    <script src="../Assets/Template/Admin/assets/js/plugin/webfont/webfont.min.js"></script>

    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["../Assets/Template/Admin/assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="../Assets/Template/Admin/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../Assets/Template/Admin/assets/css/plugins.min.css" />
    <link rel="stylesheet" href="../Assets/Template/Admin/assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="../Assets/Template/Admin/assets/css/demo.css" />
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <div class="logo-header" data-background-color="dark">
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#base">
                  <i class="fas fa-layer-group"></i>
                  <p>Base</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="base">
                  <ul class="nav nav-collapse">
                    <li><a href="HomePage.php"><span class="sub-item">Home</span></a></li>
                    <li><a href="AddCustomer.php"><span class="sub-item">New Customer</span></a></li>
                    <li><a href="District.php"><span class="sub-item">District</span></a></li>
                    <li><a href="Place.php"><span class="sub-item">Place</span></a></li>
                    <li><a href="Brand.php"><span class="sub-item">Brand</span></a></li>
                    <li><a href="ECatogory.php"><span class="sub-item">Category</span></a></li>
                    <li><a href="Product.php"><span class="sub-item">Product</span></a></li>
                    <li><a href="ViewComplaint.php"><span class="sub-item">View Complaints</span></a></li>
                    <li><a href="ViewLiveReport.php"><span class="sub-item">View Live Report</span></a></li>
                    <li><a href="ViewReport.php"><span class="sub-item">View Report</span></a></li>
                    <li><a href="Viewfeedback.php"><span class="sub-item">View Feedback</span></a></li>
                    <li><a href="Logout.php"><span class="sub-item">Logout</span></a></li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- End Sidebar -->

      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <div class="logo-header" data-background-color="dark">
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div>
          </div>
          <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
            <div class="container-fluid">
              <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                <div class="input-group"></div>
              </nav>
              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <li class="nav-item topbar-user dropdown hidden-caret">
                  <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm">
                      <img src="../Assets/Template/Admin/assets/img/Admin.png" alt="..." class="avatar-img rounded-circle"/>
                    </div>
                    <span class="profile-username">
                      <span class="op-7">Admin</span>
                    </span>
                  </a>
                  <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                      <li><a class="dropdown-item" href="../Guest/Logout.php">Logout</a></li>
                    </div>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
        </div>
        
        <div class="container">
          <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
              <div>
                <h3 class="fw-bold mb-3">Admin Dashboard</h3>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                          <i class="fas fa-users"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Customers</p>
                          <?php
                            $selQry="select COUNT(*) as count from tbl_customer";
                            $result=$con->query($selQry);
                            $data=$result->fetch_assoc();
                            $totalcount=$data['count'];
                          ?>
                          <h4 class="card-title"><?php echo $totalcount ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div class="icon-big text-center icon-success bubble-shadow-small">
                          <i class="fas fa-luggage-cart"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Total Purchase Amount</p>
                          <?php
                            $selQry1="select SUM(purchase_amount) as totalamount from tbl_purchase";
                            $result1=$con->query($selQry1);
                            $data1=$result1->fetch_assoc();
                            $totalpurchase=$data1['totalamount'];
                          ?>
                          <h4 class="card-title"><?php echo $totalpurchase ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div class="icon-big text-center icon-secondary bubble-shadow-small">
                          <i class="far fa-check-circle"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Online Order</p>
                          <?php
                            $selQry2="select COUNT(user_id) as count from tbl_purchase where purchase_status='1'";
                            $result2=$con->query($selQry2);
                            $data2=$result2->fetch_assoc();
                            $totalcount2=$data2['count'];
                          ?>
                          <h4 class="card-title"><?php echo $totalcount2 ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
  <div class="col-md-4">
    <div class="card card-round">
      <div class="card-body">
        <div class="card-head-row card-tools-still-right">
          <div class="card-title">Customers</div>
        </div>
        <div class="table-responsive py-4" style="max-height: 300px; overflow-y: auto;">
          <table class="table table-bordered align-items-center mb-0">
            <thead class="thead-light">
              <tr>
                <th scope="col">SiNo.</th>
                <th scope="col">Name</th>
                <th scope="col" class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
                if (isset($_GET["delid"])) {
                  $del = "DELETE FROM tbl_customer WHERE customer_id=" . $_GET["delid"];
                  if ($con->query($del)) {
                    ?>
                    <script>
                      alert("Customer Removed..")
                    </script>
                    <?php
                  }
                }

                $i = 0;
                $selQry = "SELECT * FROM tbl_customer";
                $result = $con->query($selQry);

                while ($data = $result->fetch_assoc()) {
                  $i++;
              ?>
              <tr>
                <td class="text-center"><?php echo $i; ?></td>
                <td class="text-left"><?php echo htmlspecialchars($data["customer_name"]); ?></td>
                <td class="text-center">
                  <!-- Envelope Button -->
                  <button class="btn btn-icon btn-link op-8 me-1" title="Purchase">
                    <a href="searchproduct.php?cid=<?php echo $data["customer_id"] ?>"><i class="fas fa-shopping-cart"></i></a>
                  </button>
                  <!-- Ban Button -->
                  <button class="btn btn-icon btn-link btn-danger op-8" title="Delete User">
                    <a href="HomePage.php?delid=<?php echo $data["customer_id"] ?>"><i class="fas fa-ban" style="color:red"></i></a>
                  </button>
                </td>
              </tr>
              <?php
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  
  <div class="col-md-8">
    <div class="card card-round">
      <div class="card-header">
        <div class="card-head-row card-tools-still-right">
          <div class="card-title">Transaction History</div>
          <div class="card-tools">
            <div class="dropdown">
              <button class="btn btn-icon btn-clean me-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-h"></i>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive" style="overflow-x: auto; height:302px;">
          <table class="table align-items-center mb-0">
            <thead class="thead-light">
              <tr>
                <th scope="col">Customer Name</th>
                <th scope="col">Payment Number</th>
                <th scope="col" class="text-end">Date & Time</th>
                <th scope="col" class="text-end">Amount</th>
                <th scope="col" class="text-end">Status</th>
                <th scope="col" class="text-end">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $selQry = "SELECT * FROM tbl_purchase p INNER JOIN tbl_user d ON d.user_id = p.user_id";
                $result = $con->query($selQry);

                while ($data = $result->fetch_assoc()) {
              ?>
              <tr>
                <td><?php echo $data["user_name"]; ?></td>
                <td><?php echo $data["purchase_id"]; ?></td>
                <td class="text-end"><?php echo date("M d, Y, h:i a", strtotime($data["purchase_date"] . ' ' . $data["purchase_time"])); ?></td>
                <td class="text-end">$<?php echo number_format($data["purchase_amount"], 2); ?></td>
                <td class="text-end">
                  <?php
                    if ($data["purchase_status"] == 2) {
                      echo '<span class="badge" style="color: white; background-color: green;">Completed</span>';
                    } else {
                      echo '<span class="badge" style="color: black; background-color: red;">Pending</span>';
                    }
                  ?>
                </td>
                <td class="text-end">
                  <a href="ViewDetails.php?pid=<?php echo $data["purchase_id"]; ?>" class="btn btn-icon btn-link btn-primary">
                    <i class="fas fa-eye"></i>
                  </a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


    <!-- JS Files -->
    <script src="../Assets/Template/Admin/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="../Assets/Template/Admin/assets/js/core/popper.min.js"></script>
    <script src="../Assets/Template/Admin/assets/js/core/bootstrap.min.js"></script>
    <script src="../Assets/Template/Admin/assets/js/kaiadmin.min.js"></script>

  </body>
</html>
