<?php
require('top.inc.php');
if($_SESSION['ROLE']!=1){
	header('location:add_employee.php?id='.$_SESSION['USER_ID']);
	die();
}
if(isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	mysqli_query($con,"delete from employee where id='$id'");
}
$res=mysqli_query($con,"select * from employee where role=2 order by id desc");
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Employee Master </h4>
						         <h4 class="box_title_link"><a class="btn btn-info" href="add_employee.php">Add Employee</a> </h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th width="5%">S.No</th>
                                       <th width="5%">ID</th>
                                       <th width="10%">Name</th>
									            <th width="15%">Email</th>
									            <th width="15%">Mobile</th>
                                       <th width="20%"></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
									          $i=1;
									          while($row=mysqli_fetch_assoc($res)){?>
									         <tr>
                                       <td><?= $i?></td>
									            <td><?= $row['id']?></td>
                                       <td><?= $row['name']?></td>
									            <td><?= $row['email']?></td>
									            <td><?= $row['mobile']?></td>
									            <td><a class="btn btn-success" href="add_employee.php?id=<?= $row['id']?>">Edit</a> <a class="btn btn-danger" href="employee.php?id=<?= $row['id']?>&type=delete">Delete</a></td>
                                    </tr>
									         <?php 
									          $i++;
									           } ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
	</div>
         
<?php
require('footer.inc.php');
?>