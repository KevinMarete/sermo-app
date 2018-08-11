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
    <div class="col-md-12">
      <div class="float-left"> Wallet Balance: <b>KES.<span class="wallet_bal"><?php echo number_format($wallet_balance); ?></span></b></div>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-12 col-sm-12 mb-4">
      <?php echo $this->session->flashdata('trans_msg'); ?>
      <button class="btn btn-md btn-info pull-right" data-toggle="modal" data-target="#createMeetingModal" id="modalBtn"> <i class='fa fa-plus'></i> New <span class="transaction_type"></span></button> 
    </div>
  </div>
  <div class="row">
    <div class="card mb-3 col-md-12">
      <div class="card-header">
        <i class="fa fa-table"></i> <span class="transaction_type"></span>s</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-condensed" id="dataTableList" width="100%" cellspacing="0">
            <thead></thead>
            <tbody></tbody>
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
        <div class="modal-body row">
            <div class="form-group col-sm-12">
              <label for="input_title">Title</label>
              <input class="form-control" id="input_title" type="text" aria-describedby="nameTitle" placeholder="Enter Title" name="title" required="">
            </div>
            <div class="form-group col-sm-12">
              <label for="input_phone">Description</label>
              <textarea class="form-control" id="input_description" aria-describedby=descriptionHelp" placeholder="Enter Description" cols="10" rows="4" name="description" required=""></textarea>
            </div>
            <div class="form-group col-sm-6">
              <label for="input_organizer">Organizer</label>
              <input class="form-control" id="input_organizer" type="text" aria-describedby="organizerHelp" placeholder="Enter Organizer" name="organizer" required="">
            </div>
            <div class="form-group col-sm-6">
              <label for="input_venue">Venue</label>
              <input class="form-control" id="input_venue" type="text" aria-describedby="nameVenue" placeholder="Enter Venue" name="venue" required="">
            </div>
            <div class="form-group col-sm-6">
              <label for="input_start_date">StartDate</label>
              <input class="form-control" id="input_start_date" type="date" aria-describedby="nameStartDate" placeholder="Enter StartDate" name="start_date" required="">
            </div>
            <div class="form-group col-sm-6">
              <label for="input_start_date">EndDate</label>
              <input class="form-control" id="input_end_date" type="date" aria-describedby="nameEndDate" placeholder="Enter EndDate" name="end_date" required="">
            </div>
            <div class="form-group col-sm-6">
              <label for="input_participants">Expected No. of Participants</label>

              <input class="form-control" id="input_participants" type="number" aria-describedby="nameParticipants" placeholder="Enter Participants" name="participants" required="" cata-toggle="tooltip" data-placement="top" title="Alert! You have exceeded the app wallet balance">
            </div>
            <div class="form-group col-sm-6">
              <label for="input_facilitators">Facilitators</label>
              <input class="form-control" id="input_facilitators" type="text" aria-describedby="nameFacilitators" placeholder="Enter Facilitators" name="facilitators" required="">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="message_grp_btn" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
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
              <input class="form-control" id="input_name" type="text" aria-describedby="nameHelp" placeholder="Enter Message Name" name="name" required="">
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
<!--participantModal-->
<div class="modal fade" id="participantModal" tabindex="-1" role="dialog" aria-labelledby="participantModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Participant List</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body container-fluid">
          <div class="row">
            <div class="form-group col-md-5">
              <label for="participant_pname">Name</label>
              <input class="form-control" id="participant_name" type="text" aria-describedby="nameHelp" placeholder="Enter Participant Name" name="name" cata-toggle="tooltip" data-placement="top" title="Required! Participant Name">
            </div>
            <div class="form-group col-md-5">
              <label for="participant_phone">Phone</label>
              <input class="form-control" id="participant_phone" type="text" aria-describedby="nameHelp" placeholder="Enter Participant Phone" name="phone" cata-toggle="tooltip" data-placement="top" title="Required! Participant Phone">
            </div>
            <div class="form-group col-md-2">
              <label for="participant_savebtn">#</label>
              <button type="button" class="form-control btn btn-success btn-md" id="participant_savebtn"> <i class='fa fa-plus'></i> Save</button> 
            </div>
          </div>
          <div class="row">
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-condensed" id="participant_tbl">
                <caption>Participant List-<span id="participant_meeting_code"></span></caption>
                <thead>
                  <th>#</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Options</th>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="participant_download"><i class="fa fa-download"></i> Download</button>
        </div>
    </div>
  </div>
