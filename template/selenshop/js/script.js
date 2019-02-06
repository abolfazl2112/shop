$(function(){
    $('.addToCart').on('click',function(){
        console.log("addToCart click");
        var pid = $(this).attr('data-product-id');
        $.post('basketshop',
            {
                action:'add',
                id:pid,
                quantity:1
            }
        );
        console.log("q=addToCart post");
    });
    //decItemCart
    $('.decItemCart').on('click',function(){
        console.log("decItemCart click");
        var pid = $(this).attr('data-product-id');
        $.post('basketshop',
            {
                action:'add',
                id:pid,
                quantity:-1
            }
        );
        console.log("q=decItemCart post");
    });

    //remove
    $('.removeFromCart').on('click',function(){
        console.log("removeFromCart click");
        var pid = $(this).attr('data-product-id');
        $.post('basketshop',
            {
                action:'remove',
                id:pid
            }
        );
        console.log("q=removeFromCart post");
    });

    //empty
    $('.emptyCart').on('click',function(){
        console.log("emptyCart click");
        var pid = $(this).attr('data-product-id');
        $.post('basketshop',
            {
                action:'empty'
            }
        );
        console.log("q=emptyCart post");
    });

//**********************************************************************************************************************
    //when add to cart is clicked
    $('.add-to-cart').on('click',function(){
        console.log("add-to-cart click");
        var pid = $(this).attr('data-product-id');
        $.post('models/tools/cart.php?q=addtocart',
               {
                    pid:pid,
                    qty:1
               }
        );
        console.log("q=addtocart post");
    });

    $('.qtyBtn').on('click',function(){
        var id = $(this).attr('data-id');
        var qty = $(this).attr('data-qty');
        $.post('models/tools/cart.php?q=updatecart',
            {
                id:id,
                qty:qty
            }
        );

    });

    //remove product from cart
    $('.removeproduct').on('click',function(){
        // $(this).parent().parent().fadeOut(300);
        var id = $(this).attr('data-id');
        console.log("data-id="+id);
        $.post('models/tools/cart.php?q=removefromcart',
               {
                    id:id
               }
        );
        setTimeout( function(){
            location.reload();
        }  , 1000 );

    });    
    //set time
    setInterval(function() {
        $.get("models/tools/cart.php?q=countcart",function(data){
            $('.badge-counter').html(data);
        });
        
        // $.get("cart/data.php?q=countorder",function(data){
        //     $('.order-admin-badge').html(data);
        // });
        
        // $.get("cart/data.php?q=countproducts",function(data){
        //     $('.products-admin-badge').html(data);
        // });
        
        // $.get("cart/data.php?q=countcategory",function(data){
        //     $('.category-admin-badge').html(data);
        // });
        
    }, 50000);
    
    //confirmation
    $('.confirm').on('click',function(){
        var confirmation = confirm("آیا شما مطمئن هستید؟");
        if(!confirmation){
            return false;   
        }
    });
    
    //login
    $('#login').on('click',function(){
        var username = $('#username').val(); 
        var password = $('#password').val(); 
        
        $.post('cart/data.php?q=verify',
               {
                   username:username,
                   password:password
               },
               function(data){
                    if(data == 1){                        
                        $('.error').removeClass().addClass('alert alert-success').html('<i class="fa fa-unlock"></i> Logging in...'); 
                        setInterval(function(){
                            window.location = 'admin.php';
                        },1000);
                    }else{
                        $('.error').addClass('alert alert-danger').html('Username/Password is Incorrect!');
                        $('#username').val('');
                        $('#password').val(''); 
                    }
               });
    });
});

$(document).ready(function() {
    $('input[type=radio][name=account_input]').change(function() {
        if (this.value == 'register') {
            console.log('register');
            $('#panel-register').css('display','block');
            $('#panel-login').css('display','none');
        }
        else if (this.value == 'login') {
            console.log('login');
            $('#panel-register').css('display','none');
            $('#panel-login').css('display','block');
        }
    });
});