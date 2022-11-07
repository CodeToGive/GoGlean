  <div id="titleHeader">
       <div class="filter">
           <div>

           <h2 id="findOp">
           <b>Current requests</b>
           <p><i>Here are the current groups interested in your announcements:</i></p>
           </h2>
           </div>
       </div>
   </div>

  <div class="view-requests container" style="margin-top:-50px;">
    <div class="content">
      <table id="gleaning-requests" class="table">
          <tr>
              <td><b>Group Name</b></td>
              <td><b>Email</b></td>
              <td><b>Score</b></td>
              <td><b>Actions</b></td>
          </tr>
          <?php
            while ($c = $listApplications->fetch()) {

              $group = $db->prepare("SELECT * FROM users WHERE id = ?");
              $group->execute(array($c["group_id"]));
              $group = $group->fetch();

              $ads = $db->prepare("SELECT * FROM advertisements WHERE id = ?");
              $ads->execute(array($c["ads_id"]));
              $ads = $ads->fetch();

              ?>
              <tr>
                  <td><?= $group["name"] ?></td>
                  <td><?= $group["email"] ?></td>
                  <td>
                    <?php
                     if ($group["score"] != -1) {
                       $score = floor($group["score"]);
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
                  </td>
                  <td>
                    <form method="post">
                      <input type="hidden" name="id" value="<?= $c["id"] ?>">
                      <input type="submit" name="accept" value="Accept">
                      <input type="submit" name="refuse" value="Refuse">
                    </form>
                  </td>
              </tr>
          <?php } ?>
      </table>
    </div>

      <!--<div id="confirmation" class="confPopup">
          <div class="popupContent">
              <span class="cancelPopup">&times;</span>
              <p>Thank you! A confirmation email has been sent to both yours and the group's email adress.</p>
          </div>
      </div>-->

      <script>
          var popup = document.getElementById("confirmation");
          var btns = document.getElementsByClassName("confirm-request")
          for (var i = 0; i < btns.length; i++){
              btns[i].onclick = function(){
                  popup.style.display = "block";
              }
          }

          var span = document.getElementsByClassName("cancelPopup")
          span[0].addEventListener('click', function(){
          popup.style.display = "none";
          });

          btn.onclick = function(){
              popup.style.display ="block";
          }

          window.onclick = function(event){
              if (event.target == popup){
                  popup.style.display = "none";
              }
          }
      </script>


  </div>
