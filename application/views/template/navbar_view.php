  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="<?php echo base_url().'apps';?>"><img class="mb-0" src="<?php echo base_url().'public/img/logo.png';?>" alt="" height="30">NIOJI</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse toggled" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <span class="nav-link">Welcome, <?php echo $this->session->userdata("name"); ?></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url().'apps';?>"><i class='fa fa-delicious'></i> Apps</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url().'pricing';?>"><i class='fa fa-ils'></i> Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://documenter.getpostman.com/view/1060791/RWMHKn2T" target="_blank"><i class='fa fa-file-code-o'></i> Docs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url().'profile';?>"><i class='fa fa-user-circle'></i> Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>