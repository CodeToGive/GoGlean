<div class="list-gleaning">
<div id="titleHeader">
     <div class="filter">
         <div>

         <h2 id="findOp">
         <b>Find Gleaning opportunities</b>
         </h2>
         </div>
     </div>
   </div>


   <div class="container" style="margin-top:-50px;">
     <div class="row">
       <div class="col-lg-4">

         <div class="content">
           <h3 style="margin-top:-10px;font-size:20px;">
             Filters
             <span class="required right" style="font-size:15px;font-weight:normal;padding-top:5px;">
               Clear
             </span>
           </h3>
           <div class="row">
             <div class="col-lg-6">
               <input type="text" name="" class="form-control" placeholder="Group size">
             </div>
             <div class="col-lg-6">
               <input type="text" name="" class="form-control" placeholder="Location">
             </div>
           </div>
         </div>

         <h2 style="font-weight:bold;font-size:20px;margin-top:20px;margin-bottom:-15px;">Gleaning opportunities</h2>

         <?php

          while($c = $choose->fetch()) {
            $req = $db->prepare("SELECT * FROM users WHERE id = ?");
            $req->execute(array($c["user_id"]));
            $farmer = $req->fetch();

            $req = $db->prepare("SELECT COUNT(*) AS nb FROM applications WHERE group_id = ? AND ads_id = ?");
            $req->execute(array($_SESSION["id"], intval($c["id"])));
            $req = $req->fetch();

            if ($req["nb"] < 1) {
            ?>

           <div class="content content-choose">
             <h4>
               <?= $farmer["name"] ?> <i style="font-weight:normal;">(<?= json_decode($farmer["address"])->city ?>)</i>
               <span class="right badge badge-color">
                 <svg xmlns="http://www.w3.org/2000/svg" width="12.5" height="12.5" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                  </svg>
                  <?= $c["minimum"] ?>
                </span>
             </h4>

             <div class="row">
               <div class="col-lg-8">
                 <div class="sub-content" style="color:black;">
                   Harvest : <i><?= $c["harvest"] ?></i>
                 </div>
               </div>
               <div class="col-lg-4">
                  <div class="sub-content" style="padding-left:0px;padding-right:0px;background:#fff;text-align:right;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12.5" height="12.5" fill="currentColor" class="bi bi-calendar-event-fill" viewBox="0 0 16 16">
                     <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
                   </svg>
                     <?= explode(" ", $c["begin_date"])[0] ?>
                  </div>
               </div>
             </div>

             <div class="row">
               <div class="col-lg-6">
                 <div class="stars">
                   <?php
                    if ($farmer["score"] != -1) {
                      $score = floor($farmer["score"]);
                      $scoreReverse = 5 - $score;
                      while ($score > 0) {
                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#FDCC0D" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>';
                        $score--;
                      }
                      while ($scoreReverse > 0) {
                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="rgba(0,0,0,.08)" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>';
                        $scoreReverse--;
                      }
                    } else {
                      echo "<span class='required'>New !</span>";
                    }
                   ?>
                 </div>
               </div>
               <div class="col-lg-6">
                 <form method="post">
                   <input type="hidden" name="id" value="<?= $c["id"] ?>">
                   <input type="submit" name="sendChoose" value="Apply" class="btn btn-submit" style="margin-top:10px;">
                 </form>
               </div>
             </div>

           </div>

         <?php } } ?>
         <style media="screen">
          .content-choose {
            padding: 15px;
          }
          .stars {
            padding: 5px;
            margin-top: 10px;
          }
          .content-choose .sub-content {
            background-color: rgba(0,0,0,.01);
            padding: 5px;
            border-radius: 3px;
          }
           .content-choose h4 {
             color:black;
             font-weight: bold;
             font-size: 17.5px;
             text-transform: capitalize;
           }
           .badge-color {
             background-color: rgba(39,173,96,.3)!important;
             color:rgba(39,173,96,1)!important;
             font-weight: bold;
             font-size: 12.5px;
           }
         </style>
       </div>
       <div class="col-lg-8">
         <div class="content">

           <!-- NOT WORKING (due to time) -->
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d89192.92667168059!2d-73.30633265853166!3d45.68537352690693!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc8f892a27fcecd%3A0x18028363ef15b870!2sSaint-Marc-sur-Richelieu%2C%20QC!5e0!3m2!1sfr!2sca!4v1667781286907!5m2!1sfr!2sca" width="100%" height="450" style="border:0;border-radius:3px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

         </div>
       </div>
     </div>
   </div>

<!-- The Modal -->
<div id="myModal" class="modal">

 <!-- Modal content -->
 <div class="modal-content">
   <span class="close">&times;</span>
   <p>Thank you for showing interest in this event!<br> A confirmation
     email will be sent as soon as the farmer has accepted your event.
   </p>
 </div>

</div>
<script>
 // Get the modal
 var modal = document.getElementById("myModal");

 // Get the button that opens the modal
 var btns = document.getElementsByClassName("request");
 for (var i = 0; i < btns.length; i++) {
     btns[i].onclick = function() {
     modal.style.display = "block";
     }
 }

 // Get the <span> element that closes the modal
 var span = document.getElementsByClassName("close")
 span[0].addEventListener('click',function(){
 modal.style.display = "none";
 });

 // When the user clicks the button, open the modal
 btn.onclick = function() {
   modal.style.display = "block";
 }

 // When the user clicks anywhere outside of the modal, close it
 window.onclick = function(event) {
   if (event.target == modal) {
     modal.style.display = "none";
   }
 }
 </script>
 </div>
