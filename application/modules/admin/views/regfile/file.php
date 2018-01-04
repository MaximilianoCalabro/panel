<?php
if(isset($message))
{
    echo '<div class="alert alert-success" role="alert">'.$message.'</div>';
}
if(isset($err_message))
{
    echo '<div class="alert alert-danger" role="alert">'.$err_message.'</div>';
}
?>
<form method="post" action="<?php base_url('admin/regfile/file'); ?>"> 
<div class="row">
    <div class="col-md-12">
        <div class="col-md-4">
            
                        <div class="box box-primary">
                            <div class="box-header">
                                    <h3 class="box-title">Elegir Archivos</h3>
                            </div>
                            
			<div class="box-body">
                           
                            <div class="form-group">
                                <label for="users">Usuarios</label>
                                <select required class="form-control" id="users" name="users">
                                    <option  value="">--select-user--</option>
                                     <?php
                                    foreach($client as $clnt)
                                    {
                                      echo '<option value="'.$clnt->id.'">'.$clnt->username.'</option>';  
                                    }
                                    ?>
                                </select>
                             </div>

                            <div class="form-group">
                                <label for="course">Curso</label>
                                <select required class="form-control" id="course" name="course">
                                    <option  value="">--select-course--</option>
                                    <?php
                                    foreach($course as $cs)
                                    {
                                      echo '<option value="'.$cs->id.'">'.$cs->course.'</option>';  
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="subject">Motivo</label>
                                <select required class="form-control" id="subject" name="subject">
                                    <option  value="">--select-subject--</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="chapter">Capítulo</label>
                                <select class="form-control" required id="chapter" name="chapter">
                                    <option  value="">--select-chapter--</option>
                                </select>
                            </div> 

                            <div class="form-group">
                                <label for="chapter">Fecha de Inicio</label>
                                <input type="date" class="form-control" name="str_dt" required placeholder="Start Date"/>
                            </div>

                            <div class="form-group">
                                <label for="chapter">Fecha de Fin</label>
                                <input type="date" class="form-control" name="end_dt" required placeholder="End Date"/>
                            </div>          

                            <div class="form-group">
                                <label for="chapter">No.Of_Play</label>
                                <input type="number" class="form-control" name="noofplay" required placeholder="no of play"/>
                            </div> 
			</div>
                            
                        </div>
        </div>
        
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Elegir Archivos</h3>
            </div>
            
            <div style="overflow: scroll; height: 537px;" class="box-body">
                <table  style=" overflow: auto;" id="example"  class="table table-hover table-bordered table-responsive record_table">
                        <thead>
                            <tr class="info">
                                <th><input type="checkbox" id="selecctall"/></th>
                                <th>ID</th>
                                <th>Archivo</th>
                                <th>Nombre</th>
                            </tr>
                        </thead>
                        <tbody  id="tbl_lecture">

                        </tbody>
                </table>	
                            
                            
            </div>
        </div>
    </div>
        
        <!-- Action -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Acción</h3>
                </div>
                <div class="box-body">
                    <button class="btn btn-primary">Registrar Archivos</button> 
                </div>
            </div>
        </div>
        <!-- End Action-->                
		
    </div>

</div>
     
   
</form>

<script type="text/javascript">
$(document).ready(function() {
    

    $('#example tbody').on( 'click', 'tr', function () {
        if (event.target.type !== 'checkbox') {
            $(':checkbox', this).trigger('click');
            //$(this).toggleClass('danger');
        }
    });
    
   $('#example tbody').on( 'click', 'input', function () {
      var id = $(this).val();
      $('#tr'+id).toggleClass('danger');
      
   });
    
    $('body').on( 'click', '#selecctall', function () {
     //on click 
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true; 
                $('#example tbody tr').addClass('danger'); //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false;
                $('#example tbody tr').removeClass('danger');//deselect all checkboxes with class "checkbox1"                       
            });         
        }

      });
    
    $('body').on('change','#course',function(){
        
        $.ajax({
		type: "POST",
		url: "<?php echo base_url('admin/regfile/get_subject'); ?>",
		datatype: "html",
                beforeSend: function() {
                        $('#response').fadeIn(100);
                    },
		data :  {
                            course_id : $(this).val()
                        },
		success: function(data) 
			{
                            $('#response').fadeOut(100);
                            $('#subject').empty();
                            $('#subject').append('<option  value="">--select-subject--</option>');
                            $('#subject').append(data);
                            $('#chapter').empty();
                            $('#chapter').append('<option  value="">--select-chapter--</option>');
			}
		});
        
    });
    
    $('body').on('change','#subject',function(){
        
        $.ajax({
		type: "POST",
		url: "<?php echo base_url('admin/regfile/get_chapter'); ?>",
		datatype: "html",
                beforeSend: function() {
                        $('#response').fadeIn(100);
                    },
		data :  {
                            subject_id : $(this).val()
                        },
		success: function(data) 
			{
                            $('#response').fadeOut(100);
                            $('#chapter').empty();
                            $('#chapter').append('<option  value="">--select-chapter--</option>');
                            $('#chapter').append(data);
			}
		});
        
    });
    
   
    
    $('body').on('change','#chapter',function(){
        
        $.ajax({
		type: "POST",
		url: "<?php echo base_url('admin/regfile/get_lecture'); ?>",
		datatype: "html",
                beforeSend: function() {
                        $('#response').fadeIn(100);
                    },
		data :  {
                            chapter_id : $(this).val()
                        },
		success: function(data) 
			{
                            $('#response').fadeOut(100);
                            $('#tbl_lecture').empty();
                            $('#tbl_lecture').append(data);
			}
		});
        
    });
    
    
    $('body').on('change','#chapter',function(){
        
        var str = $( "#subject option:selected" ).text()+'_'+$( "#chapter option:selected" ).text();
        $('#file_name').val(str.replace(/\s+/g, ''));
        
    });
    
    $('#upload_form').submit(function() {
        $('#response').fadeIn(100);
    return true;
});

});


</script>