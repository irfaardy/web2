function Countdown(){
	if($("#timer").length > 0){
				var timer;

				var compareDate = $("#timer").attr('timestamp');
				
				timer = setInterval(function() {
				  timeBetweenDates(compareDate);
				}, 1000);

					$('#timer').hide().fadeIn();
function timeBetweenDates(toDate) {
				  var dateEntered = new Date(toDate);
				  // console.log(dateEntered);
				  // alert(dateEntered);
				  var now = new Date();
				  var difference = dateEntered.getTime()-now.getTime();
				  // alert(difference);
				  if (difference <= 0) {

				    // Timer done
				    clearInterval(timer);
				    alert('Waktu pembayaran telah habis, silahkan untuk memesan ulang...');
				  	window.location.replace($("#timer").attr('url'));
				  } else {
				    
				    var mseconds = Math.floor(difference / 10000);
				    var seconds = Math.floor(difference / 1000);
				    var minutes = Math.floor(seconds / 60);
				    var hours = Math.floor(minutes / 60);
				    var days = Math.floor(hours / 24);
				    // console.log(seconds);
				    hours %= 24;
				    minutes %= 60;
				    seconds %= 60;

				    $("#hari").text(days);
				    $("#jam").text(hours);
				    $("#menit").text(minutes);
				    if(seconds <= 60 && hours <= 0 && minutes <= 0){
				    	 $("#timer").attr('class','alert alert-danger');
				    } else{
				    	 $("#timer").attr('class','');
				    }
				    $("#detik").hide().fadeIn(500).text(seconds);
				  }
				}

		}

}
function kota(){
	 $("[populate]").change(function(){
        var dst = $('#kota').val();
        var vv = $(this).val();

        $('[populate-target]').prop('selectedIndex',0);
        $("[populate-target]").prop('disabled', true);
        $("button[type=submit]").prop('disabled', true);
        $("button[type=submit]").prop('class', 'btn btn-default');
        $("#spinner").fadeIn(300);
        if(vv!=""){
        $.ajax({
            url: $(this).attr('data-url'),
            type: 'post',
            data: {province:vv,_token:$("input[name=_token]").val()},
            timeout: 5000,
            dataType: 'json',
            success:function(response){
            	if(response != "" || response != null){
            	if(response['error'] == false){
	                var len = response['kota'].length;
	                $("[populate-target]").empty();
	                 $("[populate-target]").append("<option value='' selected>-Pilih-Kota-</option>");
	                for( var i = 0; i<len; i++){
	                    var id = response['kota'][i]['id'];
	                    var name = response['kota'][i]['name'];
	                    
	                    $("[populate-target]").append("<option value='"+id+"'>"+name+"</option>");

	                }
	                  $("#spinner").fadeOut(300);
	                 $("[populate-target]").prop('disabled', false);
	                  $("button[type=submit]").prop('disabled', false);
       				 $("button[type=submit]").prop('class', 'btn btn-primary');
	             } else{
	             	alert(response['message']);
	            	  $("#spinner").fadeOut(300);
	            	   $("button[type=submit]").prop('disabled', false);
       				 $("button[type=submit]").prop('class', 'btn btn-primary');
	             }
	            }else{
	            	alert('Internal server error');
	            	  $("#spinner").fadeOut(300);
	            	   $("button[type=submit]").prop('disabled', false);
       				 $("button[type=submit]").prop('class', 'btn btn-primary');
	            	}
            
        },
		    fail: function(xhr, textStatus, errorThrown){
		       alert(textStatus);
		         $("#spinner").fadeOut(300);
		    }
        });
    	} else{
    		alert('Provinsi harus diisi!');
		         $("#spinner").fadeOut(300);
    	}
    });
}
function submit_img(route,yg_dipost){

      

        $("#spinner").fadeIn(300);
         $.ajax({
            url: route,
            type: 'post',
            data: {file:$(yg_dipost).val(),_token:$("input[name=_token]").val()},
            timeout: 5000,
            dataType: 'json',
            success:function(response){
            	 $("#spinner").fadeOut(300);
            	 if(response['error'] == false){
            		 // window.location.replace(response['redirect']);
            		 return true;
            		} else{
            			alert(response['message']);
            			return false;
            		}
            	 
       		 },
		    fail: function(xhr, textStatus, errorThrown){
		       alert(textStatus);
		         $("#spinner").fadeOut(300);

		         return false;
		    }
        });
    	
}
function ajax_post(route,yg_dipost){
	
       
        var code = yg_dipost;

        $("#spinner").fadeIn(300);
        if(code!=""){
        	
        $.ajax({
            url: route,
            type: 'post',
            data: {res:code,_token:$("input[name=_token]").val()},
            timeout: 5000,
            dataType: 'json',
            success:function(response){
            	 $("#spinner").fadeOut(300);
            	 if(response['error'] == false){
            		 window.location.replace(response['redirect']);
            		 return true;
            		} else{
            			alert(response['message']);
            			return false;
            		}
            	 
       		 },
		    fail: function(xhr, textStatus, errorThrown){
		       alert(textStatus);
		         $("#spinner").fadeOut(300);

		         return false;
		    }
        });
    	} else{
    		
		         $("#spinner").fadeOut(300);
		         return false;
    	}
  
}

function readIMG() {
	$("[img-reader]").change(function() {
		$("[preview]").html(null);
		
		
		var input=this;
		
		if(input.files.length <= 10){
		$("[preview]").attr('style','overflow: auto; max-height:300px;');
		$.each(input.files,function(index,value)
		{

		
		if (input.files && input.files[index]) {

			var reader = new FileReader();
			reader.onload = function (e) {
				$('[preview]').hide().fadeIn().append("<div class='col-xs-3' id=image_"+index+"> <img class='img-thumbnail' style='max-height:103px;'   src='"+e.target.result+"');' /></div>").fadeIn();
				
				};

			reader.readAsDataURL(input.files[index]);
			}
			else{
				
			}
		
		});
	}
		else
		{
			alert('Maksimal 10 gambar!');
			$("[preview]").html(null);
	        $("[img-reader]").prop('value',null);
		}
	
});

	}

	function cekKoneksi(url_l,msg){
		$.ajax({
	    url: url_l,
	    timeout: 10000,
	    error: function(jqXHR) { 
	        if(jqXHR.status==0) {
	            alert("Gagal terhubung ke server, mohon cek koneksi internet anda");
	        }
	    },
	    success: function() {
	        alert(msg);
	    }
	});
	}

$(document).ready(function() {

	kota();
	Countdown();
	readIMG();
});