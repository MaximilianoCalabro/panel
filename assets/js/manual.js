/**
 * Scripts for Admin Panel
 */

$(document).ready(function() {
	$('body').on('change','#course',function(){
        
        $.ajax({
		type: "POST",
		url: "<?php echo base_url('admin/regfile/get_subject'); ?>",
		datatype: "html",
                
		data :  {
                            course_id : $(this).val()
                        },
		success: function(data) 
			{
                            alert(data);
                          //  $('#response').fadeOut(100);
                           // $('#subject').empty();
                           // $('#subject').append('<option  value="">--select-subject--</option>');
                            $('#subject').append(data);
                            //$('#chapter').empty();
                            //$('#chapter').append('<option  value="">--select-chapter--</option>');
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
    
});