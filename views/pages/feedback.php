<div id="titleHeader">
     <div class="filter">
         <h2 id="findOp">
           <b>FeedBack</b>
         </h2>
     </div>
 </div>
 <div class="container" style="margin-top:-50px;">

       <div class="content">
          <form method="post">
            <div class="row">

              <?php if ($user["type"] != 1) { ?>
                <div class="col-lg-6">
                  <h3>Score for Gleaner Team (/5)</h3>
                  <input type="number" name="scoreGleaner" class="form-control" placeholder="Your score">
                  <textarea name="commentGleaner" rows="8" class="form-control" style="margin-top:20px;" placeholder="Your comment"></textarea>
                </div>
              <?php } ?>

              <?php if ($user["type"] != 2) { ?>
                <div class="col-lg-6">
                  <h3>Score for Farmer (/5)</h3>
                  <input type="number" name="scoreFarmer" class="form-control" placeholder="Your score">
                  <textarea name="commentFarmer" rows="8" class="form-control" style="margin-top:20px;" placeholder="Your comment"></textarea>
                </div>
              <?php } ?>

              <?php if ($user["type"] != 3) { ?>
                <div class="col-lg-6">
                  <h3>Score for FoodBank (/5)</h3>
                  <input type="number" name="scoreFoodBank" class="form-control" placeholder="Your score">
                  <textarea name="commentFoodbank" rows="8" class="form-control" style="margin-top:20px;" placeholder="Your comment"></textarea>
                </div>
              <?php } ?>

              <div class="col-lg-9">
              </div>
              <div class="col-lg-3">
                <input type="submit" name="scoreSendFarmer" value="Send" class="btn btn-submit">
              </div>
            </div>
          </form>
       </div>
     </div>

 </div>
