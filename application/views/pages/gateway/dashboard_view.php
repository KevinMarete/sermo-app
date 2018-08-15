<div class="container-fluid">
	<!-- Breadcrumbs-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
	  		<a href="<?php echo base_url().'apps';?>">Apps</a>
		</li>
		<li class="breadcrumb-item active"><?php echo $this->uri->segment(2);?></li>
	</ol>
	<div class="row">
		<div class="col-xl-12 col-sm-12 mb-4">
			<?php echo $this->session->flashdata('dashboard_msg'); ?>
		</div>
	</div>
	<!-- Icon Cards-->
	<div class="row">
		<div class="col-xl-4 col-sm-6 mb-4">
			<div class="card text-white bg-warning o-hidden h-100">
	            <div class="card-body">
	              	<div class="card-body-icon">
	                	<i class="fa fa-fw fa-meetup"></i>
	              	</div>
	            <div class="mr-5">Meetings</div>
	            </div>
	            <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url().'meeting/'.$this->uri->segment(2);?>">
	              	<span class="float-left">Manage Meetings</span>
	              	<span class="float-right">
	                	<i class="fa fa-angle-right"></i>
	              	</span>
	            </a>
          </div>
		</div>
		<div class="col-xl-4 col-sm-6 mb-4">
			<div class="card text-white bg-secondary o-hidden h-100">
				<div class="card-body">
					<div class="card-body-icon">
						<i class="fa fa-fw fa-envelope"></i>
					</div>
					<div class="mr-5">Messages</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="<?php echo base_url().'message/'.$this->uri->segment(2);?>">
					<span class="float-left">Manage Messages</span>
					<span class="float-right">
						<i class="fa fa-angle-right"></i>
					</span>
				</a>
          </div>
		</div>
		<div class="col-xl-4 col-sm-6 mb-4">
			<div class="card text-white bg-primary o-hidden h-100">
	            <div class="card-body">
	              	<div class="card-body-icon">
	                	<i class="fa fa-fw fa-tasks"></i>
	              	</div>
	              	<div class="mr-5">Payments</div>
	            </div>
	            <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url().'payment/'.$this->uri->segment(2);?>">
	              	<span class="float-left">Manage Payments</span>
	              	<span class="float-right">
	                	<i class="fa fa-angle-right"></i>
	              	</span>
	            </a>
          </div>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-4 col-sm-6 mb-4">
			<div class="card text-white bg-success o-hidden h-100">
	            <div class="card-body">
	              	<div class="card-body-icon">
	                	<i class="fa fa-fw fa-dollar"></i>
	              	</div>
	            <div class="mr-5">Wallet (Balance: KES.<?php echo number_format($wallet_balance); ?>)</div>
	            </div>
	            <a class="card-footer text-white clearfix small z-1" data-toggle="modal" data-target="#topupModal">
	              	<span class="float-left">Topup Wallet</span>
	              	<span class="float-right">
	                	<i class="fa fa-angle-right"></i>
	              	</span>
	            </a>
          </div>
		</div>
		<div class="col-xl-4 col-sm-6 mb-4">
			<div class="card text-white bg-info o-hidden h-100">
				<div class="card-body">
					<div class="card-body-icon">
						<i class="fa fa-fw fa-users"></i>
					</div>
					<div class="mr-5">Users</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="<?php echo base_url().'user/'.$this->uri->segment(2);?>">
					<span class="float-left">Manage App Users</span>
					<span class="float-right">
						<i class="fa fa-angle-right"></i>
					</span>
				</a>
          </div>
		</div>
		<div class="col-xl-4 col-sm-6 mb-4">
			<div class="card text-white bg-danger o-hidden h-100">
	            <div class="card-body">
	              	<div class="card-body-icon">
	                	<i class="fa fa-fw fa-cog"></i>
	              	</div>
	              	<div class="mr-5">Settings</div>
	            </div>
	            <a class="card-footer text-white clearfix small z-1" data-toggle="modal" data-target="#settingModal">
	              	<span class="float-left">Manage App</span>
	              	<span class="float-right">
	                	<i class="fa fa-angle-right"></i>
	              	</span>
	            </a>
          </div>
		</div>
	</div>
</div>
<!--modals-->
<!--topupModal-->
<div class="modal fade" id="topupModal" tabindex="-1" role="dialog" aria-labelledby="topupModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url().'topup_wallet/'.$this->uri->segment(2);?>" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Topup Wallet</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label for="input_amount">Amount</label>
              <input class="form-control" id="input_amount" type="number" aria-describedby="amountHelp" name="amount" required="" min="100" max="70000">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-dollar"></i> Topup</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--settingModal-->
<div class="modal fade" id="settingModal" tabindex="-1" role="dialog" aria-labelledby="settingModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url().'update_app/'.$this->uri->segment(2);?>" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Manage Application</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label for="input_name">Name</label>
              <input class="form-control" id="input_name" type="text" aria-describedby="nameHelp" name="name" required="">
            </div>
            <div class="form-group">
              <label for="input_phone">Description</label>
              <textarea class="form-control" id="input_description" aria-describedby=descriptionHelp"  cols="10" rows="4" name="description" required=""></textarea>
            </div>
        </div>
        <div class="modal-footer">
        	<button type="button" class="btn btn-danger" id="delete_app"><i class="fa fa-trash"></i> Delete App</button>
          	<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-window-close"></i> Close</button>
          	<button type="submit" class="btn btn-primary"><i class="fa fa-refresh"></i> Update App</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  	var appID = "<?php echo ucwords($this->uri->segment(2)); ?>"
  	var dataURL = "../get_app/"+appID
  	var deleteURL = "../delete_app/"+appID
  	var appsURL = "../apps"

	$(function(){
	    //Load Payees when Modal shown
	    $("#settingModal").on("show.bs.modal", function(e) {
	    	$.getJSON(dataURL, function(data){
	    		$.each(data, function(i, v){
	    			$("#input_"+i).val(v)
	    		});
	    	});
	    });
	    //Delete app
	    $("#delete_app").click(function(){
	      swal({
	        title: "Are you sure?",
	        text: "Your will not be able to recover this app!",
	        icon: "warning",
	        buttons: true,
	        dangerMode: true,
	      })
	      .then((willDelete) => {
	        if (willDelete) {
	          $.post(deleteURL, function(jsondata){
	            var data = $.parseJSON(jsondata);
	            if(data.status == 'success'){
	              swal(data.message, {
	                icon: "success",
	              });
	              //Close modal and to to apps url
	              $("#settingModal").modal('hide');
	              window.location.href = appsURL
	            }else{
	              swal(data.message, {
	                icon: "error",
	              });
	            }
	          });
	        } else {
	          swal("Your app is stil available!");
	        }
	      });
	    });
	});
</script>