</div>
<!--payeeModal-->
<div class="modal fade" id="payeeModal" tabindex="-1" role="dialog" aria-labelledby="payeeModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Payee List</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body container-fluid">
          <div class="row">
            <div class="form-group col-md-12">
              <span id="payee_msg"></span>
            </div>
            <div class="form-group col-md-6">
              <div class="target alert alert-warning"></div>
            </div>
            <div class="form-group col-md-6">
              <label for="meeting_grps"><b>Meeting Groups</b></label>
              <select class="form-control" id="meeting_grps"></select>
              <button type="button" class="form-control btn btn-success btn-md" id="meeting_grp_importbtn"> <i class='fa fa-download'></i> Import</button> 
            </div>
          </div>
          <div class="row">
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-condensed" id="payee_tbl">
                <caption>Payee List>-<span id="payee_payment_code"></span></caption>
                <thead>
                  <th>#</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Amount</th>
                  <th>Options</th>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-info" id="proceed_to_payment"><i class="fa fa-dollar"></i> Proceed To Payment</button>
        </div>
    </div>
  </div>
</div>
<!--paidModal-->
<div class="modal fade" id="paidModal" tabindex="-1" role="dialog" aria-labelledby="paidModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Paid List</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body container-fluid">
          <div class="row">
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-condensed" id="paid_tbl">
                <caption>Paid List-<span id="paid_payment_code"></span></caption>
                <thead>
                  <th>#</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Amount</th>
                  <th>Status</th>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>
<!--recipientModal-->
<div class="modal fade" id="recipientModal" tabindex="-1" role="dialog" aria-labelledby="recipientModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Recipient List</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body container-fluid">
          <div class="row">
            <div class="form-group col-md-12">
              <span id="recipient_msg"></span>
            </div>
            <div class="form-group col-md-12">
              <div class="target_msg alert alert-warning"></div>
            </div>
            <div class="form-group col-md-8">
              <label for="meeting_grps"><b>Message Builder</b></label>
              <textarea class="form-control txtDropTarget" id="message_box" cols="30" rows="3"> </textarea>
            </div>
            <div class="form-group col-md-4">
              <label for="meeting_grps"><b>Message Variables</b></label>
              <ul id="DragWordList"></ul>
            </div>
          </div>
          <div class="row">
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-condensed" id="recipient_tbl">
                <caption>Recipient List>-<span id="recipient_message_code"></span></caption>
                <thead></thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success" id="proceed_to_send"><i class="fa fa-share-square"></i> Proceed To Send</button>
        </div>
    </div>
  </div>
