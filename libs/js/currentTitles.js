/**
 * @author john
 */
$(function(){
	
			$('h4').click(function(){
				$(this).hide('fast').next('input').show();
			}); //end h4 click
			$('#item input').change(function(){
				var id = $(this).prev('h4').attr('id');
				var stage = $(this).val();
				var thisParam = $(this);
				
				//alert(id + " " + stage);
				$.ajax({
					url: 'changeTitleStage.php',
					data: 'id=' + id + '&stage=' + stage,
					type: 'post',
					
					success: function(res){
						$(thisParam).prev('h4').text('Stage: ' + stage);
						$(thisParam).hide().prev('h4').show();
					}
				}); // end ajax
			}); //end change function
		
			
			
		});