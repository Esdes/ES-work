// button up
$('footer').prepend('<a class="toTop"> <i class="fa fa-chevron-up fa-2x"></i> </a>');

$(window).scroll(function() 
{
  var amountScrolled = 250;
    if ( $(window).scrollTop() > amountScrolled ) 
    {
        $('a.toTop').fadeIn('slow');
    } 
    else
    {
        $('a.toTop').fadeOut('slow');
    }
});

$('a.toTop').click(function() 
{
    $('html, body').animate({
        scrollTop: 0
    }, 1);
    return false;
});

//validate
(function() 
{
  'use strict';
  window.addEventListener('load', function() 
  {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) 
    {
      form.addEventListener('submit', function(event) 
      {
        if (form.checkValidity() === false) 
        {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

//Category/subcategory block
$(function() 
{
  var Accordion = function(el, multiple) 
  {
    this.el = el || {};
    this.multiple = multiple || false;

    // Variables privadas
    var links = this.el.find('.link');
    // Evento
    links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
  }

  Accordion.prototype.dropdown = function(e) 
  {
    var $el = e.data.el;
      $this = $(this),
      $next = $this.next();

    $next.slideToggle();
    $this.parent().toggleClass('open');

    if (!e.data.multiple) {
      $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
    };
  } 

  var accordion = new Accordion($('#accordion'), false);
});


//rating employer
$(".add_rate_employer").on("click", function(e) {
        e.preventDefault();
        var id = $(this).attr('value');
        var myData = 'add=' + id;

        var $this = $("#employer_rate_"+id);
        
        if (confirm('Вы уверены, что хотите повысить рейтинг заказчику?'))
        {
            jQuery.ajax({
                type: "POST", 
                url: "/employer_rate/add", 
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

$(".minus_rate_employer").on("click", function(e) {
        e.preventDefault();
        var id = $(this).attr('value');
        var myData = 'minus=' + id;
      
        var $this = $("#employer_rate_"+id);
        if (confirm('Вы уверены, что хотите понизить рейтинг заказчику?'))
        {
            jQuery.ajax({
                type: "POST", 
                url: "/employer_rate/minus", 
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

//worker deny order
$(".deny_order").on("click", function(e) {
        e.preventDefault();
        var id = $(this).attr('value');
        var myData = 'deny=' + id;

        var $this = $("#order_"+id);
        if (confirm('Вы уверены, что хотите отказаться от заказа?'))
        {
            jQuery.ajax({
                type: "POST", 
                url: "/deny_order",
                dataType:"text", 
                data: myData, 
                success: function(response){
                  console.log('deny order');
                  $this.fadeOut('slow');
                },
                error:function (xhr, ajaxOptions, thrownError){
                    
                    alert(thrownError);
                }
            });
        }
    });

//employer deny worker
$(".deny_worker").on("click", function(e) {
        e.preventDefault();
        var id = $(this).attr('value');
        var myData = 'deny=' + id;

        var $this = $("#deny_order_"+id);
        var $this_deny = $("#confirm-order_"+id);
       /* var $this_login = $("#login_"+id);*/

        if (confirm('Вы уверены, что хотите удалить работника?'))
        {
            jQuery.ajax({
                type: "POST", 
                url: "/deny_order_employer",
                dataType:"text", 
                data: myData, 
                success: function(response){
                  console.log('deny order');
                  $this.fadeOut('slow');
                  $this_deny.fadeOut('slow');
                  /*this_login.attr('width','0');*/
                  /*this_login.remove();*/
                },
                error:function (xhr, ajaxOptions, thrownError){
                    
                    alert(thrownError);
                }
            });
        }
    });

//worker confirm order
$(".confirm-order").on("click", function(e) {
        e.preventDefault();
        var id = $(this).attr('value');
        var myData = 'confirm=' + id;

        var $this_confirm = $("#confirm-order_"+id);
        var $this_order = $("#deny_order_"+id);
        if (confirm('Вы уверены, что хотите завершить заказ?'))
        {
            jQuery.ajax({
                type: "POST", 
                url: "/confirm_order", 
                dataType:"text", 
                data: myData, 
                success: function(response){
                  console.log('deny order');
                  $this_confirm.fadeOut('slow');
                  $this_order.fadeOut('slow');
                },
                error:function (xhr, ajaxOptions, thrownError){
                    
                    alert(thrownError);
                }
            });
            bootbox.confirm({
                message: "Поставить оценку рабочему",
                    buttons: {
                        confirm: {
                            label: 'Повысить',
                            className: 'btn-success'
                        },
                        cancel: {
                            label: 'Понизить',
                            className: 'btn-danger'
                        }
                    },
                callback: function (result) {
                    if (result)
                    {
                        var myData = 'add=' + id;

                        jQuery.ajax({
                            type: "POST", 
                            url: "/worker_rate/add", 
                            dataType:"text", 
                            data: myData, 
                            success: function(response){
                                console.log('add rate');
                            },
                            error:function (xhr, ajaxOptions, thrownError){
                    
                                alert(thrownError);
                            }
                        });
                    }
                    else
                    {
                        var myData = 'minus=' + id;

                        jQuery.ajax({
                            type: "POST", 
                            url: "/worker_rate/minus", 
                            dataType:"text", 
                            data: myData,
                            success: function(response){
                                console.log('minus rate');
                            },
                            error:function (xhr, ajaxOptions, thrownError){
                    
                                alert(thrownError);
                            }
                        });
                    }
                }
            });
        }
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

