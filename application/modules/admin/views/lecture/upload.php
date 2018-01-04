
<?php
if(isset($message))
{
    echo '<div class="alert alert-success" role="alert">'.$message.'</div>';
}
?>
<div class="row">
	<div class="col-md-6">
            <div class="box box-primary">
                
            
                
                    <div class="box-body">
                        <form id="upload_form">                     
                        <div class="form-group">
                            <label for="course">Curso</label>
                            <select required class="form-control" id="course" name="course">
                                <option  value="">--seleccione-curso--</option>
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
                                <option  value="">--seleccione-motivo--</option>
                            </select>
			</div>
                        
                        
                        <div class="form-group">
                            <label for="chapter">Capítulo</label>
                            <select class="form-control" required id="chapter" name="chapter">
                                <option  value="">--seleccione-capítulo--</option>
                            </select>
			</div>
   
<label for="file_name">Nombre de su Archivo</label>
<div class="input-group">
    <input name="file_name" id="file_name" type="text" class="form-control" placeholder="your file name" aria-describedby="basic-addon2">
  <span class="input-group-addon" id="basic-addon2">_(SerialNo.)</span>
</div>
<br/> 
                        
                        
                        
			<div class="form-group">
                            <label for="upload_file">Subir Archivo</label>
                            
                            <input id="upload_file" accept=".enc" class="form-control" multiple required type="file" name="upload_file" />
			</div>
                        
                        <button id="submit" type="submit" class="btn btn-primary">Enviar</button>
                        <button type="reset" class="btn btn-danger">Resetear</button>
</form>
                    </div>
					
            </div>
        </div>
	
</div>
 <script type="text/javascript">
$(document).ready(function() {
    
//    $('#submit').click({
//        alert("sdf");
//    });
//    $('form').bind('click', function (event) {
//
//event.preventDefault();// using this page stop being refreshing 
//
//          $.ajax({
//            type: 'POST',
//            url: '#',
//            data: $('form').serialize(),
//            success: function () {
//              alert('form was submitted');
//            }
//          });
//
//        });
//   


      
    
    $('body').on('change','#course',function(){
        
        $.ajax({
		type: "POST",
		url: "<?php echo base_url('admin/lecture/get_subject'); ?>",
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
		url: "<?php echo base_url('admin/lecture/get_chapter'); ?>",
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
    
    $('body').on('change','#subject',function(){
        
        $.ajax({
		type: "POST",
		url: "<?php echo base_url('admin/lecture/get_chapter'); ?>",
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
        
        var str = $( "#subject option:selected" ).text()+'_'+$( "#chapter option:selected" ).text();
        $('#file_name').val(str.replace(/\s+/g, ''));
        
    });
    
    $('#upload_form').submit(function(e) {
		
        e.preventDefault();
        var files = $('#upload_file').prop('files');
        var names = $.map(files, function (val) { return val.name; });
        
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("admin/lecture/upload1"); ?>',
            data:{
                files : names,
                chapter : $('#chapter').val(),
                file_name : $('#file_name').val()
                    },
					
			beforeSend: function(){
				$('#response').fadeIn(100);
			},
			complete: function(){
				$('#response').fadeOut(1000);
			},		
            success: function (data) {
	
                if(data)
                {
					alert('Well done! You successfully Uploaded Files.');
                }
				else
				{
					alert('Try Again Plz!!!');
				}
              location.reload();
            }
          });
			
        });

});


</script>