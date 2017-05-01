      <div id="page-wrapper">
           
            <div class="container-fluid">
               
                <!-- Page Heading -->
                <div class="row">
                    <form method="POST" enctype="multipart/form-data" action="<?php echo URL; ?>admin/administrateur" >
                        
                    <div class="col-md-6 col-md-offset-3">

                        <h1 class="page-header">
                            Users
                            <small>Subheading</small>
                        </h1>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" >
                        </div>

                        <div class="form-group">
                            <input type="submit" name="create" class="btn btn-primary pull right" >
                        </div>



                    </div>

                    </form>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->