<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin
                            <small>Subheading</small>
                        </h1>              
                            
                         <?php 

                         // $user = new User();

                         // $user->username = "Suave The thirdd";   
                         // $user->password = "Rico LssAST ";   
                         // $user->first_name = "Johns";   
                         // $user->last_name = "Doea";

                         // $user->create();   
                            
                         // $user = User::find_user_by_id(15);
                         // $user->delete();

                         $user = User::find_user_by_id(14);

                         $user->username = "qwert"; 
                         $user->save();

                         // $user = new User();

                         // $user->username = "Suave"; 
                         // $user->save();

                          ?>               

                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
