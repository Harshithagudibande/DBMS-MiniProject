<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location: ../");
    }
    $userdata = $_SESSION['userdata'];
    $groupsdata = $_SESSION['groupsdata'];
    if($userdata['status']==1){
        $status = '<b style="color: green">Voted</b>';
    }
    else{
        $status = '<b style="color: red">Not Voted</b>';
    }
?>

<html>
    <head>
        <title>Online registration-Dashboard</title>
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500&display=swap" rel="stylesheet">

        <!-- INTERNAL STYLES ARE APPLIED  -->
        <style>
            #profile{
                width:30%;
                float:left;
                background-color: white;
            }

            #group{
                width:60%;
                float:right;
                background-color: white;
            }
        </style>

    </head>
    <div class="mainSection">
        <div class="header section">
            <button class="back_btn">Back</button>
            <button class="log_out btn">Log out</button>
            <h1>Online voting system</h1>
            <hr>
        </div>
        <div id="profile">
        <center><img src="../uploads/<?php echo $userdata['photo']?>" height="200" width="200"></center><br>
        <b>Name:    </b><?php echo $userdata['name']?><br><br>
        <b>Mobile:  </b><?php echo $userdata['mobile']?><br><br>
        <b>Address: </b><?php echo $userdata['address']?><br><br>
        <b>Status:  </b><?php echo $status?><br><br>


        </div>
        <div id="group">
        <?php 
            if($_SESSION['groupsdata']){
                for($i=0; $i<count($groupsdata); $i++){
                    ?>
                    <div>
                    <img style="float:right" src="../uploads/ <?php echo $groupsdata[$i]['photo'] ?>" height="125px" width="125px">    
                    <b>group Name:  </b><?php echo $groupsdata[$i]['name'] ?><br><br>   
                    <b>Votes:    </b><?php echo $groupsdata[$i]['votes'] ?><br><br> 
                    <form action="../api/vote.php" method="POST">
                        <input type="hidden" name="gid" value="">
                        <input type="hidden" name="gvotes" value="">
                        <?php
                        if ($_SESSION['userdata']['status'] == 0) {

                            ?>
                       <input type="submit" name="votebn" value="vote" id="votebn">
                       <?php
                        }
                        else{
                        ?>
                       <button disabled type="button" name="votebn" value="vote" id="voted"></button>
                       <?php
                        }
                        ?>    

                        
                    </form>
                    </div>
                    <?php
                }

            }
            else{

            }
        ?>

        

        </div>
        
    </div>
   
    
    
    
</html>