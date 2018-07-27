<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?php echo base_url().'apps';?>">Apps</a>
    </li>
    <li class="breadcrumb-item">
      <a href="<?php echo base_url().'dashboard/'.$this->uri->segment(2);?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">
      <span class="transaction_type"></span>s
    </li>
  </ol>
  <div class="row">
    <div class="col-xl-12 col-sm-12 mb-4">
      <?php echo $this->session->flashdata('trans_msg'); ?>
      <button class="btn btn-md btn-info pull-right" data-toggle="modal" data-target="#createMeetingModal" id="modalBtn"> <i class='fa fa-plus'></i> New <span class="transaction_type"></span> Group</button> 
    </div>
  </div>
  <div class="row">
    <div class="card mb-3 col-md-12">
      <div class="card-header">
        <i class="fa fa-table"></i> <span class="transaction_type"></span>s</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTableList" width="100%" cellspacing="0">
          </table>
        </div>
      </div>
      <div class="card-footer small text-muted">Updated at <?php echo date('d-F-Y h:i:s a'); ?></div>
    </div>
  </div>
</div>
<!-- /.container-fluid-->
<!--modals-->
<!--meetingModal-->
<div class="modal fade" id="createMeetingModal" tabindex="-1" role="dialog" aria-labelledby="createMeetingModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url().'create_group/'.$this->uri->segment(1).'/'.$this->uri->segment(2);?>" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Meeting Group</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label for="input_title">Title</label>
              <input class="form-control" id="input_title" type="text" aria-describedby="nameTitle" placeholder="Enter Title" name="title" required="">
            </div>
            <div class="form-group">
              <label for="input_phone">Description</label>
              <textarea class="form-control" id="input_description" aria-describedby=descriptionHelp" placeholder="Enter Description" cols="10" rows="4" name="description" required=""></textarea>
            </div>
            <div class="form-group">
              <label for="input_organizer">Organizer</label>
              <input class="form-control" id="input_organizer" type="text" aria-describedby="organizerHelp" placeholder="Enter Organizer" name="organizer" required="">
            </div>
            <div class="form-group">
              <label for="input_venue">Venue</label>
              <input class="form-control" id="input_venue" type="text" aria-describedby="nameVenue" placeholder="Enter Venue" name="venue" required="">
            </div>
            <div class="form-group">
              <label for="input_start_date">StartDate</label>
              <input class="form-control" id="input_start_date" type="date" aria-describedby="nameStartDate" placeholder="Enter StartDate" name="start_date" required="">
            </div>
            <div class="form-group">
              <label for="input_start_date">EndDate</label>
              <input class="form-control" id="input_end_date" type="date" aria-describedby="nameEndDate" placeholder="Enter EndDate" name="end_date" required="">
            </div>
            <div class="form-group">
              <label for="input_participants">Participants</label>
              <input class="form-control" id="input_participants" type="number" aria-describedby="nameParticipants" placeholder="Enter Participants" name="participants" required="">
            </div>
            <div class="form-group">
              <label for="input_facilitators">Facilitators</label>
              <input class="form-control" id="input_facilitators" type="text" aria-describedby="nameFacilitators" placeholder="Enter Facilitators" name="facilitators" required="">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--messageModal-->
<div class="modal fade" id="createMessageModal" tabindex="-1" role="dialog" aria-labelledby="createMessageModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url().'create_group/'.$this->uri->segment(1).'/'.$this->uri->segment(2);?>" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Message Group</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label for="input_name">Name</label>
              <input class="form-control" id="input_name" type="text" aria-describedby="nameHelp" placeholder="Enter App Name" name="name" required="">
            </div>
            <div class="form-group">
              <label for="input_phone">Description</label>
              <textarea class="form-control" id="input_description" aria-describedby=descriptionHelp" placeholder="Enter Description" cols="10" rows="4" name="description" required=""></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--paymentModal-->
<div class="modal fade" id="createPaymentModal" tabindex="-1" role="dialog" aria-labelledby="createPaymentModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url().'create_group/'.$this->uri->segment(1).'/'.$this->uri->segment(2);?>" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Payment App</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label for="input_name">Name</label>
              <input class="form-control" id="input_name" type="text" aria-describedby="nameHelp" placeholder="Enter Payment Name" name="name" required="">
            </div>
            <div class="form-group">
              <label for="input_phone">Description</label>
              <textarea class="form-control" id="input_description" aria-describedby=descriptionHelp" placeholder="Enter Description" cols="10" rows="4" name="description" required=""></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  var appID = "<?php echo ucwords($this->uri->segment(2)); ?>"
  var service = "<?php echo ucwords($this->uri->segment(1)); ?>"
  var dataURL = "../transactions/"+service+"/"+appID
  $(function(){
    //Add dynamic label based on service
    addLabel(".transaction_type", service)
    //Add target create modal button
    $("#modalBtn").attr("data-target", "#create"+service+"Modal")
    //Add table based on service
    $.getJSON(dataURL, function(jsondata){
      $('#dataTableList').dataTable(jsondata);
    });
  });

  function addLabel(className, label){
    $(className).text(label)
  }
</script>