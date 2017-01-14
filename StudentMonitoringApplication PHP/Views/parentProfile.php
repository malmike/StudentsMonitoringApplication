<?php
    function parentProfile(){
        $kids = findStudents($_SESSION['SESS_ID']);
        $imageURI = "Images/Parents/".$_SESSION['SESS_USER_IMAGE'];
        
?> 

<main class="mdl-layout__content">
        <div class="page-content"><!-- Your content goes here -->
        <div class="container">
        <div class="classInfo" style="background-color:#eee">
        <!-- Square card -->
<style>
.demo-card-square.mdl-card {
  width: 240px;
  height: 120px;
}
.demo-card-square > .mdl-card__title {
  color: #fff;
  background:
    url('<?php echo $imageURI; ?>') bottom right 15% no-repeat #46B6AC;
}
</style>

<div class="demo-card-square mdl-card mdl-shadow--2dp">
  <div class="mdl-card__title mdl-card--expand">
    <h2 class="mdl-card__title-text"><?php echo $_SESSION['SESS_NAME']?></h2>
  </div>
  <div class="mdl-card__supporting-text">
    <?php echo $_SESSION['SESS_EMAIL']?> <?php echo $_SESSION['SESS_PHONE_NUMBER']?>
  </div>
  <div class="mdl-card__actions mdl-card--border">
    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
      View more
    </a>
  </div>
</div>
        
        <div class="smaContent">
        <div style="margin-left:25%">
        </br><h2 style="float:center; margin-left:30%; font-size:2em; color:#f50057">Kids</h2><br><br>
            <div class="mdl-grid">

            <?php 
                foreach($kids as $kid){
                    echo"<tr>
                    <div class='mdl-cell mdl-cell--6-col'><a style='text-decoration:none' href= ?action=studentProfile&&studentid={$kid['id']}><i class='material-icons'>account_circle</i></td>
						    <td><span style='color:#6a1b9a;font-size:bolder'>{$kid['sfname']} {$kid['slname']}</span></a></div>
						    
					    <tr>";
                }
                
            ?>
            </div>
            </div>
        </div>
        </div>
        </div>
        </div>
  </main>
    	
<?php
    }
?>