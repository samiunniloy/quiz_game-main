<?php
session_start();
include("../Html/conect.php");
?>
<?php

$sql11="select max(id) as id from quiz_table";
$res=mysqli_query($con,$sql11);
$row=mysqli_fetch_assoc($res);

$id=$row['id'];
$sql111="select * from quiz_table where id='$id'";
$res1=mysqli_query($con,$sql111);
$row1=mysqli_fetch_assoc($res1);
$title=$row1['title'];
$sno=$row1['q_id'];
$subj=$row1['subject'];



$sql="SELECT * FROM `ques` WHERE subj='$subj' and id<>all(SELECT `id` FROM `$id`)";
    $res=mysqli_query($con,$sql);
      $count=mysqli_num_rows($res);
      while($_rows=mysqli_fetch_assoc($res))
      {
        $ques=$_rows['ques'];
        $a=$_rows['a'];
        $b=$_rows['b'];
        $c=$_rows['c'];
        $d=$_rows['d'];
        $ans=$_rows['ans'];
        $sub=$_rows['subj'];
        $qid=$_rows['id'];
          ?>
          <html>
  <div>
  <table class="admin">
             <tr>
                 <th>Question</th>
                 <th>A </th>
                 <th>B</th>
                 <th>C</th>
                 <th>D</th>
                 <th>Answer</th>
                 
             </tr>          
</div>
 </html>
          
           <tr>
           <form action="" method="POST">
           
               <td><?php echo $ques; ?></td>
               <td><?php echo $a; ?></td>
               <td><?php echo $b; ?></td> 
               <td><?php echo $c; ?></td>
               <td><?php echo $d; ?></td> 
               <td><?php echo $ans; ?></td> 

                <input type="submit" name="add" value="Add" class="btn-second">
                <!-- <input type="submit" name="next" value="next" class="btn-second"> -->
                </form>
              <br>
              <br>
           </tr>
           <?php
          
if(isset($_POST["add"])){
           
      $sql12="INSERT INTO `$id`(`id`, `title`, `subj`) VALUES ('$qid','$title','$subj')";
        $res=mysqli_query($con,$sql12);
        header('location:ques_select.php');

      }
    }
?>