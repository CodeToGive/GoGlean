<div class="container">

<div class="content" style="margin-top:10px;">
  <?php if(isset($message) AND !empty($message)) { ?>
    <div class="alert alert-danger">
      <?= $message ?>
    </div>
  <?php } ?>

  <form method="post">

    <div class="row">
      <div class="col-lg-6">
        <label for="username" style="margin-top:0px;">Begin date <span class="required">*</span></label>
        <input type="date" name="date_begin" class="form-control">
      </div>
      <div class="col-lg-6">
        <label for="username" style="margin-top:0px;">End date <span class="required">*</span></label>
        <input type="date" name="date_end" class="form-control">
      </div>
    </div>



    <div class="row">
      <div class="col-lg-6">
        <label for="quantity">Number of people <span class="required">*</span></label>
        <input type="number" name="quantity" placeholder="0" class="form-control">
      </div>
      <div class="col-lg-6">
        <label for="urgent">Urgency <span class="required">*</span></label>
        <select class="form-control" name="urgent" id="urgent">
          <option value="0">Normal</option>
          <option value="1">Urgent</option>
          <option value="2">Very urgent</option>
        </select>
      </div>
    </div>

    <label for="harvest">What to harvest <i style="font-weight:normal;">(separate by a coma)</i> <span class="required">*</span></label>
    <input type="text" name="harvest" placeholder="potato, apple, tomato" class="form-control">

    <div class="row">
      <div class="col-lg-9">

      </div>
      <div class="col-lg-3">
        <input type="submit" name="sendAdd" value="Add" class="btn btn-submit">
      </div>
    </div>
  </form>
</div>
</div>
