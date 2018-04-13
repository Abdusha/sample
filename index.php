<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TP MOD 8 - {1301150053}</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap-4.0.0.css" rel="stylesheet">
    <link href="css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/jquery.dataTables.min.css" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <nav class="navbar">
          <a class="navbar-brand" href="#">
          <img src="images/logo.png" width="30" height="30" alt=""> TP Mod 8 {Abdurrahman Shaleh} {1301150053}
          </a>
        </nav>
    </nav>
      <div class="row">
          <div class="col-lg-8 ml-auto mr-auto">
          <h3>Data Pengguna</h3>
          <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Last Login</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include "config.php";
                    
                    $sql = mysqli_query($conn,"SELECT * FROM users INNER JOIN participants USING (id_users)");
                    // $row = mysqli_fetch_array($sql);
                    $no = 1;
                    while ($row = mysqli_fetch_array($sql)) {
                    // }
                ?>
                    <!-- Show data Here -->
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $row['username'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['gender'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['last_login'] ?></td>
                    <td>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del<?php $row['id_users'] ?>"><i class="fas fa-trash-alt"></i></button>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit<?php $row['id_users'] ?>"><i class="fas fa-edit"></i></button>
                    </td>
                </tr>
                 <div class="modal fade" id="edit<?php $row['id_users'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div> 
                      <div class="modal-body">
                        <h5 class="modal-title" id="exampleModalLabel">Data <?php echo $row['name'] ?></h5>
                              <!-- Insert Form here -->
                              <form method="POST" action="function.php">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" name="nama" value="<?php echo $row['name'] ?>">
                                      <!-- Create hidden input here to post id Users-->

                                      <input type="hidden" name="ubah" value="<?php echo $row['id_users']?>"> <!-- Hidden Input -->

                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Gender</label>
                                   <select class="form-control" id="exampleFormControlSelect1" name="gender">
                                      <option value=""> Select Gender</option>
                                      <option value="Laki-laki">Laki-laki</option>
                                      <option value="Perempuan">Perempuan</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">E-mail</label>
                                   <input type="text" class="form-control" name="email" value="<?php echo $row['email'] ?>">
                                  </div>
                                  <button type="submit" name="edit" class="btn btn-primary btn-block">Submit</button>
                                </form>                        
                            </div>
                    </div>
                  </div>
                </div>
                    <div class="modal fade" id="del<?php $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                         <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete <?php echo $row['name'] ?> ?</h5>
                      </div>
                      <div class="modal-footer">
                              <form method="POST" action="function.php">
                                  <!-- Create hidden input here to post id Users-->

                                  <input type="hidden" name="hapus" value="<?php echo $row['id_users']?>"> <!-- Hidden Input -->

                                <button type="submit" name="delete" class="btn btn-danger">YA</a>
                              </form>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">TIDAK</button>
                        
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                    $no = $no + 1;
                    }
                ?>
                
              </tbody>
            </table>
          </div>
      </div>
      
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed --> 
    <script src="js/popper.min.js"></script>
  <script src="js/bootstrap-4.0.0.js"></script>
  <script src="js/popper.min.js"></script>
      <script>
          $(document).ready(function() {
    $('#example').DataTable({
        "columns": [
            { "width": "1%"},
            null,
            null,
            null,
            null,
            null,
            { "width": "10%"}
            
            
  ]
    });
} );
      </script>
  </body>
</html>
