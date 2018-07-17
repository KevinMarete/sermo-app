    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Apps</li>
      </ol>
      <div class="row">
          <div class="col-md-12">
            <?php echo $this->session->flashdata('apps_msg'); ?>
            <button class="btn btn-lg btn-primary pull-right" data-toggle="modal" data-target="#createAppModal"> <i class='fa fa-plus'></i> Create App</button> 
          </div>
      </div>
      
      <hr>
      <!-- Icon Cards-->
      <div class="row">
        <?php echo $app_cards; ?>
      </div>
    </div>
    <!-- /.container-fluid-->

    <!-- Modal -->
    <div class="modal fade" id="createAppModal" tabindex="-1" role="dialog" aria-labelledby="createAppModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="<?php echo base_url().'create_app';?>" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Create New App</h5>
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