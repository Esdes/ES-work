$(document).ready(function() {
$(".delete-news").on("click", function(e) {
        e.preventDefault();
        var id = $(this).attr('value');
        var myData = 'recordToDelete='+ id;

        var $this = $("#news_"+id);
        if (confirm('Вы уверены, что хотите удалить новость?'))
        {
        	jQuery.ajax({
            	type: "POST", 
            	url: "/admin/news_delete", 
            	dataType:"text", 
            	data: myData, 
            	success: function(response){
                    $this.fadeOut('slow');
            	},
            	error:function (xhr, ajaxOptions, thrownError){
                	
                	alert(thrownError);
           		}
        	});
		}
    });

$(".delete-employer").on("click", function(e) {
        e.preventDefault();
        var id = $(this).attr('value');
        var myData = 'recordToDelete='+ id;

        var $this = $("#employer_"+id);
        if (confirm('Вы уверены, что хотите удалить заказчика?'))
        {
            jQuery.ajax({
                type: "POST", 
                url: "/admin/employers_delete", 
                dataType:"text", 
                data: myData, 
                success: function(response){
                    $this.fadeOut('slow');
                },
                error:function (xhr, ajaxOptions, thrownError){
                    
                    alert(thrownError);
                }
            });
        }
    });

$(".delete-worker").on("click", function(e) {
        e.preventDefault();
        var id = $(this).attr('value');
        var myData = 'recordToDelete='+ id;

        var $this = $("#worker_"+id);
        if (confirm('Вы уверены, что хотите удалить работника?'))
        {
            jQuery.ajax({
                type: "POST", 
                url: "/admin/workers_delete", 
                dataType:"text", 
                data: myData, 
                success: function(response){
                    $this.fadeOut('slow');
                },
                error:function (xhr, ajaxOptions, thrownError){
                    
                    alert(thrownError);
                }
            });
        }
    });

$(".delete-subcategory").on("click", function(e) {
        e.preventDefault();
        var id = $(this).attr('value');
        var myData = 'recordToDelete='+ id;

        var $this = $("#subcategory_"+id);
        if (confirm('Вы уверены, что хотите удалить подкатегорию?'))
        {
            jQuery.ajax({
                type: "POST", 
                url: "/admin/subcategory_delete", 
                dataType:"text", 
                data: myData, 
                success: function(response){
                    $this.fadeOut('slow');
                },
                error:function (xhr, ajaxOptions, thrownError){
                    
                    alert(thrownError);
                }
            });
        }
    });

$(".delete-category").on("click", function(e) {
        e.preventDefault();
        var id = $(this).attr('value');
        var myData = 'recordToDelete='+ id;

        var $this = $("#category_"+id);
        if (confirm('Вы уверены, что хотите удалить категорию?'))
        {
            jQuery.ajax({
                type: "POST", 
                url: "/admin/category_delete", 
                dataType:"text", 
                data: myData, 
                success: function(response){
                    $this.fadeOut('slow');
                },
                error:function (xhr, ajaxOptions, thrownError){
                    
                    alert(thrownError);
                }
            });
        }
    });

$(".delete-order").on("click", function(e) {
        e.preventDefault();
        var id = $(this).attr('value');
        var myData = 'recordToDelete='+ id;

        var $this = $("#order_"+id);
        if (confirm('Вы уверены, что хотите удалить заказ?'))
        {
            jQuery.ajax({
                type: "POST", 
                url: "/admin/order_delete", 
                dataType:"text", 
                data: myData, 
                success: function(response){
                    $this.fadeOut('slow');
                },
                error:function (xhr, ajaxOptions, thrownError){
                    
                    alert(thrownError);
                }
            });
        }
    });

//change image
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.upd_img').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$(".file_img").change(function(){
            readURL(this);
        });
 
$(function() {
      $('#update_category').submit(function(e) {
        var $form = $(this); 
       
        $.ajax({
          type: $form.attr('method'),
          url: $form.attr('action'),
          data: $form.serialize()
        }).done(function() {
           console.log('done');
        }).fail(function() {
          console.log('fail');
        });
        
        e.preventDefault(); 
      });
    });

$(function() {
      $('#update_subcategory').submit(function(e) {
        var $form = $(this);
        
        $.ajax({
          type: $form.attr('method'),
          url: $form.attr('action'),
          data: $form.serialize()
        }).done(function() {
          console.log('done');
        }).fail(function() {
          console.log('fail');
        });
        
        e.preventDefault(); 
      });
    });

$(function() {
     
      $('#update_worker').submit(function(e) {
        var $form = $(this);
        
        $.ajax({
          type: $form.attr('method'),
          url: $form.attr('action'),
          data: $form.serialize()
        }).done(function() {
          console.log('done');
        }).fail(function() {
          console.log('fail');
        });
        
       e.preventDefault(); 
      });
    });

$(function() {
    
      $('#update_employer').submit(function(e) {
        var $form = $(this);
        
        $.ajax({
          type: $form.attr('method'),
          url: $form.attr('action'),
          data: $form.serialize()
        }).done(function() {
          console.log('done');
        }).fail(function() {
          console.log('fail');
        });
        
        e.preventDefault(); 
      });
    });

$(function() {
    
      $('#update_news').submit(function(e) {
        var $form = $(this);
        
        $.ajax({
          type: $form.attr('method'),
          url: $form.attr('action'),
          data: $form.serialize()
        }).done(function() {
          console.log('done');
        }).fail(function() {
          console.log('fail');
        });
        
        e.preventDefault(); 
      });
    });


//input textarea tab button
$("textarea").keydown(function(e) {
    if(e.keyCode === 9) 
    {
        // get caret position/selection
        var start = this.selectionStart;
        var end = this.selectionEnd;

        var $this = $(this);
        var value = $this.val();

        // set textarea value to: text before caret + tab + text after caret
        $this.val(value.substring(0, start)
                    + "\t"
                    + value.substring(end));

        // put caret at right position again (add one for the tab)
        this.selectionStart = this.selectionEnd = start + 1;

        // prevent the focus lose
        e.preventDefault();
    }
});
});