</div>
<!--sentModal-->
<div class="modal fade" id="sentModal" tabindex="-1" role="dialog" aria-labelledby="sentModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sent List</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body container-fluid">
          <div class="row">
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-condensed" id="messages_tbl">
                <caption>Sent List-<span id="sent_message_code"></span></caption>
                <thead>
                  <th>#</th>
                  <th>Phone</th>
                  <th>Message</th>
                  <th>Status</th>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  var appID = "<?php echo ucwords($this->uri->segment(2)); ?>"
  var service = "<?php echo ucwords($this->uri->segment(1)); ?>"
  var dataURL = "../transactions/"+service+"/"+appID
  var editParticipantURL = "../manage_participant"
  var addParticipantURL = "../add_participant"
  var participantURL = "../participants/"
  var payeeURL = "../payees/"
  var editTransactionURL = "../manage_transaction/"+service.toLowerCase()
  var editPayeeURL = "../manage_payee"
  var payeeuploadURL = "../payee_upload"
  var paiduploadURL = "../paid_upload"
  var paidURL = "../paid/"
  var recipientURL = "../recipients/"
  var messageURL = "../messages/"
  var meetingsURL = "../meetings/"+appID
  var importParticipantURL = "../import_participants"
  var recipientuploadURL = "../recipient_upload"
  var editRecipientURL = "../manage_recipients"
  var messageuploadURL = "../message_upload"
  var table = '';
  var code = ""
  var columns = {
    'meeting': {identifier: [5, 'id'], editable: [[1, 'description'], [2, 'end_date'], [3, 'exp_participants'], [4, 'facilitators'], [6, 'name'], [7, 'organizer'], [8, 'start_date'], [9, 'venue']]},
    'message': {identifier: [2, 'id'], editable: [[1, 'description'], [3, 'name']]},
    'payment': {identifier: [3, 'id'], editable: [[2, 'description'], [4, 'name']]}
  }
  $(function(){
    //Add dynamic label based on service
    addLabel(".transaction_type", service)
    //Add target create modal button
    $("#modalBtn").attr("data-target", "#create"+service+"Modal")
    //Add table based on service
    getTransactions(dataURL, columns[service.toLowerCase()])
    //Load Participants when Modal shown
    $("#participantModal").on("show.bs.modal", function(e) {
      code = $(e.relatedTarget).data('code');
      getParticipants(participantURL+code)
    });
    //Load Payees when Modal shown
    $("#payeeModal").on("show.bs.modal", function(e) {
      code = $(e.relatedTarget).data('code');
      getMeetings(meetingsURL)
      getPayees(payeeURL+code)
    });
    //Load Paid when Modal shown
    $("#paidModal").on("show.bs.modal", function(e) {
      code = $(e.relatedTarget).data('code');
      getPaid(paidURL+code)
    });
    //Load Recipients when Modal shown
    $("#recipientModal").on("show.bs.modal", function(e) {
      code = $(e.relatedTarget).data('code');
      getRecipients(recipientURL+code)
    });
    //Load Messages when Modal shown
    $("#sentModal").on("show.bs.modal", function(e) {
      code = $(e.relatedTarget).data('code');
      getMessages(messageURL+code)
    });
    //Check balance limit
    $("#input_participants").on('keyup', function(){
      $("#message_grp_btn").attr("disabled", false);
      var wallet_bal = $(".wallet_bal").text().replace(',', '')
      var participants = $(this).val();
      var participant_rate = 5;
      if ((participant_rate * participants) > wallet_bal){
        $("#message_grp_btn").attr("disabled", true);
        $('#input_participants').tooltip('show');
      }
    });
    //Save new participant
    $('#participant_savebtn').click(function(){
      var name = $("#participant_name").val()
      var phone = $("#participant_phone").val()
      //Validate fields not empty
      if(name == ''){
        $('#participant_name').tooltip('show');
      }if(phone == ''){
        $('#participant_phone').tooltip('show');
      }else{
        $.post(addParticipantURL, {'name': name, 'phone': phone, 'code': code}, function(){
          $("#participant_name").val('')
          $("#participant_phone").val('')
          getParticipants(participantURL+code)
        });
      }
    });
    //Download partifcipant list
    $("#participant_download").click(function(){
      $("#participant_tbl").tableToCSV();
    });
    //Make payment to payees
    $("#proceed_to_payment").click(function(){
      swal({
        title: "Are you sure?",
        text: "Your will not be able to recover payments made!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.post(paiduploadURL, {'payment_code': code}, function(jsondata){
            var data = $.parseJSON(jsondata);
            if(data.status == 'success'){
              swal(data.message, {
                icon: "success",
              });
              //Close modal and refresh payment table
              $("#payeeModal").modal('hide');
              getTransactions(dataURL, columns[service.toLowerCase()])
            }else{
              swal(data.message, {
                icon: "error",
              });
            }
          });
        } else {
          swal("Your payments are stil pending!");
        }
      });
    });
    //Import meeting participants
    $("#meeting_grp_importbtn").click(function(){
        var meeting_code = $("#meeting_grps").val();
        if(meeting_code != ''){
          $.post(importParticipantURL, {'meeting_code': meeting_code, 'payment_code': code}, function(response){
            $("#payee_msg").html(response)
            getPayees(payeeURL+code)
          });
        }else{
          swal({
            title: "Error!",
            text: "You have not selected a meeting!",
            icon: "error",
          });
        }
    });
    //Show preview of draft message
    $(document).on("click", ".preview_draft", function(){
      var rowdata = table.api().row( $(this).closest('tr') ).data();
      var draftmsg = $("#message_box").val();
      $('#DragWordList li').each(function(i){
        var searchstr = "{"+$(this).text()+"}"
        if (draftmsg.indexOf(searchstr) != -1)
        {
          draftmsg = draftmsg.replace(searchstr, rowdata[$(this).attr('data-index')])
        }
      });
      //Show Draft message
      swal({
        title: "Draft Message!",
        text: draftmsg,
        icon: "info",
      });
    });
    //Send messages to recipients
    $("#proceed_to_send").click(function(){
      var draftmsg =  $("#message_box").val();
      if(draftmsg != ''){
        swal({
          title: "Are you sure?",
          text: "Your will not be able to retrieve messages sent!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.post(messageuploadURL, {'message_code': code, 'draft_message': draftmsg, 'app_code': appID}, function(jsondata){
              var data = $.parseJSON(jsondata);
              if(data.status == 'success'){
                swal(data.message, {
                  icon: "success",
                });
                //Close modal and refresh messages table
                $("#recipientModal").modal('hide');
                getTransactions(dataURL, columns[service.toLowerCase()])
              }else{
                swal(data.message, {
                  icon: "error",
                });
              }
            });
          } else {
            swal("Your messages are stil pending!");
          }
        });
      }else{
        swal({
          title: "Error!",
          text: "You have entered the draft message!",
          icon: "error",
        });
      }
    });

  });

  function addLabel(className, label){
    $(className).text(label)
  }
  function getParticipants(participantURL){
    $("#participant_meeting_code").text(code)
    $.getJSON(participantURL, function(json){
      $("#participant_tbl").find('td:last-child, th:last-child').remove();
      $("#participant_tbl").dataTable(json);
      $('#participant_tbl').Tabledit({
        url: editParticipantURL,
        columns: {
            identifier: [0, 'id'],
            editable: [[1, 'name'], [2, 'phone']]
        },
        buttons: {
          edit: {
              class: 'btn btn-sm btn-default',
              html: '<span class="fa fa-pencil-square-o"></span>',
              action: 'edit'
          },
          delete: {
              class: 'btn btn-sm btn-default',
              html: '<span class="fa fa-trash-o"></span>',
              action: 'delete'
          }
        },
        onSuccess: function(data, textStatus, jqXHR) {
          getParticipants(participantURL)
        }
      });
    });
  }
  function getPayees(payeeURL){
    $("#payee_payment_code").text(code)

    //Upload payee list
    $(".target").upload({
      accept: '.csv',
      label: 'Click to Upload Payee List(s)',
      action: payeeuploadURL,
      postData: {'payment_code': code}
    }).on("filecomplete.upload", function(e, file, response){
      $("#payee_msg").html(response)
      getPayees(payeeURL)
    });

    //Pull payee data based on payment_code
    $.getJSON(payeeURL, function(json){
      $("#payee_tbl").find('td:last-child, th:last-child').remove();
      $("#payee_tbl").dataTable(json);
      $('#payee_tbl').Tabledit({
        url: editPayeeURL,
        columns: {
            identifier: [0, 'id'],
            editable: [[1, 'name'], [2, 'phone'], [3, 'amount']]
        },
        buttons: {
          edit: {
              class: 'btn btn-sm btn-default',
              html: '<span class="fa fa-pencil-square-o"></span>',
              action: 'edit'
          },
          delete: {
              class: 'btn btn-sm btn-default',
              html: '<span class="fa fa-trash-o"></span>',
              action: 'delete'
          }
        },
        onSuccess: function(data, textStatus, jqXHR) {
          getPayees(payeeURL)
        }
      });
    });
  }
  function getPaid(paidURL){
    $("#paid_payment_code").text(code)
    //Pull payee data based on payment_code
    $.getJSON(paidURL, function(json){
      $("#paid_tbl").dataTable(json);
    });  
  }
  function getTransactions(dataURL, columns){
    $.getJSON(dataURL, function(jsondata){
      $("#dataTableList").find('td:last-child, th:last-child').remove();
      $('#dataTableList').dataTable(jsondata);
      //Addd edit/delete options based on service
      $('#dataTableList').Tabledit({
        url: editTransactionURL,
        columns: columns,
        buttons: {
          edit: {
              class: 'btn btn-sm btn-default',
              html: '<span class="fa fa-pencil-square-o"></span>',
              action: 'edit'
          },
          delete: {
              class: 'btn btn-sm btn-default',
              html: '<span class="fa fa-trash-o"></span>',
              action: 'delete'
          }
        },
        onSuccess: function(data, textStatus, jqXHR) {
          getTransactions(dataURL, columns)
        }
      });
    });
  }
  function getMeetings(meetingsURL){
    $.getJSON(meetingsURL, function(jsondata){
      $("#meeting_grps option").remove();
      $("#meeting_grps").append($("<option value=''>Select Meeting</option>"));          
      $.each(jsondata, function(i, v) {
          $("#meeting_grps").append($("<option value='" + v.code + "'>" + v.name + "</option>"));
      });
    });
  }
  function getRecipients(recipientURL){
    $("#recipient_message_code").text(code)

    //Upload payee list
    $(".target_msg").upload({
      accept: '.csv',
      label: 'Click to Upload Recipient List(s)',
      action: recipientuploadURL,
      postData: {'message_code': code}
    }).on("filecomplete.upload", function(e, file, response){
      $("#recipient_msg").html(response)
      getRecipients(recipientURL)
    });

    //Pull payee data based on payment_code
    $.getJSON(recipientURL, function(json){
      $("#recipient_tbl").find('td:last-child, th:last-child').remove();
      table = $("#recipient_tbl").dataTable(json);

      var count = 0;
      var id_list = [];
      var edit_list = [];
      $.each(json.columns, function(i, v){
        if(v.title == 'id'){
          id_list = [count, v.title]
        }else{
          if(v.title != 'options'){
            edit_list.push([count, v.title])
          }
        }
        count += 1;
      });

      $('#recipient_tbl').Tabledit({
        url: editRecipientURL,
        columns: {
            identifier: id_list,
            editable: edit_list
        },
        buttons: {
          edit: {
              class: 'btn btn-sm btn-default',
              html: '<span class="fa fa-pencil-square-o"></span>',
              action: 'edit'
          },
          delete: {
              class: 'btn btn-sm btn-default',
              html: '<span class="fa fa-trash-o"></span>',
              action: 'delete'
          }
        },
        onSuccess: function(data, textStatus, jqXHR) {
          getRecipients(recipientURL)
        }
      });
      //Add message builder variables
      $("#DragWordList").empty();
      $.each(edit_list, function(i, v){
        $("#DragWordList").append("<li data-index='"+(i+1)+"'>"+v[1]+"</li>");
      });
      //Make variables draggable
      $("#DragWordList li").draggable({helper: 'clone'});
      $(".txtDropTarget").droppable({
        accept: "#DragWordList li",
        drop: function(ev, ui) {
          $(this).insertAtCaret('{'+ui.draggable.text()+'}');
        }
      });
    });
  }
  function getMessages(messageURL){
    $("#sent_message_code").text(code)
    //Pull message data based on message_code
    $.getJSON(messageURL, function(json){
      $("#messages_tbl").dataTable(json);
    });  
  }
  $.fn.insertAtCaret = function (myValue) {
    return this.each(function(){
        //IE support
        if (document.selection) {
            this.focus();
            sel = document.selection.createRange();
            sel.text = myValue;
            this.focus();
        }
        //MOZILLA / NETSCAPE support
        else if (this.selectionStart || this.selectionStart == '0') {
            var startPos = this.selectionStart;
            var endPos = this.selectionEnd;
            var scrollTop = this.scrollTop;
            this.value = this.value.substring(0, startPos)+ myValue+ this.value.substring(endPos,this.value.length);
            this.focus();
            this.selectionStart = startPos + myValue.length;
            this.selectionEnd = startPos + myValue.length;
            this.scrollTop = scrollTop;
        } else {
            this.value += myValue;
            this.focus();
        }
    });
  };
</script>