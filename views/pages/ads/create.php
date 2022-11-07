<div id="titleHeader">
     <div class="filter">
         <h2 id="findOp">
           <b>Create gleaning opportunity</b>
         </h2>
     </div>
 </div>

<div class="container" style="margin-top:-50px;">

<div class="content" style="margin-top:10px;">
  <?php if(isset($message) AND !empty($message)) { ?>
    <div class="alert alert-danger">
      <?= $message ?>
    </div>
  <?php } ?>

  <form method="post">

    <div class="row">
      <div class="col-lg-6">
        <label for="username" style="margin-top:0px;">Start date <span class="required">*</span></label>
        <input type="date" name="date_begin" class="form-control">
      </div>
      <div class="col-lg-6">
        <label for="username" style="margin-top:0px;">End date <span class="required">*</span></label>
        <input type="date" name="date_end" class="form-control">
      </div>
    </div>



    <div class="row">
      <div class="col-lg-6">
        <label for="minimum">Capacity <i style="font-weight:normal;">(people required)</i> <span class="required">*</span></label>
        <input type="number" name="minimum" placeholder="0" class="form-control">
      </div>
      <div class="col-lg-6">
        <label for="urgent">Urgency <span class="required">*</span></label>
        <select class="form-control" name="urgent" id="urgent">
          <option value="0">Not urgent</option>
          <option value="1">Urgent</option>
          <option value="2">Very urgent</option>
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-9">
        <label for="harvest">Type of product <i style="font-weight:normal;">(separate by a coma)</i> <span class="required">*</span></label>
        <input type="text" name="harvest" placeholder="potato, apple, tomato" class="form-control">
      </div>
      <div class="col-lg-3">
        <label for="harvest">Quantity estimation</label>
        <input type="number" name="quantity" placeholder="0" class="form-control">
      </div>
    </div>

    <div class="row">
      <div class="col-lg-9">

      </div>
      <div class="col-lg-3">
        <input type="submit" name="sendAdd" value="Create" class="btn btn-submit">
      </div>
    </div>
  </form>
</div>
</div>
