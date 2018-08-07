<div class="container-fluid">
	<!-- Breadcrumbs-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
	  		<a href="<?php echo base_url().'apps';?>">Apps</a>
		</li>
		<li class="breadcrumb-item active"><?php echo $this->uri->segment(2);?></li>
		<li class="breadcrumb-item">
			<div class="float-right"> Wallet Balance: <b>KES.<span class="wallet_bal"><?php echo number_format($wallet_balance); ?></span></b></div>
		</li>
	</ol>

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
			<div class="card text-white bg-success o-hidden h-100">
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
</div>