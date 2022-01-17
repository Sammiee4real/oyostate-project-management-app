<?php 
  session_start();
  require_once('../config/functions.php');
  $project_id = $_GET['project_id'];
  $project_details = get_one_row_from_one_table_by_id('projects','unique_id',$project_id,'date_added');
  $project_name = $project_details['project_name'];

  $milestones = get_rows_from_one_table_by_id_with_order('projects_milestones','project_id',$project_id,'date_for_completion ASC');
  
?>
<div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Selected Project: <strong><?php echo $project_name; ?></strong> </h4>
                <a class="heading-elements-toggle"><i class="ft-more-horizontal font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <!-- <div class="card-body">
                    <p class="m-0">Total ongoing projects 6000<span class="float-right"><a href="project-summary.html" target="_blank">Project Summary <i class="ft-arrow-right"></i></a></span></p>
                </div> -->
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <?php if($milestones == null ){ echo '<tr><td><form method="post" id="form_add_milestones">
                                    <a href="#" id="add_milestones">+ Add Milestones</a>
                                    <br>                              
                                    <br>
                                        <input type="hidden" value="'.$project_id.'" name="project_id" id="project_id">
                                    <input type="hidden" name="count" id="count" value="0">
                                    <div  id="display_milestones"></div>                             <input value="Add Timelines" type="submit" class="btn btn-sm btn-success" name="cmd_add_milestones"  id="cmd_add_milestones">
                                    
                                    </form></td></tr>'; }else{?>
                        <thead>
                            <tr>
                                <th>Milestone</th>
                                <th>Timeline</th>
                                <th>Completion Status</th>
                                <th>Progress(in %)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($milestones as $milestone){ ?>
                            <tr>
                                
                                <td class="text-truncate"><?php echo $milestone['title']; ?></td>
                                <td class="text-truncate"><?php echo format_date_two('F-d-Y',$milestone['date_for_completion']); ?></td>
                                <td class="text-truncate"><?php echo $milestone['completion_status'] == 0 ? '<span class="badge badge-warning">ongoing</span>':'<span class="badge badge-success">completed</span>'; ?></td>
                                <td class="text-truncate"><?php echo $milestone['completion_percent'] == null ? '0%': $milestone['completion_percent']; ?></td>
                                <td>
                                    <!-- <div class="dropdown">
                                    <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    select an option
                                    </button> -->
                                   
                                  

                                    <select class="mark_milestone_complete" name="mark_milestone_complete" id="mark_milestone_complete">
                                        <option value="">select</option>
                                        <option value="<?php echo $milestone['unique_id']; ?>">Mark 100% Complete</option>
                                        <option value="">Set Percentage Completion</option>
                                        
                                    </select>
                                    
                                  

                                </td>


                            </tr>
                           <?php } //for statement ?>
                            <tr>
                                 <td colspan="5">
                                    <form method="post" id="form_add_milestones">
                                    
                                    <!-- <a href='add_timelines.php' class='btn btn-sm btn-success'>add more milestone</a> -->
                                    

                                    <a href="#" id="add_milestones">+ Add More Milestones</a>
                                    <br>
                                    <!-- <div class="result_div"></div> -->
                                    <br>
                                    
                                        <input type="hidden" value="<?php echo $project_id; ?>" name="project_id" id="project_id">
                                    <input type="hidden" name="count" id="count" value="0">
                                    <div  id="display_milestones"></div> 
                                    <!-- <div id="show_button" > -->
                                        <input value="Add Timelines" type="submit" class='btn btn-sm btn-success' name="cmd_add_milestones"  id='cmd_add_milestones'>
                                    <!-- </div>                     -->
                                    </form>

                                </td>
                            </tr>
                        </tbody>
                          <?php } //if statement ?>
                    </table>
                </div>
            </div>
        </div>
    </div>


  <script type="text/javascript">
        $(document).ready(function(){
             // $("#show_button").hide();

             $('#add_milestones').click(function(e) {
                        e.preventDefault();
                        var count = $('#count').val();     
                        var count2 = parseInt(count) + 1;
                        var countdis = parseInt(count) + Math.floor(Math.random() * 9999999999);
                        
                        // arr.push(count2);
                        $('#display_milestones').append("<div class='row' id='r"+countdis+"'> <div class='col-md-5'><label>Milestone</label> <input type='text' placeholder='enter milestone' required='' class='form-control form-control-sm' id='milestone_"+countdis+"' name='milestone_"+countdis+"'></div><div class='col-md-5'><label>Timeline</label> <input required='' type='date' class='form-control form-control-sm ' placeholder='enter timeline'   id='timeline_"+countdis+"' name='timeline_"+countdis+"'></div><div class='col-md-2'><a href='#'  id='"+countdis+"'  onclick='removeElement("+countdis+")' style='color:red; float:left;'>remove</a><br><br><br><br></div></div>");
                        $('#count').val(count2);
                });

             $('#cmd_add_milestones').click(function(e) {
                e.preventDefault();
                
                $.ajax({
                url:"ajax/add_project_milestones.php",
                method: "POST",
                data:$('#form_add_milestones').serialize(),
                // beforeSend: function(){
                //      // $("#cmd_send_custom_sms").attr('disabled', true);
                //       $('.result_div').html('<div class="alert alert-primary">Please wait...</div>');
                // },
                success:function(data){
                    Swal.fire({
                    icon: 'info',
                    title: 'Alert!',
                    html: data
                    });
                }                

                });
                
             });


             $('.mark_milestone_complete').change(function(e){
                e.preventDefault();
                var id = $(this).val();
                //alert(id);
                // console.log(id);

             });


        });
    </script>