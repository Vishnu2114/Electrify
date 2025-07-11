<!DOCTYPE html>
<html lang="en">
  <head>
    
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

    <link rel="stylesheet" href="../Assets/Template/Admin/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../Assets/Template/Admin/assets/css/plugins.min.css" />
    <link rel="stylesheet" href="../Assets/Template/Admin/assets/css/kaiadmin.min.css" />
    <link rel="stylesheet" href="../Assets/Template/Main/form.css">

    
  </head>
  <body>
    <div class="wrapper">

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
                  <p>Data</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="base">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="HomePage.php">
                        <span class="sub-item">Home</span>
                      </a>
                    </li>
                    <li>
                      <a href="AddCustomer.php">
                        <span class="sub-item">New Customer</span>
                      </a>
                    </li>
                    <li>
                      <a href="District.php">
                        <span class="sub-item">District</span>
                      </a>
                    </li>
                    <li>
                      <a href="Place.php">
                        <span class="sub-item">Place</span>
                      </a>
                    </li>
                    <li>
                      <a href="Brand.php">
                        <span class="sub-item">Brand</span>
                      </a>
                    </li>
                    <li>
                      <a href="ECatogory.php">
                        <span class="sub-item">Category</span>
                      </a>
                    </li>
                    <li>
                      <a href="Product.php">
                        <span class="sub-item">Product</span>
                      </a>
                    </li>
                 
                    <li>
                      <a href="ViewComplaint.php">
                        <span class="sub-item">View Complaints</span>
                      </a>
                    </li>
                    <li>
                      <a href="ViewLiveReport.php">
                        <span class="sub-item">View Live Report</span>
                      </a>
                    </li>
                    <li>
                      <a href="Viewfeedback.php">
                        <span class="sub-item">View Feedback</span>
                      </a>
                    </li>
                    <li>
                      <a href="ViewReport.php">
                        <span class="sub-item">View Report</span>
                      </a>
                    </li>
                    
                  </ul>
                </div>
              </li>

            </ul>
          </div>
        </div>
      </div>

      
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

          <nav
            class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
          >
            <div class="container-fluid">
              <nav
                class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex"
              >
                <div class="input-group">
                  
                
                </div>
              </nav>

              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <li
                  class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none"
                >
                  <a
                    class="nav-link dropdown-toggle"
                    data-bs-toggle="dropdown"
                    href="#"
                    role="button"
                    aria-expanded="false"
                    aria-haspopup="true"
                  >
                    <i class="fa fa-search"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-search animated fadeIn">
                    <form class="navbar-left navbar-form nav-search">
                      <div class="input-group">
                        <input
                          type="text"
                          placeholder="Search ..."
                          class="form-control"
                        />
                      </div>
                    </form>
                  </ul>
                </li>

                <li class="nav-item topbar-user dropdown hidden-caret">
                  <a
                    class="dropdown-toggle profile-pic"
                    data-bs-toggle="dropdown"
                    href="#"
                    aria-expanded="false"
                  >
                    <div class="avatar-sm">
                      <img
                        src="../Assets/Template/Admin/assets/img/Admin.png"
                        alt="..."
                        class="avatar-img rounded-circle"
                      /> 
                    </div>
                    <span class="profile-username">
                      <span class="op-7">Admin</span>

                    </span>
                  </a>
                  
                </li>
              </ul>
            </div>
          </nav>

        </div>
        <style>
          .con {
            padding-top:100px;
          }
        </style>
        <div class="container">
        <div id="tab" align="center" class="con">